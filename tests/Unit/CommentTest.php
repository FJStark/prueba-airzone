<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Check if comment post is a Post instance
     */
    public function test_comment_post(): void
    {
        $this->seed();
        $comment = Comment::first();
        $post = $comment->post;
        $this->assertInstanceOf(Post::class, $post);
    }
    /**
     * Check if comment writer is a User instance
     */
    public function test_comment_writer(): void
    {
        $this->seed();
        $comment = Comment::first();
        $writer = $comment->writer;
        $this->assertInstanceOf(User::class, $writer);
    }
}
