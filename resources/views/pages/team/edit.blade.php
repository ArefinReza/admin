@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/plugin.css') }}">
@endpush

@section('content')

<div class="col-lg-8 mx-auto">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Team Member</h4>
            <form action="{{ route('team.update', $teamMember->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $teamMember->name ?? old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <input type="text" class="form-control" id="role" name="role" value="{{ $teamMember->role ?? old('role') }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $teamMember->email ?? old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="portfolio">Portfolio</label>
                    <input type="url" class="form-control" id="portfolio" name="portfolio" value="{{ $teamMember->portfolio ?? old('portfolio') }}">
                </div>
                <div class="form-group">
                    <label for="photo_url">Photo</label>
                    <input type="file" class="form-control" id="photo_url" name="photo_url">
                    @if(isset($teamMember->photo_url))
                    <img src="{{ asset('storage/' . $teamMember->photo_url) }}" class="img-thumbnail mt-2" width="100">
                    @endif
                </div>
                <div class="form-group">
                    <label for="facebookLink">Facebook Link</label>
                    <input type="url" class="form-control" id="facebookLink" name="facebookLink" value="{{ $teamMember->facebookLink ?? old('facebookLink') }}">
                </div>
                <div class="form-group">
                    <label for="linkedinLink">LinkedIn Link</label>
                    <input type="url" class="form-control" id="linkedinLink" name="linkedinLink" value="{{ $teamMember->linkedinLink ?? old('linkedinLink') }}">
                </div>
                <div class="form-group">
                    <label for="phonenumber">Phone Number</label>
                    <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="{{ $teamMember->phonenumber ?? old('phonenumber') }}">
                </div>
                <div class="form-group">
                    <label for="whatsapp">WhatsApp</label>
                    <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ $teamMember->whatsapp ?? old('whatsapp') }}">
                </div>
                <div class="form-group">
                    <label for="education">Education</label>
                    <input type="text" class="form-control" id="education" name="education" value="{{ $teamMember->education ?? old('education') }}">
                </div>
                <div class="form-group">
                    <label for="skills">Skills</label>
                    <textarea class="form-control" id="skills" name="skills">{{ $teamMember->skills ?? old('skills') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="experience">Experience</label>
                    <textarea class="form-control" id="experience" name="experience">{{ $teamMember->experience ?? old('experience') }}</textarea>
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