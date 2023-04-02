<?php

return [

    /*
     * Project`s id
     */
    'project_id' => env('FREEKASSA_PROJECT_ID', '13737'),

    /*
     * First project`s secret key
     */
    'secret_key' => env('FREEKASSA_SECRET_KEY', 'wDa)I}7y(h!C5C0'),

    /*
     * Second project`s secret key
     */
    'secret_key_second' => env('FREEKASSA_SECRET_KEY_SECOND', '9y-AS[uf{2l5!wB'),

    /*
     * Locale for payment form
     */
    'locale' => 'ru',  // ru || en

    /*
     * Allowed currenc'ies https://www.free-kassa.ru/docs/api.php#ex_currencies
     *
     * If currency = null, that parameter doesn`t be setted
     */
    'currency' => null,

    /*
     * Allowed ip's https://www.free-kassa.ru/docs/api.php#step3
     */
    'allowed_ips' => [
        '1.12.247.177',     //web服务器地址
        '119.91.89.137',    //游戏服务器地址
        '205.185.119.172',  //下载服务器地址
        '119.85.113.207'    //重庆电信
    ],

    /*
     *  SearchOrder
     *  Search order in the database and return order details
     *  Must return array with:
     *
     *  _orderStatus
     *  _orderSum
     */
    'searchOrder' => null, //  'App\Http\Controllers\FreeKassaController@searchOrder',

    /*
     *  PaidOrder
     *  If current _orderStatus from DB != paid then call PaidOrderFilter
     *  update order into DB & other actions
     */
    'paidOrder' => null, //  'App\Http\Controllers\FreeKassaController@paidOrder',

    'errors' => [
        'validateOrderFromHandle' => '订单验证错误',
        'searchOrder' => '订单查询错误',
        'paidOrder' => '订单支付错误',
    ],

    'pay_url' => 'https://pay.freekassa.ru/',
];
