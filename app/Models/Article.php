<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Events\ArticleCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;

class Article extends Model
{
    use HasFactory;

    const PUPLISHED_YES = 1;
    const PUPLISHED_NO = 1;

    public $guarded = [];

    protected $dispatchesEvents = [
        'created' => ArticleCreated::class,
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(static function ($article) {
            $after = $article->getDirty();

            $article->history()->attach(auth()->id(), [
                'before' => json_encode(Arr::only($article->fresh()->toArray(), array_keys($after)), JSON_THROW_ON_ERROR),
                'after' => json_encode($after, JSON_THROW_ON_ERROR),
            ]);
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function history(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'article_histories')
            ->withPivot(['before', 'after'])
            ->withTimestamps();
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
