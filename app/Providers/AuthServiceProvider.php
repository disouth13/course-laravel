<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //daftarkan gates
        $this->registerPolicies();

        //gate administrator
        Gate::define('IsAdministrator', function($user){
            return $user->roles()->where('name', 'Administrator')->exists();
        });
        //gate admin
        Gate::define('IsAdmin', function($user){
            return $user->roles()->where('name', 'Admin')->exists();
        });

        Gate::define('IsUserBiasa', function($user){
            return $user->roles()->where('name', 'User Biasa')->exists();
        });
    }
}
