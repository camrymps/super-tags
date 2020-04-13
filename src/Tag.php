<?php

namespace Camrymps\SuperTags;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag'];

    /**
     * Get all of the models that own tags.
     */
    public function taggable()
    {
        return $this->morphTo();
    }
}
