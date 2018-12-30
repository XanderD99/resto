<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;

class CookieController extends Controller
{
    public static function saveCookies($anim, $save_user) {
        Cookie::queue('anim', 
        $anim,
        2628000, // 5 years
        null,
        null,
        false,
        false);

        Cookie::queue('user_data', 
        $save_user,
        2628000, // 5 years
        null,
        null,
        false,
        true);

        return redirect('/');
    }

    public function index()
    {
        return view('cookies', ['type' => null]);
    }

    public function accept()
    {
        return CookieController::saveCookies(true, true);
    }

    public function edit(Request $req)
    {
        if ($req->isMethod('post')) {
            $anim = 0;
            $save_user_data = false;

            if($req->input('animation')){$anim = 1;}
            if($req->input('save_user_data')){$save_user_data = true;}

            return CookieController::saveCookies($anim, $save_user_data);
        } else {
            return view('cookies', ['type' => 'edit']);
        }
    }

    public function cancel()
    {
        return redirect('/')->with('no_cookies', true);
    }
}
