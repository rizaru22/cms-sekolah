<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PrestasisainsISI;

class PrestasisainsISIPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, PrestasisainsISI $PrestasisainsISI)
    {
        return $user->isSuperadminOrAdmin();
    }

    public function delete(User $user, PrestasisainsISI $PrestasisainsISI)
    {
        return $user->isSuperadminOrAdmin();
    }
}
