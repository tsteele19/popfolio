@extends('layouts.limitless')

@section('title', 'Edit Sale')

@section('page_content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3>Edit Sale</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('sales.update', $sale->id) }}" method="POST" novalidate>
                @csrf
                @method('PUT')

                {{-- Hidden Pop! ID --}}
                <input type="hidden" name="pop_id" value="{{ $sale->pop_id }}">

                {{-- Pop! Name --}}
                <div class="mb-3">
                    <label class="form-label">Pop</label>
                    <p><strong>{{ $sale->pop->name }}</strong></p>
                </div>

                {{-- Sale price --}}
                <div class="mb-3">
                    <label for="sale_price" class="form-label">Sale Price</label>
                    <input
                        type="text"
                        id="sale_price"
                        name="sale_price"
                        value="{{ old('sale_price', $sale->sale_price) }}"
                        class="form-control"
                        required
                    >
                    @error('sale_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Sale date --}}
                <div class="mb-3">
                    <label for="sale_date" class="form-label">Sale Date</label>
                    <input
                        type="date"
                        id="sale_date"
                        name="sale_date"
                        value="{{ old('sale_date', $sale->sale_date->format('Y-m-d')) }}"
                        class="form-control"
                        required
                    >
                    @error('sale_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Sale</button>
            </form>
        </div>
    </div>
</div>
@endsection
