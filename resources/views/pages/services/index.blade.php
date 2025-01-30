@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/plugin.css') }}">
@endpush

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Services</h4>
            <div>
                <a class="nav-link text-white" href="{{ url('/services/create') }}"><button class="btn btn-success w-6">Add Service<i class="mdi mdi-plus"></i></a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Icon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->title }}</td>
                            <td>{{ Str::limit($service->description, 3, '...') }}</td>
                            <td><img src="{{ asset('storage/' . $service->icon_url) }}" alt="Icon" style="width: 50px; height: 50px;"></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <!-- Edit Button -->
                                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-outline-secondary">
                                        <i class="mdi mdi-pencil"></i> <!-- Edit Icon -->
                                    </a>
                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-secondary"><i class="mdi mdi-delete"></i></button>
                                    </form>
                                    <!-- Delete Button Modal-->
                                    <!-- <button type="submit" class="btn btn-outline-secondary" data-toggle="modal"
                                        data-target="#deleteModal{{ $service->id }}">
                                        <i class="mdi mdi-delete"></i>
                                    </button> -->

                                </div>
                            </td>
                        </tr>

                        <!-- Delete Confirmation Modal -->

                        <div class="modal fade" id="deleteModal{{ $service->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $service->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content shadow-lg">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $service->id }}">Confirm Delete</h5>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <h6 class="fw-bold mb-3 text-danger">Are you sure?</h6>
                                        <p class="mb-1">You are about to delete the service:</p>
                                        <p class="fw-bold text-primary">"{{ $service->title }}"</p>
                                        <p class="text-danger mt-3">This action cannot be undone!</p>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger delete-service-btn">Yes, Delete</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
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