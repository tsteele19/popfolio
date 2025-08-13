@extends('layouts.limitless')

@section('title', 'Pop! Collection')

@section('page_content')
<div class="content">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Pops!</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pops as $pop)
                            <tr>
                                <td>{{ $pop->name }}</td>
                                <td>{{ $pop->created_at->format('M d, Y') }}</td>
                                <td>
                                    <a href="{{ route('pops.show', $pop) }}" class="btn btn-sm btn-info me-1">
                                        <i class="ph ph-eye"></i> Show
                                    </a>

                                    <form method="POST" action="{{ route('pops.destroy', $pop) }}" style="display: inline-block;"
                                        onsubmit="return confirm('Are you sure you want to delete this line?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="ph ph-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
