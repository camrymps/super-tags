<?php

namespace Tests;

use Illuminate\Database\Eloquent\Model;

use Camrymps\SuperTags\Traits\CanBeTagged;

class Post extends Model
{
    use CanBeTagged;

    protected $fillable = ['title'];
}
