<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all variants
        $variants = Variant::whereNull('deleted_at')->get();

        // Return view
        return view('variants.index', compact('variants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return view
        return view('variants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate data
        $validated = $request->validate([
            'name' => ['string', 'required', 'max:255']
        ]);

        // Create db entry
        $variant = Variant::create($validated);

        return redirect()->route('variants.index')
            ->with('success', 'Variant created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find variant
        $variant = Variant::where('id', $id)->firstOrFail();

        // Return view
        return view ('variants.show', compact('variant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Variant $variant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Variant $variant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Variant $variant)
    {
        //
    }
}
