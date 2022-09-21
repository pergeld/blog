<?php

namespace App\Traits;

use Cviebrock\EloquentSluggable\Sluggable;

trait Slugs
{
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function findOrFailBySlug($slug)
    {
        return (new static)->getModel()->where('slug', $slug)->firstOrFail();
    }
}
