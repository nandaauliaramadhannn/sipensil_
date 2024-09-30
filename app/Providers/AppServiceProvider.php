<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Gate;
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
        URL::forceScheme('https');

        Gate::define('admin', function ($user) {
            return $user->role == 'admin';
        });

        Gate::define('lembaga', function ($user) {
            return $user->role == 'lembaga';
        });

        Gate::define('user', function ($user) {
            return $user->role == 'user';
        });

    }
}
