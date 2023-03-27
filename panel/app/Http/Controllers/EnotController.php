<?php

namespace App\Http\Controllers;

use App\Models\Game\AccountDonate;
use App\Models\Payment\History;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class EnotController extends Controller
{

    public function webhook(Request $request)
    {
        $order = History::where('order_id', $request->get('merchant_id'))->first();
        if($order) {

            $merchant = $request->get('merchant'); // id вашего магазина
            $secret_word2 = config('enot.secret_key_2'); // секретный ключ 2

            $sign = md5($merchant.':'.$request->get('amount').':'.$secret_word2.':'.$request->get('merchant_id'));

            if ($sign != $request->get('sign_2')) {
                return response()->json(['success'=> false, 'message' => 'Sign Не совпадает']);
            }

            AccountDonate::updateOrCreate([
                'id' => $order->user_id,
            ],[
                'bonuses' => DB::raw('bonuses + ' . $order->price),
                'total_bonuses' => DB::raw('total_bonuses + ' . $order->price)
            ]);

            $order->update([
                'status' => 1
            ]);
        }

        return false;
    }

    public function success(): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route('profile.payment');
    }

    public function fail(): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route('profile.payment');
    }
}
