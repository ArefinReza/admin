@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/plugin.css') }}">
@endpush

@section('content')

<div class="container">
    <h1>Create New Team Member</h1>
    <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" name="role" id="role" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="portfolio">Portfolio URL</label>
            <input type="text" name="portfolio" id="portfolio" class="form-control">
        </div>
        <div class="form-group">
            <label for="photo_url">Photo</label>
            <input type="file" name="photo_url" id="photo_url" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="facebookLink">Facebook Link</label>
            <input type="text" name="facebookLink" id="facebookLink" class="form-control">
        </div>
        <div class="form-group">
            <label for="linkedinLink">LinkedIn Link</label>
            <input type="text" name="linkedinLink" id="linkedinLink" class="form-control">
        </div>
        <div class="form-group">
            <label for="phonenumber">Phone Number</label>
            <input type="text" name="phonenumber" id="phonenumber" class="form-control">
        </div>
        <div class="form-group">
            <label for="whatsapp">WhatsApp Number</label>
            <input type="text" name="whatsapp" id="whatsapp" class="form-control">
        </div>
        <div class="form-group">
            <label for="education">Education</label>
            <input type="text" name="education" id="education" class="form-control">
        </div>
        <div class="form-group">
            <label for="skills">Skills</label>
            <input type="text" name="skills" id="skills" class="form-control">
        </div>
        <div class="form-group">
            <label for="experience">Experience</label>
            <input type="text" name="experience" id="experience" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create Team Member</button>
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