<?php

use App\Http\Controllers\CharactersController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Auth\StatefulGuard;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/gms', [\App\Http\Controllers\ArticleController::class, 'gms']);

Route::get('/news', [\App\Http\Controllers\ArticleController::class, 'index'])->name('news.index');
Route::get('/news/{id}/{slug}', [\App\Http\Controllers\ArticleController::class, 'show'])->name('news.show');
Route::get('news.frag', [\App\Http\Controllers\ArticleController::class, 'frag'])->name('news.frag');

Route::get('search', [\App\Http\Controllers\SearchController::class, 'index'])->name('search');
Route::get('search/character', [\App\Http\Controllers\SearchController::class, 'character'])->name('search.character');
Route::get('search/blog', [\App\Http\Controllers\SearchController::class, 'blog'])->name('search.blog');

Route::prefix('forums')->group(function () {
    Route::get('/', function () {
        return redirect(config('app.forum_url'));
    })->name('forums.index');
});

Route::prefix('sports')->group(function () {
    Route::get('arena', [\App\Http\Controllers\SportController::class, 'arena'])->name('arena_sport');
    Route::get('mythic', [\App\Http\Controllers\SportController::class, 'mythic'])->name('mythic_sport');
});


Route::prefix('game')->group(function () {
    Route::get('patch', function () {
        return view('game.patch.index');
    })->name('patch.index');
    Route::get('item', function () {
        return view('game.item.index');
    })->name('item.index');

    Route::get('addons', [\App\Http\Controllers\AddonsController::class, 'index'])->name('addons.index');
    Route::get('addons/{slug}', [\App\Http\Controllers\AddonsController::class, 'show'])->name('addons.show');

    Route::get('recruit-a-friend', [GameController::class, 'recruit'])->name('recruit');
    Route::get('start', [GameController::class, 'return'])->name('start');
    Route::get('return', [GameController::class, 'start'])->name('return');
    Route::get('status/{name}', [GameController::class, 'status'])->name('status');
    Route::get('pve/leaderboards/{server}/{instance}', [GameController::class, 'leaderboards'])->name('leaderboards');
    Route::get('pvp/leaderboards/{servers}/{type}', [GameController::class, 'arena'])->name('arena');
    Route::get('pvp/leaderboards/{servers}/{type}/team/{team}', [GameController::class, 'team'])->name('team');
});
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

Route::get('character', [CharactersController::class, 'index'])->name('characters');
Route::get('character/eu/{server}/{characters}', [CharactersController::class, 'show'])->name('characters.show');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::get('clear', function() {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('view:cache');
        Artisan::call('route:clear');
        return "Кэш очищен.";
    });
});

Route::get('/apps/desktop', function () {
    return view('apps.desktop');
})->name('apps.desktop');
