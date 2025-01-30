@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/plugin.css') }}">
@endpush

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Projects</h4>
            <div class="mb-3">
                <a href="{{ url('/projects/create') }}" class="btn btn-success">
                    Add Project <i class="mdi mdi-plus"></i>
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Images</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->title }}</td>
                                <td>{{ Str::limit($project->description, 50) }}</td>
                                <td>
                                    @if($project->images)
                                        <div class="d-flex flex-wrap">
                                            @foreach ($project->images as $image)
                                                <img src="{{ asset('storage/' . $image) }}" alt="Project Image" class="img-thumbnail mr-2" width="50">
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="text-muted">No Images</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Edit Button -->
                                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-outline-secondary">
                                        <i class="mdi mdi-pencil"></i>
                                    </a>
                                    <!-- Delete Button -->
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-secondary">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
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
