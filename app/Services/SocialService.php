<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SocialService
{
    public function saveSocialData($user)
    {
        $email = $user->getEmail();
        $name = $user->getName();

        $password = bcrypt(Str::random(25));
        $data = ['email'=>$email, 'password'=>$password, 'name'=>$name];
        $u = User::where('email', $email)->first();
        if($u){
            Auth::login($u);
            return $u->fill(['name'=>$name]);
        }

        return User::create($data);
    }
}
