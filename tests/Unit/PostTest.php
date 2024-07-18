<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Check if one category of post is a Category instance
     */
    public function test_post_has_categories(): void
    {
        $this->seed();
        $post = Post::whereHas('categories')->first();
        $category = $post->categories->first();
        $this->assertInstanceOf(Category::class, $category);
    }
    /**
     * Check if one comment of post is a Comment instance
     */
    public function test_post_has_comments(): void
    {
        $this->seed();
        $post = Post::whereHas('comments')->first();
        $comment = $post->comments->first();
        $this->assertInstanceOf(Comment::class, $comment);
    }
    /**
     * Check if post owner is a User instance
     */
    public function test_post_owner(): void
    {
        $this->seed();
        $post = Post::first();
        $owner = $post->owner;
        $this->assertInstanceOf(User::class, $owner);
    }
}
