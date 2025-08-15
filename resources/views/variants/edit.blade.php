@extends('layouts.limitless')

@section('title', 'Edit Variant')

@section('page_content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3>Edit Variant</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('variants.update', $variant) }}" method="POST" novalidate>
                @csrf
                @method('PUT')

                {{-- ID --}}
                <div class="mb-3">
                    <div class="d-flex align-items-center">
                        <label for="id" class="form-label me-3 mb-0" style="width: 150px;">Variant ID</label>
                        <div class="flex-grow-1">
                            <input type="text" id="id" class="form-control" value="{{ $variant->id }}" disabled>
                            <input type="hidden" name="id" value="{{ $variant->id }}">
                        </div>
                    </div>
                </div>

                {{-- Name --}}
                <div class="mb-3">
                    <div class="d-flex align-items-center">
                        <label for="name" class="form-label me-3 mb-0" style="width: 150px;">Variant Name</label>
                        <div class="flex-grow-1">
                            <input type="text" id="name" name="name"
                                value="{{ $variant->name }}"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter retailer name"
                                required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('variants.show', $variant) }}" class="btn btn-secondary rounded-0">Cancel</a>
                    <button type="submit" class="btn btn-primary rounded-0">Update Variant</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
