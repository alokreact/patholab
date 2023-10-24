<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){

        Paginator::useBootstrap();

       

        Gate::define('isUser', function(User $user) {
            return $user->role == 2;
        });
        Gate::define('isAdmin', function(User $user) {
            return $user->role == 1;
        });
    }
}
