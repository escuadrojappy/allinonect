<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // \App\Models\Establishments::class => \App\Policies\RegistrationPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Passport::tokensExpireIn(now()->addSeconds(10)); // ----> for testing
        // Passport::refreshTokensExpireIn(now()->addSeconds(60)); // ------> for testing

        Passport::tokensExpireIn(now()->addMinutes(config('auth.access_token_timeout')));
        Passport::refreshTokensExpireIn(now()->addMinutes(config('auth.refresh_token_timeout')));

        // Authorization Policy
        Gate::define('is_admin', [\App\Policies\AuthPolicy::class, 'isAdmin']);
        Gate::define('is_admin_or_establishment', [\App\Policies\AuthPolicy::class, 'isAdminOrEstablishment']);
        Gate::define('is_establishment', [\App\Policies\AuthPolicy::class, 'isEstablishment']);
    }
}
