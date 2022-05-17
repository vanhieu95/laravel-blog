<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required'],
            'username' => ['required', 'unique:users'],
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required'],
        ]);

        $user = User::create($attributes);

        auth()->login($user);
//        session()->flash('success', 'Your account has been created.');

        return to_route('posts.index')->with('success', 'Your account has been created.');
    }
}
