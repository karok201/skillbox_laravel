<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Auth\Access\Response|bool
     */

    public function view(User $user, Article $article)
    {
        return $user->isAdmin() || $user->id == $article->owner_id || $article->published;
    }

    public function create()
    {
        return auth()->check();
    }

    public function update(User $user, Article $article)
    {
        return ($user->isAdmin()) || ($article->owner_id == $user->id);
    }

    public function delete(User $user, Article $article)
    {
        return ($user->isAdmin()) || ($article->owner_id == $user->id);
    }
}
