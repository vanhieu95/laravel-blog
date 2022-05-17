<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('session.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (auth()->attempt($attributes)) {
            throw ValidationException::withMessages(['username' => 'Your credentials is invalid.']);
        }

        session()->regenerate(); // prevent session fixation

        return to_route('posts.index')->with('success', 'Welcome back');
//        return back()->withInput()->withErrors(['email' => 'Your credentials is invalid.']);
    }

    public function destroy()
    {
        auth()->logout();

        return to_route('posts.index')->with('success', 'Goodbye!');
    }
}
