<?php

namespace App\Providers;

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
        Gate::define('Amd', function (User $user) {
            return $user->hasPermission('admin');
        });

        Gate::define('Manager', function (User $user) {
            return $user->hasPermission('manage-users');
        });

        Gate::define('Client', function (User $user) {
            return $user->hasPermission('manage-users');
        });
    }
}
