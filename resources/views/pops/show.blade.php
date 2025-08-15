@extends('layouts.limitless')

@section('title', 'View Pop!')

@section('page_content')
<div class="content">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Pop! Details</h5>
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
                        <a href="{{ route('pops.edit', $pop) }}" class="dropdown-item">
                            <i class="ph ph-pencil me-2"></i>
                            Edit Pop!
                        </a>
                        {{-- Delete --}}
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('pops.destroy', $pop) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this Pop!?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item text-danger" style="border: none; background: none; width: 100%; text-align: left;">
                                <i class="ph ph-trash me-2"></i>
                                Delete Pop!
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
                        <tr>
                            <td>ID</td>
                            <td>{{ $pop->id }}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $pop->name }}</td>
                        </tr>
                        <tr>
                            <td>Chase?</td>
                            <td>{{ $pop->chase ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <td>Number</td>
                            <td>{{ $pop->number }}</td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td>{{ $pop->category->name }}</td>
                        </tr>
                        <tr>
                            <td>License</td>
                            <td>{{ $pop->license ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Exclusive Retailer</td>
                            <td>{{ $pop->exclusive->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Variant</td>
                            <td>{{ $pop->variant->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Price Paid</td>
                            <td>${{ number_format($pop->price_paid, 2) }}</td>
                        </tr>
                        <tr>
                            <td>Worth</td>
                            <td>${{ number_format($pop->worth, 2) }} </td>
                        </tr>
                        <tr>
                            <td>Profit</td>
                            <td>
                                @if($pop->difference >= 0)
                                    <span class="text-success">${{ number_format($pop->difference, 2) }}</span>
                                @else
                                    <span class="text-danger">-${{ number_format(abs($pop->difference), 2) }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Data accurate as of:</td>
                            <td>{{ $pop->as_of_date }}</td>
                        </tr>
                        <tr>
                            <td>Date Created</td>
                            <td>{{ $pop->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Last Updated</td>
                            <td>{{ $pop->updated_at }}</td>
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
