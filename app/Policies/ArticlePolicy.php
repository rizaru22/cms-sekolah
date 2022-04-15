<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use PhpParser\Node\Expr\PostDec;

class ArticlePolicy
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

    public function update(User $user, Article $article)
    {
        return $user->isSuperadmin() || $article->ownedBy($user);
    }

    public function delete(User $user, Article $article)
    {
        return $user->isSuperadmin() || $article->ownedBy($user);
    }
}
