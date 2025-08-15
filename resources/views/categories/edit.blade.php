@extends('layouts.limitless')

@section('title', 'Edit Category Details')

@section('page_content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3>Edit Category</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.update', $category) }}" method="POST" novalidate>
                @csrf
                @method('PUT')

                {{-- ID --}}
                <div class="mb-3">
                    <div class="d-flex align-items-center">
                        <label for="id" class="form-label me-3 mb-0" style="width: 150px;">Category ID</label>
                        <div class="flex-grow-1">
                            <input type="text" id="id" class="form-control" value="{{ $category->id }}" disabled>
                            <input type="hidden" name="id" value="{{ $category->id }}">
                        </div>
                    </div>
                </div>

                {{-- Name --}}
                <div class="mb-3">
                    <div class="d-flex align-items-center">
                        <label for="name" class="form-label me-3 mb-0" style="width: 150px;">Category Name</label>
                        <div class="flex-grow-1">
                            <input type="text" id="name" name="name"
                                value="{{ $category->name }}"
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
                    <a href="{{ route('categories.show', $category) }}" class="btn btn-secondary rounded-0">Cancel</a>
                    <button type="submit" class="btn btn-primary rounded-0">Update Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
