@extends('layouts.limitless')

@section('title', 'Sales')

@section('page_content')
<div class="content">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Sales</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Pop! Name</th>
                            <th>Price Paid</th>
                            <th>Sale Price</th>
                            <th>Profit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sales as $sale)
                            <tr>
                                <td>{{ $sale->pop->name }}</td>
                                <td>${{ $sale->pop->price_paid }}</td>
                                <td>${{ number_format($sale->sale_price, 2) }}</td>

                                <td>
                                    @if ($sale->profit > 0)
                                        <span class="text-success">${{ number_format($sale->profit, 2) }}</span>
                                    @else
                                        <span class="text-danger">${{ number_format($sale->profit, 2) }}</span>
                                    @endif
                                </td>
                                <td>
                                    {{-- Show --}}
                                    <a href="{{ route('sales.show', $sale) }}" class="btn btn-sm btn-info me-2">
                                        <i class="ph ph-eye"></i> Show
                                    </a>

                                    {{-- Delete --}}
                                    <form method="POST" action="{{ route('sales.destroy', $sale) }}" style="display: inline-block;"
                                        onsubmit="return confirm('Are you sure you want to delete this sale?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="ph ph-trash"></i> Delete
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
