<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }

    public static function tagsCloud()
    {
        return (new static)->has('articles')->get();
    }

    public function getRouteKeyName(): string
    {
        return 'name';
    }
}
