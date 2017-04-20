<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('edit-self',function($user,$edituser){
            // dd($edituser);
            if($user->level==1){
                return true;
            }
            return $user->id == $edituser->id;
        });
        Gate::define('del-self',function($user,$delUser){
            return ($user->id != $delUser->id);
        });
        Gate::define('change-level',function($user,$editUser){
            if($editUser->level == 1){
                return false;
            }else if($user->level!=1){
                return false;
            };
            return true;
        });
    }
}
