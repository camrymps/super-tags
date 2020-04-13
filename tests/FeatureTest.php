<?php

namespace Tests;

use Camrymps\SuperTags\Tag;
use Camrymps\SuperTags\Traits\CanTag;
use Camrymps\SuperTags\Traits\CanSearchTags;

class FeatureTest extends TestCase
{
    use CanTag, CanSearchTags;

    public function test_tags()
    {
        $post_1 = Post::create(['title' => 'Test 1']);
        $post_2 = Post::create(['title' => 'Test 2']);

        $post_1_tags = $this->tag($post_1, [
            'toast',
            'toast-masters',
            'toasted-marshmallow'
        ]);

        $post_2_tags = $this->tag($post_2, [
            'fruit',
            'fruits-and-veggies',
            'fruity-pebbles',
            'more-fruit-man'
        ]);

        $this->assertEquals(3, count($post_1_tags));
        $this->assertInstanceOf(Tag::class, $post_1_tags[0]);
        $this->assertInstanceOf(Post::class, app($post_1_tags[0]->taggable_type));
        $this->assertEquals(1, $post_1_tags[0]->taggable_id);

        $this->assertEquals(4, count($post_2_tags));
        $this->assertInstanceOf(Tag::class, $post_2_tags[0]);
        $this->assertInstanceOf(Post::class, app($post_2_tags[0]->taggable_type));
        $this->assertEquals(2, $post_2_tags[0]->taggable_id);

        $this->assertEquals(3, $this->search_tags('ma')->count());
    }
}
