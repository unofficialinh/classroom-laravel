<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorAuthsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function show()
    {
        $googleAuthenticator = new \PHPGangsta_GoogleAuthenticator();

        //create new secret code
        $secretCode = $googleAuthenticator->createSecret();

        //create QR code from secret code
        $qrCodeUrl = $googleAuthenticator->getQRCodeGoogleUrl(
            auth()->user()->username, $secretCode, config("app.name")
        );

        //save secret code to check when enable 2fa
        session(["secret_code" => $secretCode]);

        return view("auth.2fa", compact("qrCodeUrl"));
    }

    public function enable(Request $request)
    {
        $this->validate($request, [
            "code" => "required|digits:6"
        ]);

        $googleAuthenticator = new \PHPGangsta_GoogleAuthenticator();

        //get secret code
        $secretCode = session("secret_code");

        //if user enters the wrong code, return with error
        if (!$googleAuthenticator->verifyCode($secretCode, $request->get("code"), 0)) {
            return redirect()->route('2faSetting')->with("error", "Invalid code");
        }

        // Update secret code
        $user = Auth::user();
        $user->secret_code = $secretCode;
        $user->save();

        return redirect()->route('2faSetting')->with("status", "2FA enabled!");
    }
}
