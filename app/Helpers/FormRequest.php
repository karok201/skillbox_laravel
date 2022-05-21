<?php

namespace App\Helpers;

class FormRequest
{
    public static function validate(): array
    {
        request()->has('article') ? $slugValidate = '' : $slugValidate = '|unique:App\Models\Article,slug|';

        $attributes = request()->validate([
            'slug' => 'required|regex:~^[a-z\d][a-z\d]*[_-]?[a-z\d]*[a-z\d ]$~i' . $slugValidate,
            'title' => 'required|min:5|max:100',
            'shortBody' => 'required|max:255',
            'largeBody' => 'required'
        ]);

        request()->has('published') ? $attributes['published'] = 1 : $attributes['published'] = 0;

        $attributes['owner_id'] = auth()->id();

        return $attributes;
    }
}
