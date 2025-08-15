<?php

namespace App\Http\Controllers;

use App\Models\Pop;
use App\Models\Category;
use App\Models\Exclusive;
use App\Models\Variant;
use Illuminate\Http\Request;

class PopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all Lines
        $pops = Pop::whereNull('deleted_at')->get();

        // Return view
        return view('pops.index', compact('pops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get dropdown choices
        $category_dropdown = Category::whereNull('deleted_at')->get()->toArray();
        $exclusive_dropdown = Exclusive::whereNull('deleted_at')->get()->toArray();
        $variant_dropdown = Variant::whereNull('deleted_at')->get()->toArray();

        // Return view
        return view('pops.create', compact('category_dropdown', 'exclusive_dropdown', 'variant_dropdown'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate data
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'chase' => ['boolean'],
            'number' => ['required', 'integer'],
            'category_id' => ['required', 'uuid', 'exists:categories,id'],
            'license' => ['nullable', 'string', 'max:255'],
            'exclusive_id' => ['nullable', 'uuid', 'exists:exclusives,id'],
            'variant_id' => ['nullable', 'string', 'max:255'],
            'price_paid' => ['required', 'numeric', 'min:0'],
            'worth' => ['required', 'numeric', 'min:0'],
            'as_of_date' => ['required', 'date'],
        ], [
            'name.required' => 'Pop! name is required.',
            'category_id.required' => 'Pop! category is required.',
            'category_id.exists' => 'Selected category does not exist.',
            'exclusive_id.exists' => 'Selected exclusive does not exist.',
            'license.string' => 'Pop! license must be text.',
            'price_paid.numeric' => 'Price paid must be a valid number.',
            'worth.numeric' => 'Worth must be a valid number.',
            'as_of_date.date' => 'Please enter a valid date.',
        ]);

        // Determine difference and safety checks
        $price_paid = (float) $validated['price_paid'];
        $worth = (float) $validated['worth'];
        $difference = round($worth - $price_paid, 2);

        // Add to validated data
        $validated['difference'] = $difference;

        // Create/store entry
        Pop::create($validated);

        // Return and redirect
        return redirect()->route('pops.index')->with('success', 'Pop! created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pop $pop)
    {
        // Load relationships
        $pop->load('category');
        $pop->load('exclusive');
        $pop->load('variant');

        // Return view
        return view ('pops.show', compact('pop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pop $pop)
    {
        // Load relationships
        $pop->load('category');
        $pop->load('exclusive');
        $pop->load('variant');

        // Create dropdown choices
        $category_dropdown = Category::whereNull('deleted_at')->get()->toArray();
        $exclusive_dropdown = Exclusive::whereNull('deleted_at')->get()->toArray();
        $variant_dropdown = Variant::whereNull('deleted_at')->get()->toArray();

        // Return view
         return view ('pops.edit', compact(
            'pop',
            'category_dropdown',
            'exclusive_dropdown',
            'variant_dropdown',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pop $pop)
    {
        // Validate data
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'chase' => ['boolean'],
            'number' => ['required', 'integer'],
            'category_id' => ['required', 'uuid', 'exists:categories,id'],
            'license' => ['nullable', 'string', 'max:255'],
            'exclusive_id' => ['nullable', 'uuid', 'exists:exclusives,id'],
            'variant_id' => ['nullable', 'string', 'max:255'],
            'price_paid' => ['required', 'numeric', 'min:0'],
            'worth' => ['required', 'numeric', 'min:0'],
        ]);

        // Determine difference and safety checks
        $price_paid = (float) $validated['price_paid'];
        $worth = (float) $validated['worth'];
        $difference = round($worth - $price_paid, 2);

        // Add to validated
        $validated['difference'] = $difference;

        // Update the record
        $pop->update($validated);

        // Return and redirect
        return redirect()->route('pops.show', $pop)->with('success', 'Pop! updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pop $pop)
    {
        // Perform soft delete
        $pop->delete();

        // Return and redirect
        return redirect()->route('pops.index')->with('success', 'Pop! deleted successfully!');
    }
}
