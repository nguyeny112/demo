<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\SocialUser;
use App\User;

class SocialAccountService
{
    public function createOrGetUser($provider,ProviderUser $providerUser)
    {
        $account = SocialUser::whereProvider($provider)
        ->whereProviderUserId($providerUser->getId())
        ->first();
        // dd($account);
        if ($account) {
            return $account->user;
        } else {



            $user = User::whereEmail($providerUser->getEmail())->first();
            // dd($providerUser);
            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'username' => $providerUser->getId(),
                    'address' => 'Please enter your address in profile',
                    'phone' => 'Please enter your phone number in profile',
                    'password' => time().'_'.$providerUser->getId(),
                    ]);

                $account = new SocialUser([
                    'provider_user_id' => $providerUser->getId(),
                    'provider' => $provider,
                    'user_id' =>$user->id
                    ]);
            }

            // $account->user()->associate($user);
            $account->save();
            // dd($user);
            return $user;

        }

    }
}