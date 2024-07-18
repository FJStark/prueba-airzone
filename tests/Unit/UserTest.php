<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Models\User;
use App\Models\Comment;
use App\Models\Post;

use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_has_comments(): void
    {

        $this->seed();
        $user = User::whereHas('comments')->first();
        $comment = $user->comments->first();
        $this->assertInstanceOf(Comment::class, $comment);
    }

    public function test_user_has_posts(): void
    {
        $this->seed();
        $user = User::whereHas('posts')->first();
        $post = $user->posts->first();
        $this->assertInstanceOf(Post::class, $post);
    }
}
