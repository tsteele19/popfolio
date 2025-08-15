@extends('layouts.limitless')

@section('title', 'Dashboard - Popfolio')

@section('page_content')
<div class="container-fluid pt-4">
    <div class="row g-3">
        {{-- Total Pops --}}
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0">Total Pops</h5>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center">
                    <div class="text-center">
                        <h2 class="mb-0">{{ $total_pops }}</h2>
                        <small class="text">Items in collection</small>
                    </div>
                </div>
            </div>
        </div>

        {{-- Spent --}}
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0">Spent</h5>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center">
                    <div class="text-center">
                        <h2 class="mb-0">${{ number_format($spent, 2) }}</h2>
                        <small class="text">Total investment</small>
                    </div>
                </div>
            </div>
        </div>

        {{-- Worth --}}
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0">Worth</h5>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center">
                    <div class="text-center">
                        <h2 class="mb-0">${{ number_format($total_worth, 2) }}</h2>
                        <small class="text">Current value</small>
                    </div>
                </div>
            </div>
        </div>

        {{-- Profit --}}
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0">Profit</h5>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center">
                    <div class="text-center">
                        <h2 class="mb-0 {{ $profit >= 0 ? 'text-success' : 'text-danger' }}">
                            ${{ number_format($profit, 2) }}
                        </h2>
                        <small class="text">
                            {{ $profit >= 0 ? 'Gain' : 'Loss' }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
