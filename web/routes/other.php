<?php

use App\Http\Controllers\EnotController;
use App\Http\Controllers\FreeKassaController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

if (App::environment('production')) {
    URL::forceScheme('https');
}
Route::get('locale/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');
Route::post('graphql', [GameController::class, 'graphql'])->name('graphql');

Route::post('enot/result/webhook', [EnotController::class, 'webhook']);
Route::post('enot/result/payoff', [EnotController::class, 'payoff']);
Route::get('enot/result/success', [EnotController::class, 'success']);
Route::get('enot/result/fail', [EnotController::class, 'fail']);
Route::get('enot/result', [EnotController::class, 'result']);

Route::get('freekassa/result', [FreeKassaController::class, 'searchOrder']);
Route::get('freekassa/success', [FreeKassaController::class, 'success']);
Route::get('freekassa/fail', [FreeKassaController::class, 'fail']);

Route::put('histories/{id}', ['uses' => 'App\Http\Controllers\HistoriesController@update',  'as' => 'voyager.bread.updates']);
