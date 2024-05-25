<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PrestasiseniISI;

class PrestasiseniISIPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, PrestasiseniISI $PrestasiseniISI)
    {
        return $user->isSuperadminOrAdmin();
    }

    public function delete(User $user, PrestasiseniISI $PrestasiseniISI)
    {
        return $user->isSuperadminOrAdmin();
    }
}
