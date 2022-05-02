<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $guarded = [];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
