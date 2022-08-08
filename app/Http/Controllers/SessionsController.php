<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $credentials = request()->validate([
            'email' => 'required|email',
            'password' => 'required'

        ]);

        if (!auth()->attempt($credentials)) {
            // return redirect('/')->with('success', 'Welcome Back!');
            throw ValidationException::withMessages(['email' => 'Your provided credentials could not be verified']);
        }

        session()->regenerate();

        return redirect('/')->with('success', 'Welcome back!');

        // return back()
        //     ->withInput()
        //     ->withErrors(['email' => 'Your provided credentials could not be verified']);
    }
}
