<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Socialite;
//use App\Http\Controllers\Controller;
use Mockery\CountValidator\Exception;
use App\User;
use Auth;
use App\Http\Requests;

class FacebookController extends Controller
{
    public function facebookLogin(){
        return Socialite::with('facebook')->redirect();
    }
    public function facebookCallback(){
        try{
            $user = Socialite::with('facebook')->user();
        }catch(Exception $e){

        }
        $authUser = $this ->findOrCreateUser($user);
        Auth::login($authUser);

        return redirect('/addEstate');
    }

    private function findOrCreateUser($facebookuser){
        $authUser = User::where('email', $facebookuser->getEmail())->first();
        if ($authUser){
            return $authUser;
        }
        return $this->createUser($facebookuser);
    }

    private function createUser($user){
        $user = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => bcrypt(123456),
        ]);

        return $user;
    }
}
