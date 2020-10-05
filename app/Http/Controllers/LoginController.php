<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function authenticate(LoginRequest $requestFields)
    {
        $attributes = $requestFields->only(['username', 'password']);

        if (Auth::attempt($attributes)) {
            return redirect()->route('index');
        }
        else
            return redirect('login');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return back();
    }

}
