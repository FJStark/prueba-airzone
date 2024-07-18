<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Post;
use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
     /**
     * Check if one post of category is a Post instance
     */
    public function test_post_has_categories(): void
    {
        $this->seed();
        $category = Category::whereHas('posts')->first();
        $post = $category->posts->first();
        $this->assertInstanceOf(Post::class, $post);
    }
}
