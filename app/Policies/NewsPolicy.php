<?php

namespace App\Policies;

use App\Models\News;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
{
    use HandlesAuthorization;

    public function view(User $user, News $item):bool
    {
        return $user->isAdmin() || $user->id == $item->user_id || (!$item->hidden && $item->status == News::STATUS_APPROVED);
    }

    public function create():bool
    {
        return auth()->check();
    }

    public function update(User $user, News $item):bool
    {
        return ($user->isAdmin()) || ($item->user_id == $user->id);
    }

    public function delete(User $user, News $item):bool
    {
        return ($user->isAdmin()) || ($item->owner_id == $user->id);
    }
}
