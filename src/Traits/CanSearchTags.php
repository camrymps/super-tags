<?php

namespace Camrymps\SuperTags\Traits;

use Illuminate\Database\Eloquent\Model;
use Camrymps\SuperTags\Tag;

trait CanSearchTags {


    public function search_tags($query)
    {
        return Tag::where('tag', 'like', '%'.$query.'%')->get()->unique('tag');
    }

}
