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
    public function isAdmin($user)
    {
        return Arr::get($user, 'role_id') == config('models.roles.admin');
    }

    /**
     * Is Admin Policy.
     *
     * @return bool
     */
    public function isAdminOrEstablishment($user, $request)
    {
        if (!Arr::get($user, 'role_id') == config('models.roles.admin')) return false;

        if (Arr::get($user, 'role_id') == config('models.roles.establishment')) {
            return !(Arr::get($request, 'id') != Arr::get($user, 'id'));
        }
    }

    /**
     * Is Establishment Policy.
     *
     * @return bool
     */
    public function isEstablishment($user)
    {
        return Arr::get($user, 'role_id') == config('models.roles.establishment');
    }
}
