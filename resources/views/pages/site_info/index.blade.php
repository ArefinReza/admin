@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/plugin.css') }}">
@endpush

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-10 col-md-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white text-center">
                <h3 class="card-title mb-0">Site Information</h3>
            </div>
            <div class="card-body">
                @if($siteInfo)
                <!-- Two-Column Layout -->
                <div class="row">
                    <!-- Column 1 -->
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Site Name:</strong> {{ $siteInfo->sitename }}</li>
                            <li class="list-group-item"><strong>Email:</strong> {{ $siteInfo->email }}</li>
                            <li class="list-group-item"><strong>Phone Number:</strong> {{ $siteInfo->phone_number }}</li>
                            <li class="list-group-item"><strong>About:</strong> {{ $siteInfo->about }}</li>
                            <li class="list-group-item"><strong>Refund Policy:</strong> {{ $siteInfo->refund }}</li>
                        </ul>
                    </div>
                    <!-- Column 2 -->
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Purchase Guide:</strong> {{ $siteInfo->parchase_guide }}</li>
                            <li class="list-group-item"><strong>Privacy Policy:</strong> {{ $siteInfo->privacy }}</li>
                            <li class="list-group-item"><strong>Address:</strong> {{ $siteInfo->address }}</li>
                            <li class="list-group-item"><strong>Facebook:</strong> 
                                <a href="{{ $siteInfo->facebook_link }}" target="_blank">{{ $siteInfo->facebook_link }}</a>
                            </li>
                            <li class="list-group-item"><strong>Twitter:</strong> 
                                <a href="{{ $siteInfo->twitter_link }}" target="_blank">{{ $siteInfo->twitter_link }}</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Copyright Section -->
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            <strong>Copyright:</strong> {{ $siteInfo->copyright_text }}
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="text-center mt-4">
                    <a href="{{ route('site_info.edit', $siteInfo->id) }}" class="btn btn-warning btn-lg me-2">
                        <i class="mdi mdi-pencil"></i> Edit
                    </a>
                    <form action="{{ route('site_info.destroy', $siteInfo->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-lg">
                            <i class="mdi mdi-delete"></i> Delete
                        </button>
                    </form>
                </div>
                @else
                <!-- No Information Available -->
                <p class="text-center text-muted">No site information available. Please add one.</p>
                <div class="text-center mt-4">
                    <a href="{{ route('site_info.create') }}" class="btn btn-primary btn-lg">
                        <i class="mdi mdi-plus"></i> Add Site Info
                    </a>
                </div>
                @endif
            </div>
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