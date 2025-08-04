<?php

namespace App\Providers;

use App\Models\User;
use Gate;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Gate::define('is-admin',function(User $user){
            return $user->role==='admin'
            ? Response::allow()
        : Response::deny('You are not authorized to access this page.');
        });

        Gate::define('is-client',function(User $user){
            return $user->role==='client';
        });
    }
}
