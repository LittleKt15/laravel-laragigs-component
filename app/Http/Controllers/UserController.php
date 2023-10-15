<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('user.register');
    }

    public function store (Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        auth()->login($user);

        return redirect('/')->with('message', 'User Created and Logged in!');
    }
}
