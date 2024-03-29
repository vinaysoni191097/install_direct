<?php

namespace App\Policies;

use App\Models\BillingAddress;
use App\Models\User;

class UserBillingAddressPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BillingAddress $billingAddress): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can store data in the model.
     */
    public function store(User $user, $userId): bool
    {
        return $user->id === $userId;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BillingAddress $billingAddress): bool
    {
        return $user->id === $billingAddress->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BillingAddress $billingAddress): bool
    {
        return $user->id === $billingAddress->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BillingAddress $billingAddress): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BillingAddress $billingAddress): bool
    {
        //
    }
}
