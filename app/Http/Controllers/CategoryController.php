<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        return response()->json(Category::all());
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(CategoryRequest $categoryRequest)
    {
        return Category::create($categoryRequest->validated());
    }

    /**
     * Display the specified category.
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Update the specified category in storage.
     */
    public function update(CategoryRequest $categoryRequest, Category $category)
    {
        $category->fill($categoryRequest->validated())->save();
        return $category;
    }

    /**
     * Remove the specified category (if not included in posts) from storage.
     */
    public function destroy(Category $category)
    {
        if(!$category->posts->count()) return response()->json(["message" => $category->destroy($category->id) ? true : false]);

        return response()->json(["message" => "Cannot delete a category included in posts"], 409);
    }
}
