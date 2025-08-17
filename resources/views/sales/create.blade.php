@extends('layouts.limitless')

@section('title', 'Sell Pop!')

@section('page_content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3>Sell Pop!</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('sales.store') }}" method="POST" novalidate>
                @csrf
                {{-- Hidden Pop! ID --}}
                <input type="hidden" name="pop_id" value="{{ $pop->id }}">

                {{-- Pop! Name --}}
                <div class="mb-3">
                    <label class="form-label">Pop</label>
                    <p><strong>{{ $pop->name }}</strong></p>
                </div>

                {{-- Sale price --}}
                <div class="mb-3">
                    <label for="sale_price" class="form-label">Sale Price</label>
                    <input type="text" id="sale_price" name="sale_price" value="{{ old('sale_price') }}" class="form-control" required>
                    @error('sale_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Sale date --}}
                <div class="mb-3">
                    <label for="sale_date" class="form-label">Sale Date</label>
                    <input type="date" id="sale_date" name="sale_date" value="{{ old('sale_date', date('Y-m-d')) }}" class="form-control" required>
                    @error('sale_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Mark as Sold</button>
            </form>
        </div>
    </div>
</div>
@endsection
