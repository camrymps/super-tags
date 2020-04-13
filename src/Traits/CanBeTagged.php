<?php

namespace Camrymps\SuperTags\Traits;

use Illuminate\Database\Eloquent\Model;
use Camrymps\SuperTags\Tag;

trait CanBeTagged
{
    /**
     * Get all of the tags linked to this model.
     */
    public function tags()
    {
        return $this->morphMany(Tag::class, 'taggable');
    }
}
