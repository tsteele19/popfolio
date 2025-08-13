<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pop;

class HomeController extends Controller
{
    // Index
    public function index()
    {
        // Count total Pops
        $total_pops = Pop::whereNull('deleted_at')
            ->count();

        // Monetary totals
        $total_worth = Pop::whereNull('deleted_at')
            ->sum('worth');
        $spent = Pop::sum('price_paid');
        $profit = $total_worth - $spent;

        return view('index', compact(
            'total_pops',
            'total_worth',
            'spent',
            'profit',
        ));
    }
}
