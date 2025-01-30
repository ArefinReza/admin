@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/plugin.css') }}">
@endpush

@section('content')

<div class="container py-5">
    <h2>Create New Project</h2>
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Project Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter project title" required>
        </div>
        <div class="form-group">
            <label for="description">Project Description</label>
            <textarea name="description" class="form-control" id="description" rows="4" placeholder="Enter project description" required></textarea>
        </div>
        <div class="form-group">
            <label for="images">Project Images</label>
            <input type="file" name="images[]" class="form-control" id="images" multiple>
            <small class="form-text text-muted">You can upload multiple images.</small>
        </div>
        <button type="submit" class="btn btn-primary">Create Project</button>
    </form>
</div>

@endsection

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endpush