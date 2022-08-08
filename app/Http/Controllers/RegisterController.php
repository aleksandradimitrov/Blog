<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        // $hello = 'Hello world';
        return view('register.create');
    }
    public function store()
    {
        // return var_dump(request()->all());
        $attributes = request()->validate([
            'name' => 'required|max:255|min:2',
            'username' => 'required|max:255|min:3|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|max:255|min:8',
        ]);
        // dd($attributes);
        // $attributes['password'] = bcrypt($attributes['password']);
        $user = User::create($attributes);

        auth()->login($user);

        // session()->flash('success', 'Your account has been created!');

        return redirect('/')->with('success', 'Your account has been created!');
        // dd('success validation succeeded!');
        // return view('register.store');
    }
}
