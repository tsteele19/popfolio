@extends('layouts.limitless')

@section('title', 'View Variants')

@section('page_content')
<div class="content">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Variant Details</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td>{{ $variant->id }}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $variant->name }}</td>
                        </tr>
                        <tr>
                            <td>Date Created</td>
                            <td>{{ $variant->created_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
