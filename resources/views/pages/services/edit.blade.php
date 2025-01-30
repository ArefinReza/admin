@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')

<div class="col-lg-6 grid-margin stretch-card mx-auto">
    <div class="card shadow-lg">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Edit Service</h3>
            <p class="card-description text-muted text-center">Modify the details of the service</p>
            <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" 
                           value="{{ old('title', $service->title) }}" placeholder="Enter service title" required>
                    @error('title')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5" 
                              placeholder="Enter service description" required>{{ old('description', $service->description) }}</textarea>
                    @error('description')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="icon" class="form-label">Upload Icon</label>
                    <input type="file" class="form-control-file" id="icon" name="icon" accept="image/*">
                    @if($service->icon_url)
                        <div class="mt-3">
                            <p>Current Icon:</p>
                            <img src="{{ asset('storage/' . $service->icon_url) }}" alt="Icon" 
                                 class="img-thumbnail rounded" style="max-width: 100px; max-height: 100px;">
                        </div>
                    @endif
                    @error('icon')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary btn-block px-4">Update Service</button>
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
