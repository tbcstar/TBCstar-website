<?php

namespace App\Http\Livewire\Donate;

use App\Models\Payment\History;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Refresh extends Component
{
    public $top;

    public function update()
    {
        $this->top = Cache::rememberForever('top_donaters', function () {
            $donaters = History::select('user_id', DB::raw('SUM(price) as price'))
                ->whereDate('updated_at', Carbon::today())
                ->where('service', 'balance')
                ->where(['status' => 1, ['price', '>', '0']])
                ->groupBy('user_id')
                ->limit(5)
                ->get();
            $data = [];
            foreach ($donaters as $donater) {
                $user = User::whereId($donater->user_id)->first();
                $data[] = (object) [
                    'account_id' => $user->id,
                    'username' => $user->name,
                    'bonuses' => $donater->price
                ];
            }

            return $data;
        });
    }

    public function render()
    {
        return view('livewire.donate.refresh');
    }
}
