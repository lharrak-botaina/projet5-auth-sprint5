<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class SocialController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }





    public function callbackGoogle(){
  
            $google_user=Socialite::driver('google')->user();
            // $this->_registerOrLoginGitHubUser($user);
            $user =User::where('google_id',$google_user->getId())->first();
            if(!$user){
                $add_user=User::create([
                    'name'=>$google_user->getName(),
                    'email'=>$google_user->getEmail(),
                    'google_id'=>$google_user->getId(),
                    'password'=>bcrypt('password'), 
                ]);
                Auth::login($add_user);
                return redirect('/');
            }else{
                Auth::login($user);
                return redirect('/');
            }
    
        


    }
   
}
