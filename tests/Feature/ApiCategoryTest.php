<?php

namespace Tests\Feature;

use Tests\TestCase;

use App\Models\Category;

class ApiCategoryTest extends TestCase
{
    /**
     * Check if validation works and new category is created
     */
    public function test_create_new_category(): void
    {
        $payload = [
            "name" => "nueva categoria test",
            "slug" => "etiqueta test",
            "visible" => "false"
        ];

        $response_unprocessable = $this->postJson("/api/categories", $payload);
        $response_unprocessable
            ->assertUnprocessable();

        $payload['visible'] = false;

        $response = $this->postJson("/api/categories", $payload);
        $response
            ->assertCreated();
    }
    /**
     * Check if all categories are retourned
     */
    public function test_get_all_categories(): void
    {
        $response = $this->get("/api/categories");

        $response
            ->assertStatus(200)
            ->assertJsonCount(Category::all()->count());
    }

    /**
     * Check if category by id is retourned
     */
    public function test_get_category_by_id(): void
    {
        $category = Category::first();
        $response = $this->get("/api/categories/{$category->id}");

        $response
            ->assertStatus(200)
            ->assertJsonIsObject()
            ->assertJson($category->toArray());
    }
    /**
     * Check if category is updated
     */
    public function test_update_category(): void
    {
        $category = Category::orderBy('id', 'DESC')->first();

        $category->name = "categoría test editada";
        $category->slug = "etiqueta test editada";
        $category->visible = true;

        $response = $this->putJson("/api/categories/{$category->id}", $category->toArray());
        $response
            ->assertStatus(200)
            ->assertJsonIsObject()
            ->assertJson($category->toArray());
    }
    /**
     * Check if category is deleted
     */
    public function test_delete_category(): void
    {
        $category = Category::orderBy('id', 'DESC')->first();
        $response = $this->delete("/api/categories/{$category->id}");

        $response
            ->assertOk()
            ->assertJson(["message" => true]);

        $response_not_found = $this->delete("/api/categories/{$category->id}");

        $response_not_found
            ->assertNotFound();
    }
}
