@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/plugin.css') }}">
@endpush

@section('content')


<div class="col-lg-6 mx-auto">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Banner</h4>
            <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="banner_image">Banner Image</label>
                    <input type="file" class="form-control" id="banner_image" name="banner_image" required>
                </div>
                <div class="form-group">
                    <label for="who_we_are">Who We Are</label>
                    <textarea class="form-control" id="who_we_are" name="who_we_are" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="intro_video">Intro Video</label>
                    <input type="file" class="form-control" id="intro_video" name="intro_video" required>
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