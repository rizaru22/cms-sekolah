<?php

namespace App\Policies;

use App\Models\SejarahSekolah;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SejarahSekolahPolicy
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

    public function update(User $user, SejarahSekolah $sejarahsekolah)
    {
        return $user->isSuperadminOrAdmin();
    }

    
}
