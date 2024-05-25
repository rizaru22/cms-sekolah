<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PrestasiolahragaISI;

class PrestasiolahragaISIPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, PrestasiolahragaISI $prestasiolahragaISI)
    {
        return $user->isSuperadminOrAdmin();
    }

    public function delete(User $user, PrestasiolahragaISI $prestasiolahragaISI)
    {
        return $user->isSuperadminOrAdmin();
    }
}
