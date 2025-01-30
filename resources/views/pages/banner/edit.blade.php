@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/plugin.css') }}">
@endpush

@section('content')

<div class="col-lg-6 mx-auto">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Banner</h4>
            <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="banner_image">Banner Image</label>
                    <input type="file" class="form-control" id="banner_image" name="banner_image">
                    <img src="{{ asset('storage/' . $banner->banner_image) }}" alt="Banner Image" class="img-thumbnail mt-2" width="100">
                </div>
                <div class="form-group">
                    <label for="who_we_are">Who We Are</label>
                    <textarea class="form-control" id="who_we_are" name="who_we_are" rows="3" required>{{ $banner->who_we_are }}</textarea>
                </div>
                <div class="form-group">
                    <label for="intro_video">Intro Video</label>
                    <input type="file" class="form-control" id="intro_video" name="intro_video">
                    <a href="{{ asset('storage/' . $banner->intro_video) }}" target="_blank" class="d-block mt-2">View Current Video</a>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
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