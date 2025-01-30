@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/plugin.css') }}">
@endpush

@section('content')

<div class="col-lg-6 mx-auto">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Review</h4>
            <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="client_name">Client Name</label>
                    <input type="text" class="form-control" id="client_name" name="client_name" required>
                </div>
                <div class="form-group">
                    <label for="client_image">Client Image</label>
                    <input type="file" class="form-control" id="client_image" name="client_image" required>
                </div>
                <div class="form-group">
                    <label for="feedback">Feedback</label>
                    <textarea class="form-control" id="feedback" name="feedback" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
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
