@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/plugin.css') }}">
@endpush

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Banners</h4>
            <div class="mb-3">
                <a href="{{ route('banner.create') }}" class="btn btn-success">Add Banner <i class="mdi mdi-plus"></i></a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Banner Image</th>
                            <th>Who We Are</th>
                            <th>Intro Video</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $banner)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $banner->banner_image) }}" alt="Banner Image" class="img-thumbnail" width="100">
                            </td>
                            <td>{{ $banner->who_we_are }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $banner->intro_video) }}" target="_blank">View Video</a>
                            </td>
                            <td>
                                <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-outline-secondary">
                                    <i class="mdi mdi-pencil"></i>
                                </a>
                                <form action="{{ route('banner.destroy', $banner->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-secondary"><i class="mdi mdi-delete"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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