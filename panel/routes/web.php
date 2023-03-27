<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;
use App\Models\Payment\History;
use Illuminate\Http\Request;

Route::get('locale/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');

Route::get('/news', function () {
    return view('welcome');
})->name('news.index');

Route::get('/news', function () {
    return redirect('https://nighthold.pro/news');
})->name('news.index');

Route::get('/home', function () {
    return redirect('https://nighthold.pro');
})->name('home.index');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('profile.dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/detail', function () {
    return view('profile.detail');
})->name('profile.detail');

Route::middleware(['auth:sanctum', 'verified'])->get('/characters', function () {
    return view('profile.characters');
})->name('profile.characters');

Route::middleware(['auth:sanctum', 'verified'])->get('/services', function () {
    return view('profile.services.index');
})->name('profile.services');

Route::middleware(['auth:sanctum', 'verified'])->get('/games', function () {
    return view('profile.games');
})->name('profile.games');

Route::middleware(['auth:sanctum', 'verified'])->get('/connections', function () {
    return view('profile.connections');
})->name('profile.connections');

Route::middleware(['auth:sanctum', 'verified'])->get('/transfer', function () {
    return view('profile.transfer');
})->name('profile.transfer');

Route::middleware(['auth:sanctum', 'verified'])->get('/security', function () {
    return view('profile.security');
})->name('profile.security')->middleware('verified');

Route::middleware(['auth:sanctum', 'verified'])->get('/payment', function () {
    return view('profile.payment');
})->name('profile.payment');

Route::middleware(['auth:sanctum', 'verified'])->get('/transactions', function () {
    return view('profile.transactions');
})->name('profile.transactions');

Route::middleware(['auth:sanctum', 'verified'])->get('/transactions/UE{order_id}/{id}', function (History $order_id) {
    return view('profile.transactions_view', compact('order_id'));
})->name('profile.transactions.view');

Route::middleware(['auth:sanctum', 'verified'])->get('/payment/create', function () {
    return view('profile.payment.create');
})->name('profile.payment.create');

Route::middleware(['auth:sanctum', 'verified'])->get('/payment/payoff', function () {
    return view('profile.payment.payoff');
})->name('profile.payment.payoff');

Route::middleware(['auth:sanctum', 'verified'])->get('/checkout/key-claim', function () {
    return view('profile.checkout.key_claim');
})->name('profile.checkout.key');

Route::middleware(['auth:sanctum', 'verified'])->get('/referrals', function () {
    return view('profile.referrals');
})->name('profile.referrals');

Route::middleware(['auth:sanctum', 'verified'])->get('/vote', function () {
    return view('profile.vote');
})->name('profile.vote');

Route::middleware(['auth:sanctum', 'verified'])->get('/payoff/index', function () {
    return view('profile.payment.payoff.index');
})->name('profile.payment.payoff.index');
