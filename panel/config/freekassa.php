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
        '168.119.157.136',
        '168.119.60.227',
        '138.201.88.124',
        '178.154.197.79'
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
        'validateOrderFromHandle' => 'Validate Order Error',
        'searchOrder' => 'Search Order Error',
        'paidOrder' => 'Paid Order Error',
    ],

    'pay_url' => 'https://pay.freekassa.ru/',
];
