<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\BillingAddress;
use App\Models\Order;
use App\Models\User;
use App\Policies\UserAccountPolicy;
use App\Policies\UserBillingAddressPolicy;
use App\Policies\UserOrderPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserAccountPolicy::class,
        Order::class => UserOrderPolicy::class,
        BillingAddress::class => UserBillingAddressPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
