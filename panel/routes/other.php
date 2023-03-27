<?php

use App\Http\Controllers\EnotController;
use App\Http\Controllers\FreeKassaController;
use Illuminate\Support\Facades\Route;

Route::post('enot/result/webhook', [EnotController::class, 'webhook']);
Route::post('enot/result/payoff', [EnotController::class, 'payoff']);
Route::get('enot/result/success', [EnotController::class, 'success']);
Route::get('enot/result/fail', [EnotController::class, 'fail']);
Route::get('enot/result', [EnotController::class, 'result']);

Route::get('freekassa/result', [FreeKassaController::class, 'searchOrder']);
Route::get('freekassa/success', [FreeKassaController::class, 'success']);
Route::get('freekassa/fail', [FreeKassaController::class, 'fail']);
