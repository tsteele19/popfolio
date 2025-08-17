<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Pop;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Grab all sales and corresponding Pop info
        $sales = Sale::whereNull('deleted_at')
            ->with('pop')
            ->get();

        // Return view
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pop $pop)
    {
        // Return view
        return view('sales.create', compact('pop'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate data
        $validated = $request->validate([
            'pop_id' => ['required', 'exists:pops,id'],
            'sale_price' => ['required', 'numeric', 'min:0'],
            'sale_date' => ['required', 'date'],
        ]);

        // Get Pop model
        $pop = Pop::findOrFail($request->pop_id);

        // Create sale using function
        $sale = Sale::markAsSold($pop, $validated['sale_price'], $validated['sale_date']);

        // Return and redirect
        return redirect()->route('pops.index')->with('success', 'Pop marked as sold!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        // Grab sale and Pop info with relationships
        $sale->load([
            'pop' => function ($query) {
                $query->withTrashed()->with(['category', 'exclusive', 'variant']);
            }
        ]);

        // Return view
        return view('sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        // Grab sale and Pop info with relationships
        $sale->load([
            'pop' => function ($query) {
                $query->withTrashed()->with(['category', 'exclusive', 'variant']);
            }
        ]);

        // Return view
         return view ('sales.edit', compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        // Validate incoming data
        $validated = $request->validate([
            'sale_price' => ['required', 'numeric', 'min:0'],
            'sale_date' => ['required', 'date'],
        ]);

        // Update sale
        $sale->update([
            'sale_price' => $validated['sale_price'],
            'sale_date'  => $validated['sale_date'],
            // Recalculate profit in case price_paid has changed
            'profit'     => $validated['sale_price'] - ($sale->pop->price_paid ?? 0),
        ]);

        // Redirect back to sales index with success message
        return redirect()->route('sales.index')->with('success', 'Sale updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        // Perform soft delete
        $sale->delete();

        // Return and redirect
        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully!');
    }
}
