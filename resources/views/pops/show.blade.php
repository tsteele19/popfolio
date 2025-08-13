@extends('layouts.limitless')

@section('title', 'View Pop!')

@section('page_content')
<div class="content">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Pop! Details</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td>{{ $pop->id }}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $pop->name }}</td>
                        </tr>
                        <tr>
                            <td>Chase?</td>
                            <td>{{ $pop->chase ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <td>Number</td>
                            <td>{{ $pop->number }}</td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td>{{ $pop->category->name }}</td>
                        </tr>
                        <tr>
                            <td>License</td>
                            <td>{{ $pop->license ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Exclusive Retailer</td>
                            <td>{{ $pop->exclusive->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Variant</td>
                            <td>{{ $pop->variant->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>Price Paid</td>
                            <td>{{ $pop->price_paid }}</td>
                        </tr>
                        <tr>
                            <td>Worth</td>
                            <td>{{ $pop->worth }} </td>
                        </tr>
                        <tr>
                            <td>Profit</td>
                            <td>{{ $pop->difference }}</td>
                        </tr>
                        <tr>
                            <td>Data accurate as of:</td>
                            <td>{{ $pop->as_of_date }}</td>
                        </tr>
                        <tr>
                            <td>Date Created</td>
                            <td>{{ $pop->created_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
