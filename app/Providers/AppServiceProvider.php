<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;;

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
        $this->registerPolicies();

        Gate::define('Adm', function (User $user) {
            return $user->hasPermission(3);
        });

        Gate::define('Manager', function (User $user) {
            return $user->hasPermission(2);
        });

        Gate::define('Client', function (User $user) {
            return $user->hasPermission(1);
        });
    }
}
