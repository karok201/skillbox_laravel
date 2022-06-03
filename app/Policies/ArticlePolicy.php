<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Article $article
     * @return bool
     */

    public function view(User $user, Article $article): bool
    {
        return $user->isAdmin() || $user->id == $article->owner_id || $article->published;
    }

    public function create():bool
    {
        return auth()->check();
    }

    public function update(User $user, Article $article): bool
    {
        return ($user->isAdmin()) || ($article->owner_id == $user->id);
    }

    public function delete(User $user, Article $article): bool
    {
        return ($user->isAdmin()) || ($article->owner_id == $user->id);
    }
}
