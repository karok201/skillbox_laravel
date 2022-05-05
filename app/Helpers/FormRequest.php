<?php

namespace App\Helpers;

class FormRequest
{
    public static function validate($request)
    {
        $attributes = $request->validate([
            'slug' => 'required|unique:App\Models\Article,title|regex:~^[a-z\d][a-z\d]*[_-]?[a-z\d]*[a-z\d ]$~i',
            'title' => 'required|min:5|max:100',
            'shortBody' => 'required|max:255',
            'largeBody' => 'required'
        ]);

        $request->has('published') ? $attributes['published'] = 1 : $attributes['published'] = 0;

        return $attributes;
    }
}
