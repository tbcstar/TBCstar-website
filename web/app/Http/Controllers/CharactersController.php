<?php

namespace App\Http\Controllers;

use App\Services\Characters;
use App\Services\Server;

class CharactersController extends Controller
{
    public function index() {
        return view('characters.index');
    }

    public function show($server, $characters) {
        Characters::LoadCharacter($characters, Server::GetRealmIDByName($server), true, true);
        return view('characters.show', ['data' => Characters::data()]);
    }
}
