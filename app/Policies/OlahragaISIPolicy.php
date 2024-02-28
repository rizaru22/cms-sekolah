<?php

namespace App\Policies;

use App\Models\OlahragaISI;
use App\Models\User;

class OlahragaISIPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, OlahragaISI $olahragaISI)
    {
        return $user->isSuperadminOrAdmin();
    }

    public function delete(User $user, OlahragaISI $olahragaISI)
    {
        return $user->isSuperadminOrAdmin();
    }
}
