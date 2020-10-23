<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerifyTwoFactorController extends Controller
{
    public function show()
    {
        return view("auth.verify");
    }

    public function verify(Request $request)
    {
        $this->validate($request, [
            "code" => "required|digits:6",
        ]);

        $googleAuthenticator = new \PHPGangsta_GoogleAuthenticator();
        $secretCode = auth()->user()->secret_code;

        if (!$googleAuthenticator->verifyCode($secretCode, $request->get("code"), 0)) {
            $errors = new \Illuminate\Support\MessageBag();
            $errors->add("code", "Invalid authentication code");
            return redirect()->back()->withErrors($errors);
        }

        session(["2fa_verified" => true]);
        return redirect()->route('index');
    }
}
