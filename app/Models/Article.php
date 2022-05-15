<?php

namespace App\Models;

use App\Events\ArticleCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    public $guarded = [];

    protected $dispatchesEvents = [
        'created' => ArticleCreated::class,
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
