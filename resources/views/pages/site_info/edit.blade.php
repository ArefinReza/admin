@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/plugin.css') }}">
@endpush

@section('content')

<div class="container">
    <h1 class="text-center mb-4">Edit Site Information</h1>
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('site_info.update', $siteInfo->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="sitename" class="form-label">Site Name</label>
                            <input type="text" name="sitename" id="sitename" class="form-control" value="{{ $siteInfo->sitename }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $siteInfo->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $siteInfo->phone_number }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="about" class="form-label">About</label>
                            <textarea name="about" id="about" class="form-control" rows="3">{{ $siteInfo->about }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="refund" class="form-label">Refund Policy</label>
                            <textarea name="refund" id="refund" class="form-control" rows="3">{{ $siteInfo->refund }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="parchase_guide" class="form-label">Purchase Guide</label>
                            <textarea name="parchase_guide" id="parchase_guide" class="form-control" rows="3">{{ $siteInfo->parchase_guide }}</textarea>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="privacy" class="form-label">Privacy Policy</label>
                            <textarea name="privacy" id="privacy" class="form-control" rows="3">{{ $siteInfo->privacy }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{ $siteInfo->address }}">
                        </div>
                        <div class="mb-3">
                            <label for="facebook_link" class="form-label">Facebook Link</label>
                            <input type="url" name="facebook_link" id="facebook_link" class="form-control" value="{{ $siteInfo->facebook_link }}">
                        </div>
                        <div class="mb-3">
                            <label for="twitter_link" class="form-label">Twitter Link</label>
                            <input type="url" name="twitter_link" id="twitter_link" class="form-control" value="{{ $siteInfo->twitter_link }}">
                        </div>
                        <div class="mb-3">
                            <label for="linkedin_link" class="form-label">LinkedIn Link</label>
                            <input type="url" name="linkedin_link" id="linkedin_link" class="form-control" value="{{ $siteInfo->linkedin_link }}">
                        </div>
                        <div class="mb-3">
                            <label for="copyright_text" class="form-label">Copyright Text</label>
                            <input type="text" name="copyright_text" id="copyright_text" class="form-control" value="{{ $siteInfo->copyright_text }}">
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">Update Site Info</button>
                </div>
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