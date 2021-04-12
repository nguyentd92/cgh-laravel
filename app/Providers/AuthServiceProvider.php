<?php

namespace App\Providers;

use App\Models\User;
use App\Permissions\ProductPermissions;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        Gate::define(ProductPermissions::$Delete, function(User $user) {
            return $user->hasAtLeastPermissions([ProductPermissions::$Delete]);
        });
    }
}
