@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/plugin.css') }}">
@endpush

@section('content')

<div class="container py-5">
    <h2>Edit Project</h2>
    <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Project Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $project->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Project Description</label>
            <textarea name="description" class="form-control" id="description" rows="4" required>{{ $project->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="images">Add More Images</label>
            <input type="file" name="images[]" class="form-control" id="images" multiple>
            <small class="form-text text-muted">You can upload additional images.</small>
        </div>
        <div class="form-group">
            <label>Existing Images:</label>
            <div class="d-flex flex-wrap">
                @foreach ($project->images as $image)
                    <div class="mr-3 mb-2">
                        <img src="{{ asset('storage/' . $image) }}" alt="Project Image" class="img-thumbnail" width="100">
                    </div>
                @endforeach
            </div>
        </div>
        <button type="submit" class="btn btn-warning">Update Project</button>
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
