<?php

namespace App\Http\Controllers;

use App\Models\Main\Addons;

class AddonsController extends Controller
{
    public function index() {
        return view('game.addons.index', [
            'data' => Addons::get()
        ]);
    }

    public function show($slug) {
        return view('game.addons.show', [
            'data' => Addons::where('slug', $slug)->firstOrFail()
        ]);
    }
}
