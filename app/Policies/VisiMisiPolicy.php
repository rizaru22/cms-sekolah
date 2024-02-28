<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VisiMisi;

class VisiMisiPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, VisiMisi $visimisi)
    {
        return $user->isSuperadminOrAdmin();
    }
}
