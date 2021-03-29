<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Services\SocialService;

class SocialController extends Controller
{
    public function index()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('vkontakte')->user();
        $objSocial = new SocialService();
        if($objSocial->saveSocialData($user)){
            return redirect()->route('home');
        }
        return back();
    }
}
