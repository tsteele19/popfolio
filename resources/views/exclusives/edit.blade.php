@extends('layouts.limitless')

@section('title', 'Edit Retailer Details')

@section('page_content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3>Edit Retailer</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('exclusives.update', $exclusive) }}" method="POST" novalidate>
                @csrf
                @method('PUT')

                {{-- ID --}}
                <div class="mb-3">
                    <div class="d-flex align-items-center">
                        <label for="id" class="form-label me-3 mb-0" style="width: 150px;">Retailer ID</label>
                        <div class="flex-grow-1">
                            <input type="text" id="id" class="form-control" value="{{ $exclusive->id }}" disabled>
                            <input type="hidden" name="id" value="{{ $exclusive->id }}">
                        </div>
                    </div>
                </div>

                {{-- Name --}}
                <div class="mb-3">
                    <div class="d-flex align-items-center">
                        <label for="name" class="form-label me-3 mb-0" style="width: 150px;">Retailer Name</label>
                        <div class="flex-grow-1">
                            <input type="text" id="name" name="name"
                                value="{{ $exclusive->name }}"
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
                    <a href="{{ route('exclusives.show', $exclusive) }}" class="btn btn-secondary rounded-0">Cancel</a>
                    <button type="submit" class="btn btn-primary rounded-0">Update Retailer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
