@extends('layouts.limitless')

@section('title', 'Dashboard - Popfolio')

@section('page_content')
<div class="row">
    {{-- Total Pops --}}
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Total Pops</h5>
            </div>
            <div class="card-body">
                <p>{{ $total_pops }}</p>
            </div>
        </div>
    </div>

    {{-- Spent --}}
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Spent</h5>
            </div>
            <div class="card-body">
                <p>{{ $spent }}</p>
            </div>
        </div>
    </div>

    {{-- Worth --}}
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Worth</h5>
            </div>
            <div class="card-body">
                <p>{{ $total_worth }}</p>
            </div>
        </div>
    </div>

    {{-- Profit --}}
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Profit</h5>
            </div>
            <div class="card-body">
                <p>{{ $profit }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
