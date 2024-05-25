<?php

namespace App\Policies;

use App\Models\PrestasipenelitianISI;
use App\Models\User;

class PrestasipenelitianISIPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, PrestasipenelitianISI $PrestasipenelitianISI)
    {
        return $user->isSuperadminOrAdmin();
    }

    public function delete(User $user, PrestasipenelitianISI $PrestasipenelitianISI)
    {
        return $user->isSuperadminOrAdmin();
    }
}
