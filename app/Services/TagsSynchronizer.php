<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;

class TagsSynchronizer
{
    public function sync(Model $model)
    {
        $articleTags = $model->tags->keyBy('name');
        $requestTags = collect(explode(',', request('tags')));

        $syncIds = $articleTags->intersectByKeys($requestTags)->pluck('id')->toArray();

        $tagsToAttach = $requestTags->diffKeys($articleTags);

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);

            $syncIds[] = $tag->id;
        }

        $model->tags()->sync($syncIds);

        if (empty(request('tags'))) {
            $model->tags()->delete();
        }
    }
}
