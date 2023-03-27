<?php

namespace App\Http\Controllers;

use App\Models\Payment\History;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class HistoriesController extends VoyagerBaseController
{
    public function index(Request $request) {
         // GET THE SLUG, ex. 'posts', 'pages', etc.
         $slug = $this->getSlug($request);

         // GET THE DataType based on the slug
         $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

         // Check permission
         $this->authorize('browse', app($dataType->model_name));

         $getter = $dataType->server_side ? 'paginate' : 'get';

         $search = (object) ['value' => $request->get('s'), 'key' => $request->get('key'), 'filter' => $request->get('filter')];

         $searchNames = [];
         if ($dataType->server_side) {
             $searchNames = $dataType->browseRows->mapWithKeys(function ($row) {
                 return [$row['field'] => $row->getTranslatedAttribute('display_name')];
             });
         }

         $orderBy = $request->get('order_by', $dataType->order_column);
         $sortOrder = $request->get('sort_order', $dataType->order_direction);
         $usesSoftDeletes = false;
         $showSoftDeleted = false;

         // Next Get or Paginate the actual content from the MODEL that corresponds to the slug DataType
         if (strlen($dataType->model_name) != 0) {
             $model = app($dataType->model_name);

             $query = $model::where('service', 'withdraw')->select($dataType->name.'.*');

             if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
                 $query->{$dataType->scope}();
             }

             // Use withTrashed() if model uses SoftDeletes and if toggle is selected
             if ($model && in_array(SoftDeletes::class, class_uses_recursive($model)) && Auth::user()->can('delete', app($dataType->model_name))) {
                 $usesSoftDeletes = true;

                 if ($request->get('showSoftDeleted')) {
                     $showSoftDeleted = true;
                     $query = $query->withTrashed();
                 }
             }

             // If a column has a relationship associated with it, we do not want to show that field
             $this->removeRelationshipField($dataType, 'browse');

             if ($search->value != '' && $search->key && $search->filter) {
                 $search_filter = ($search->filter == 'equals') ? '=' : 'LIKE';
                 $search_value = ($search->filter == 'equals') ? $search->value : '%'.$search->value.'%';

                 $searchField = $dataType->name.'.'.$search->key;
                 if ($row = $this->findSearchableRelationshipRow($dataType->rows->where('type', 'relationship'), $search->key)) {
                     $query->whereIn(
                         $searchField,
                         $row->details->model::where($row->details->label, $search_filter, $search_value)->pluck('id')->toArray()
                     );
                 } else {
                     if ($dataType->browseRows->pluck('field')->contains($search->key)) {
                         $query->where($searchField, $search_filter, $search_value);
                     }
                 }
             }

             $row = $dataType->rows->where('field', $orderBy)->firstWhere('type', 'relationship');
             if ($orderBy && (in_array($orderBy, $dataType->fields()) || !empty($row))) {
                 $querySortOrder = (!empty($sortOrder)) ? $sortOrder : 'desc';
                 if (!empty($row)) {
                     $query->select([
                         $dataType->name.'.*',
                         'joined.'.$row->details->label.' as '.$orderBy,
                     ])->leftJoin(
                         $row->details->table.' as joined',
                         $dataType->name.'.'.$row->details->column,
                         'joined.'.$row->details->key
                     );
                 }

                 $dataTypeContent = call_user_func([
                     $query->orderBy($orderBy, $querySortOrder),
                     $getter,
                 ]);
             } elseif ($model->timestamps) {
                 $dataTypeContent = call_user_func([$query->latest($model::CREATED_AT), $getter]);
             } else {
                 $dataTypeContent = call_user_func([$query->orderBy($model->getKeyName(), 'DESC'), $getter]);
             }

             // Replace relationships' keys for labels and create READ links if a slug is provided.
             $dataTypeContent = $this->resolveRelations($dataTypeContent, $dataType);
         } else {
             // If Model doesn't exist, get data from table name
             $dataTypeContent = call_user_func([DB::table($dataType->name), $getter]);
             $model = false;
         }

         // Check if BREAD is Translatable
         $isModelTranslatable = is_bread_translatable($model);

         // Eagerload Relations
         $this->eagerLoadRelations($dataTypeContent, $dataType, 'browse', $isModelTranslatable);

         // Check if server side pagination is enabled
         $isServerSide = isset($dataType->server_side) && $dataType->server_side;

         // Check if a default search key is set
         $defaultSearchKey = $dataType->default_search_key ?? null;

         // Actions
         $actions = [];
         if (!empty($dataTypeContent->first())) {
             foreach (Voyager::actions() as $action) {
                 $action = new $action($dataType, $dataTypeContent->first());

                 if ($action->shouldActionDisplayOnDataType()) {
                     $actions[] = $action;
                 }
             }
         }

         // Define showCheckboxColumn
         $showCheckboxColumn = false;
         if (Auth::user()->can('delete', app($dataType->model_name))) {
             $showCheckboxColumn = true;
         } else {
             foreach ($actions as $action) {
                 if (method_exists($action, 'massAction')) {
                     $showCheckboxColumn = true;
                 }
             }
         }

         // Define orderColumn
         $orderColumn = [];
         if ($orderBy) {
             $index = $dataType->browseRows->where('field', $orderBy)->keys()->first() + ($showCheckboxColumn ? 1 : 0);
             $orderColumn = [[$index, $sortOrder ?? 'desc']];
         }

         // Define list of columns that can be sorted server side
         $sortableColumns = $this->getSortableColumns($dataType->browseRows);

         $view = 'voyager::histories.browse';

         if (view()->exists("voyager::$slug.browse")) {
             $view = "voyager::$slug.browse";
         }

         return Voyager::view($view, compact(
             'actions',
             'dataType',
             'dataTypeContent',
             'isModelTranslatable',
             'search',
             'orderBy',
             'orderColumn',
             'sortableColumns',
             'sortOrder',
             'searchNames',
             'isServerSide',
             'defaultSearchKey',
             'usesSoftDeletes',
             'showSoftDeleted',
             'showCheckboxColumn'
         ));
     }

    public function update(Request $request, $id)
    {
        $dataType = Voyager::model('DataType')->where('slug', '=', 'histories')->first();

        // Compatibility with Model binding.
        $id = $id instanceof \Illuminate\Database\Eloquent\Model ? $id->{$id->getKeyName()} : $id;

        if ($request->get('status') === '1') {
            $payment = History::where('id', $id)->first();

            $url = 'https://enot.io/request/payoff?api_key='.
                config('enot.api_key').'&email='.
                config('enot.api_email').'&service='.
                $payment->servicesKey.'&wallet='.
                $payment->wallet.'&amount='.
                $payment->price.'&orderid='
                .$payment->order_id;

            $curlSession = curl_init();
            curl_setopt($curlSession, CURLOPT_URL, $url);
            curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
            curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

            $jsonData = json_decode(curl_exec($curlSession));
            curl_close($curlSession);

            if($jsonData->status === 'error') {
                $redirect = redirect()->back();
                return $redirect->with([
                    'message'    => $jsonData->message,
                    'alert-type' => 'error',
                ]);
            }
        }

        $model = app($dataType->model_name);
        $query = $model->query();
        if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
            $query = $query->{$dataType->scope}();
        }
        if ($model && in_array(SoftDeletes::class, class_uses_recursive($model))) {
            $query = $query->withTrashed();
        }

        $data = $query->findOrFail($id);

        // Check permission
        $this->authorize('edit', $data);

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->editRows, $dataType->name, $id)->validate();

        // Get fields with images to remove before updating and make a copy of $data
        $to_remove = $dataType->editRows->where('type', 'image')
            ->filter(function ($item, $key) use ($request) {
                return $request->hasFile($item->field);
            });
        $original_data = clone($data);

        $this->insertUpdateData($request, 'histories', $dataType->editRows, $data);

        // Delete Images
        $this->deleteBreadImages($original_data, $to_remove);

        event(new BreadDataUpdated($dataType, $data));

        $redirect = redirect()->back();

        return $redirect->with([
            'message'    => __('voyager::generic.successfully_updated')." {$dataType->getTranslatedAttribute('display_name_singular')}",
            'alert-type' => 'success',
        ]);
    }
}
