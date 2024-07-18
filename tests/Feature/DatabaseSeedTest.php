<?php

namespace Tests\Feature;

use Tests\TestCase;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseSeedTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Check if the database can be initialized and that all tables have the correct number of records
     */
    public function test_database_can_be_seeded(): void
    {
        $this->seed();
        $this->assertDatabaseCount('categories', 4);
        $this->assertDatabaseCount('comments', 6);
        $this->assertDatabaseCount('posts', 4);
        $this->assertDatabaseCount('users', 3);
    }
    /**
     * Test Categories crud
     */
    public function test_categories_crud(): void
    {
        $category = Category::factory()->create();
        $this->assertModelExists($category);
        $category->name = "category edited test";
        $category->slug = "category edited slug";
        $category->save();
        $this->assertTrue($category->wasChanged());
        $category->delete();
        $this->assertModelMissing($category);
    }
    /**
     * Test Comments crud
     */
    public function test_comments_crud(): void
    {
        $this->seed();
        $comment = Comment::all()->random();
        $this->assertModelExists($comment);
        $comment->content = "comment edited test";
        $comment->save();
        $this->assertTrue($comment->wasChanged());
        $comment->delete();
        $this->assertModelMissing($comment);
    }
    /**
     * Test post crud
     */
    public function test_posts_crud(): void
    {
        $this->seed(UserSeeder::class);
        $post = Post::factory()->create();
        $this->assertModelExists($post);
        $post->title = "post title edited test";
        $post->slug = "post edited slug";
        $post->save();
        $this->assertTrue($post->wasChanged());
        $post->delete();
        $this->assertModelMissing($post);
    }
    /**
     * Test users crud
     */
    public function test_users_crud(): void
    {
        $user = User::factory()->create();
        $this->assertModelExists($user);
        $user->full_name = "user edited test";
        $user->save();
        $this->assertTrue($user->wasChanged());
        $user->delete();
        $this->assertModelMissing($user);
    }
}
