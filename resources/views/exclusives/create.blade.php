@extends('layouts.limitless')

@section('title', 'Add New Exclusive')

@section('page_content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3>Add New Exclusive</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('exclusives.store') }}" method="POST" novalidate>
                @csrf

                <div class="mb-3 d-flex align-items-center">
                    <label for="name" class="form-label me-3 mb-0" style="width: 150px;">Exclusive Retailer *</label>
                    <input type="text" id="name" name="name"
                        value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="Enter line name"
                        required
                        style="flex-grow: 1;">
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('exclusives.index') }}" class="btn btn-secondary rounded-0">Cancel</a>
                    <button type="submit" class="btn btn-primary rounded-0">Create Exclusive</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
