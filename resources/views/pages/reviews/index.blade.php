@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/plugin.css') }}">
@endpush

@section('content')



<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Reviews</h4>
            <div class="mb-3">
                <a href="{{ route('reviews.create') }}" class="btn btn-success">Add Review <i class="mdi mdi-plus"></i></a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Client Name</th>
                            <th>Client Image</th>
                            <th>Feedback</th>
                            <th>Rating</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $review)
                        <tr>
                            <td>{{ $review->client_name }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $review->client_image) }}" alt="Client Image" class="img-thumbnail" width="50">
                            </td>
                            <td>{{ $review->feedback }}</td>
                            <td>{{ $review->rating }}</td>
                            <td>
                                <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-outline-secondary">
                                    <i class="mdi mdi-pencil"></i>
                                </a>
                                <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-secondary"><i class="mdi mdi-delete"></i></button>
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

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endpush