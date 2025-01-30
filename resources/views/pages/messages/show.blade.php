@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/plugin.css') }}">
@endpush

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Message Details</h4>

            <div class="mb-4">
                <strong>Name:</strong> {{ $message->name }} <br>
                <strong>Email:</strong> <a href="mailto:{{ $message->email }}">{{ $message->email }}</a> <br>
                <strong>Subject:</strong> {{ $message->subject }} <br>
                <strong>Sent On:</strong> {{ $message->created_at->format('d/m/Y H:i') }} <br>
            </div>

            <h5 class="mt-4">Message:</h5>
            <div class="p-3 mb-3" style="background-color: #f7f7f7; border-left: 5px solid #007bff;">
                {{ $message->message }}
            </div>

            <div class="mt-4">
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $message->email }}&su=Re: {{ urlencode($message->subject) }}&body={{ urlencode('Dear ' . $message->name . ',') }}&ui=2&tf=1" target="_blank" class="btn btn-success">Reply via Gmail</a>
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
