<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all Categories
        $categories = Category::whereNull('deleted_at')->get();

        // Return view
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return view
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the data
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        // Create db entry
        $line = Category::create($validated);

        // Redirect and return
        return redirect()->route('categories.index')
            ->with('success', 'Line created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Get by ID
        $category = Category::where('id', $id)->firstOrfail();

        // Return the view
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
