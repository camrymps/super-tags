<?php

namespace Camrymps\SuperTags\Traits;

use Illuminate\Database\Eloquent\Model;
use Camrymps\SuperTags\Tag;

trait CanTag
{
    /**
     * Adds a tag to a certain model.
     *
     * @param Model $model
     * @param array $tags
     */
    public function tag(Model $model, array $tags)
    {
        $entities = [];

        foreach($tags as $tag) {
            // If this tag does not already exist on this model...
            if (!$this->has_tag($model, $tag)) {
                array_push($entities, new Tag(['tag' => $tag]));
            }
        }

        // If there are any tags to save...
        if (count($entities) > 0) {
            return $model->tags()->saveMany($entities);
        }

        return null;
    }

    /**
     * Checks if a model has a certain tag.
     *
     * @param Model $model
     * @param string $tag
     */
    public function has_tag(Model $model, string $tag)
    {
        return $model
            ->tags()
            ->where('tag', $tag)
            ->exists();
    }
}
