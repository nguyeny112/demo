<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialite;
use App\SocialAccountService;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
    	if($provider=='facebook' OR $provider=='google'){
        return Socialite::driver($provider)->redirect(); 
        }else{
        	return abort(404);
        }  
    }   

    public function callbackFB(SocialAccountService $service)
    {
        // when facebook call us a with token   
        // $providerUser = Socialite::driver('facebook')->user(); 
        $user = $service->createOrGetUser('facebook',Socialite::driver('facebook')->user());
        auth()->login($user);
        return redirect()->route('public.index.index');

        // dd($providerUser);
    }
    public function callbackGoogle(SocialAccountService $service)
    {
        // when facebook call us a with token   
        $providerUser = Socialite::with('google')->user(); 

        $user = $service->createOrGetUser('google',$providerUser);
        // dd($user);
        auth()->login($user);
        return redirect()->route('public.index.index');

        // dd($providerUser);
    }
}
