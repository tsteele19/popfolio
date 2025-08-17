@extends('layouts.limitless')

@section('title', 'View Sale')

@section('page_content')
<div class="content">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Sale Details</h5>
            <div class="d-flex align-items-center">
                {{-- Back Button --}}
                <a href="{{ route('pops.index') }}" class="btn btn-light me-3">
                    <i class="ph ph-arrow-left"></i>
                    Back to List
                </a>

                {{-- Action Dropdown Button --}}
                <div class="dropdown">
                    <button type="button" class="btn btn-primary" id="actionsDropdown" onclick="toggleDropdown()">
                        <i class="ph ph-gear me-2"></i>
                        Actions
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" id="actionsMenu" style="display: none;">
                        {{-- Edit --}}
                        <a href="{{ route('sales.edit', $sale) }}" class="dropdown-item">
                            <i class="ph ph-pencil me-2"></i>
                            Edit Sale
                        </a>
                        {{-- Delete--}}
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('sales.destroy', $sale) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this sale?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item text-danger" style="border: none; background: none; width: 100%; text-align: left;">
                                <i class="ph ph-trash me-2"></i>
                                Delete Sale
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <tbody>
                        {{-- Sale ID --}}
                        <tr>
                            <td>Sale ID</td>
                            <td>{{ $sale->pop->id }}</td>
                        </tr>

                        {{-- Pop! Name --}}
                        <tr>
                            <td>Pop! Name</td>
                            <td>{{ $sale->pop->name }}</td>
                        </tr>

                        {{-- Pop! ID --}}
                        <tr>
                            <td>Pop! ID</td>
                            <td>{{ $sale->pop->id }}</td>
                        </tr>

                        {{-- Chase? --}}
                        <tr>
                            <td>Chase?</td>
                            <td>{{ $sale->pop->chase ? 'Yes' : 'No' }}</td>
                        </tr>

                        {{-- Number --}}
                        <tr>
                            <td>Pop! Number</td>
                            <td>{{ $sale->pop->number }}</td>
                        </tr>

                        {{-- Category --}}
                        <tr>
                            <td>Category</td>
                            <td>{{ $sale->pop->category->name }}</td>
                        </tr>

                        {{-- License --}}
                        <tr>
                            <td>License</td>
                            <td>{{ $sale->pop->license ?? '' }}</td>
                        </tr>

                        {{-- Exclusive --}}
                        <tr>
                            <td>Exclusive Retailer</td>
                            <td>{{ $sale->pop->exclusive->name ?? '' }}</td>
                        </tr>

                        {{-- Variant --}}
                        <tr>
                            <td>Variant</td>
                            <td>{{ $sale->pop->variant->name ?? '' }}</td>
                        </tr>

                        {{-- Price Paid --}}
                        <tr>
                            <td>Price Paid</td>
                            <td>${{ number_format($sale->pop->price_paid, 2) }}</td>
                        </tr>

                        {{-- Sale Price --}}
                        <tr>
                            <td>Sale Price</td>
                            <td>${{ number_format($sale->sale_price, 2) }}</td>
                        </tr>

                        {{-- Worth --}}
                        <tr>
                            <td>Worth</td>
                            <td>${{ number_format($sale->pop->worth, 2) }} </td>
                        </tr>

                        {{-- Profit --}}
                        <tr>
                            <td>Profit</td>
                            <td>
                                @if($sale->profit >= 0)
                                    <span class="text-success">${{ number_format($sale->profit, 2) }}</span>
                                @else
                                    <span class="text-danger">-${{ number_format(abs($sale->profit), 2) }}</span>
                                @endif
                            </td>
                        </tr>

                        {{-- Sale Date --}}
                        <tr>
                            <td>Sale Date</td>
                            <td>{{ $sale->sale_date }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function toggleDropdown() {
    const menu = document.getElementById('actionsMenu');
    if (menu.style.display === 'none' || menu.style.display === '') {
        menu.style.display = 'block';
        menu.style.position = 'absolute';
        menu.style.right = '0';
        menu.style.zIndex = '1000';
    } else {
        menu.style.display = 'none';
    }
}

// Close dropdown when clicking outside
document.addEventListener('click', function(event) {
    const dropdown = document.getElementById('actionsDropdown');
    const menu = document.getElementById('actionsMenu');

    if (!dropdown.contains(event.target) && !menu.contains(event.target)) {
        menu.style.display = 'none';
    }
});
</script>
@endsection
