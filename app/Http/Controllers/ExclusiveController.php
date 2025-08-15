<?php

namespace App\Http\Controllers;

use App\Models\Exclusive;
use Illuminate\Http\Request;

class ExclusiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all exclusives
        $exclusives = Exclusive::whereNull('deleted_at')->get();

        // Return the view
        return view('exclusives.index', compact('exclusives'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return view
        return view('exclusives.create');
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
        $exclusive = Exclusive::create($validated);

        // Redirect and return
        return redirect()->route('exclusives.index')
            ->with('success', 'Line created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find by ID
        $exclusive = Exclusive::where('id', $id)->firstOrFail();

        // Return the view
        return view('exclusives.show', compact('exclusive'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exclusive $exclusive)
    {
        // Return the view
        return view('exclusives.edit', compact('exclusive'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exclusive $exclusive)
    {
        // Validate the data
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        // Update record
        $exclusive->update($validated);

        // Return and redirect
        return redirect()->route('exclusives.show', $exclusive)->with('success', 'Retailer updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exclusive $exclusive)
    {
        // Perform soft delete
        $exclusive->delete();

        // Return and redirect
        return redirect()->route('exclusives.index')->with('success', 'Retailer deleted successfully!');
    }
}
