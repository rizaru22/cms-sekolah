<?php

namespace App\Policies;

use App\Models\GurupemanduISI;
use App\Models\User;

class GurupemanduISIPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, GurupemanduISI $gurupemanduISI)
    {
        return $user->isSuperadminOrAdmin();
    }

    public function delete(User $user, GurupemanduISI $gurupemanduISI)
    {
        return $user->isSuperadminOrAdmin();
    }
}
