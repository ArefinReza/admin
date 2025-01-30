@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')

<div class="col-lg-6 grid-margin stretch-card mx-auto">
    <div class="card shadow-lg">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Create New Service</h3>
            <p class="card-description text-muted text-center">Add a new service to the list</p>
            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" 
                           value="{{ old('title') }}" placeholder="Enter service title" required>
                    @error('title')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5" 
                              placeholder="Enter service description" required>{{ old('description') }}</textarea>
                    @error('description')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="icon" class="form-label">Upload Icon</label>
                    <input type="file" class="form-control-file" id="icon" name="icon" accept="image/*">
                    @error('icon')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success btn-block px-4">Create Service</button>
                    <a href="{{ route('services.index') }}" class="btn btn-secondary btn-block px-4">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush
