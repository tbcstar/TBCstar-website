<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::withCount(['posts', 'comments'])->get()
            ->map(function ($user) {
                return $user->setAttribute('score', $user->score());
            })->sortByDesc('score');

        return view('users.index', compact('users'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {

    }


    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }


    public function edit(User $user)
    {
        //
    }


    public function update(Request $request, User $user)
    {
        //
    }


    public function destroy(User $user)
    {
        //
    }
}
