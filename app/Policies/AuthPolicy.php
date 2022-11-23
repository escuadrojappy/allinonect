<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Auth\Access\HandlesAuthorization;

class AuthPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Policy for Registration.
     *
     * @return bool
     */
    public function registration($user)
    {
        return Arr::get($user, 'role_id') == config('models.roles.admin');
    }

    /**
     * Is Admin Policy.
     *
     * @return bool
     */
    public function is_admin($user)
    {
        return Arr::get($user, 'role_id') == config('models.roles.admin');
    }
}
