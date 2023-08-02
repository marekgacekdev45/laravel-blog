<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate();
            return redirect('/')->with('success', 'Welcome back');
        }

        return back()
        ->withInput()
        ->withErrors(['email'=>'Nieprawidłowe dane logowania']);
    }
    public function destroy()
    {
        Auth()->logout();

        return redirect('/')->with('success', 'You have been logout!');
    }
}