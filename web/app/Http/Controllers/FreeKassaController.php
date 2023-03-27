<?php

namespace App\Http\Controllers;

use App\Models\Game\AccountDonate;
use App\Models\Payment\History;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class FreeKassaController extends Controller
{

    public function getIP() {
        if(isset($_SERVER['HTTP_X_REAL_IP'])) return $_SERVER['HTTP_X_REAL_IP'];
        return $_SERVER['REMOTE_ADDR'];
    }

    public function searchOrder(Request $request)
    {
        $order = History::where('order_id', $request->get('MERCHANT_ORDER_ID'))->first();
        if($order) {

            $merchant_id = config('freekassa.project_id');
            $merchant_secret = config('freekassa.secret_key_second');

            if (!in_array(self::getIP(), array('168.119.157.136', '168.119.60.227', '138.201.88.124', '178.154.197.79'))) die("hacking attempt!");

            $sign = md5($merchant_id.':'.$request->get('AMOUNT').':'.$merchant_secret.':'.$request->get('MERCHANT_ORDER_ID'));

            if ($sign != $request->get('SIGN')) die('wrong sign');

            AccountDonate::updateOrCreate([
                'id' => $order->user_id,
            ],[
                'bonuses' => DB::raw('bonuses + ' . $order->price),
                'total_bonuses' => DB::raw('total_bonuses + ' . $order->price)
            ]);

            $order->update([
                'status' => 1
            ]);

            return redirect()->route('profile.transactions');
        }

        return false;
    }

}
