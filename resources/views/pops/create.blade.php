@extends('layouts.limitless')

@section('title', 'Add New Pop!')

@section('page_content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3>Add New Pop!</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('pops.store') }}" method="POST" novalidate>
                @csrf
                {{-- Name --}}
                <div class="mb-3">
                    <div class="d-flex align-items-center">
                        <label for="name" class="form-label me-3 mb-0" style="width: 150px;">Pop! Name *</label>
                        <div class="flex-grow-1">
                            <input type="text" id="name" name="name"
                                value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter Pop! name"
                                required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Chase --}}
                <div class="mb-3">
                    <div class="d-flex align-items-center">
                        <label for="chase" class="form-label me-3 mb-0" style="width: 150px;">Chase?</label>
                        <div class="flex-grow-1">
                            <div class="form-check">
                                <input type="checkbox" id="chase" name="chase" value="1"
                                    class="form-check-input @error('chase') is-invalid @enderror"
                                    {{ old('chase') ? 'checked' : '' }}>
                                <label class="form-check-label" for="chase">
                                    This is a Chase variant
                                </label>
                            </div>
                            @error('chase')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Number --}}
                <div class="mb-3">
                    <div class="d-flex align-items-center">
                        <label for="number" class="form-label me-3 mb-0" style="width: 150px;">Pop! Number *</label>
                        <div class="flex-grow-1">
                            <input type="text" id="number" name="number"
                                value="{{ old('number') }}"
                                class="form-control @error('number') is-invalid @enderror"
                                placeholder="Enter Pop! #"
                                required>
                            @error('number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Category --}}
                <div class="mb-3">
                    <div class="d-flex align-items-center">
                        <label for="category_id" class="form-label me-3 mb-0" style="width: 150px;">Pop! Category *</label>
                        <div class="flex-grow-1">
                            <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                                <option value="">Select one</option>
                                @foreach($category_dropdown as $category)
                                    <option value="{{ $category['id'] }}" {{ old('category_id') == $category['id'] ? 'selected' : '' }}>
                                        {{ $category['name'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- License --}}
                <div class="mb-3">
                    <div class="d-flex align-items-center">
                        <label for="license" class="form-label me-3 mb-0" style="width: 150px;">License</label>
                        <div class="flex-grow-1">
                            <input type="text" id="license" name="license"
                                value="{{ old('license') }}"
                                class="form-control @error('license') is-invalid @enderror"
                                placeholder="Enter collection (Godfather, Def Leppard, WWE, etc.)">
                            @error('license')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Exclusive --}}
                <div class="mb-3">
                    <div class="d-flex align-items-center">
                        <label for="exclusive_id" class="form-label me-3 mb-0" style="width: 150px;">Exclusive</label>
                        <div class="flex-grow-1">
                            <select id="exclusive_id" name="exclusive_id" class="form-control @error('exclusive_id') is-invalid @enderror" required>
                                <option value="">Select one</option>
                                @foreach($exclusive_dropdown as $exclusive)
                                    <option value="{{ $exclusive['id'] }}" {{ old('exclusive') == $exclusive['id'] ? 'selected' : '' }}>
                                        {{ $exclusive['name'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('exclusive_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Variant --}}
                <div class="mb-3">
                    <div class="d-flex align-items-center">
                        <label for="exclusive_id" class="form-label me-3 mb-0" style="width: 150px;">Exclusive</label>
                        <div class="flex-grow-1">
                            <select id="variant_id" name="variant_id" class="form-control @error('variant_id') is-invalid @enderror" required>
                                <option value="">Select one</option>
                                @foreach($variant_dropdown as $variant)
                                    <option value="{{ $variant['id'] }}" {{ old('exclusive') == $variant['id'] ? 'selected' : '' }}>
                                        {{ $variant['name'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('exclusive_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Price Paid --}}
                <div class="mb-3">
                    <div class="d-flex align-items-center">
                        <label for="price_paid" class="form-label me-3 mb-0" style="width: 150px;">Price Paid *</label>
                        <div class="flex-grow-1">
                            <input type="text" id="price_paid" name="price_paid"
                                value="{{ old('price_paid') }}"
                                class="form-control @error('price_paid') is-invalid @enderror"
                                placeholder="Enter price paid for Pop!"
                                required>
                            @error('price_paid')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Worth --}}
                <div class="mb-3">
                    <div class="d-flex align-items-center">
                        <label for="worth" class="form-label me-3 mb-0" style="width: 150px;">Worth *</label>
                        <div class="flex-grow-1">
                            <input type="text" id="worth" name="worth"
                                value="{{ old('worth') }}"
                                class="form-control @error('worth') is-invalid @enderror"
                                placeholder="Enter amount Pop! is currently worth."
                                required>
                            @error('worth')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- As Of --}}
                <div class="mb-3">
                    <div class="d-flex align-items-center">
                        <label for="as_of_date" class="form-label me-3 mb-0" style="width: 150px;">Data as of *</label>
                        <div class="flex-grow-1">
                            <input type="text" id="as_of_date" name="as_of_date"
                                value="{{ old('as_of_date') }}"
                                class="form-control @error('as_of_date') is-invalid @enderror"
                                placeholder="Enter date that the data entered is true."
                                required>
                            @error('as_of_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Difference --}}
                {{-- Location...? --}}

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('pops.create') }}" class="btn btn-secondary rounded-0">Cancel</a>
                    <button type="submit" class="btn btn-primary rounded-0">Add Pop!</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
