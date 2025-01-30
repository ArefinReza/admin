@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/plugin.css') }}">
<style>

</style>
@endpush

@section('content')
<div class="row">


    <div class="col-md-6 col-xl-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Todo</h4>
                <form action="{{ route('todos.store') }}" method="POST" class="mb-3">
                    @csrf
                    <div class="add-items d-flex">
                        <input type="text" name="title" class="form-control" placeholder="What do you need to do today?" required>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
                <div class="list-wrapper">
                    <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                        @foreach ($todos as $todo)
                        <li class="todo-item d-flex justify-content-between align-items-center">
                            <div class="todo-title d-flex align-items-center">
                                <span class="ml-3 {{ $todo->completed ? 'text-muted text-decoration-line-through' : '' }}">{{ $todo->title }}</span>
                            </div>
                            <div class="ml-auto">
                                <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </form>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end todos   -->

    <!-- start shedule -->

    <div class="col-md-6 col-xl-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Schedules</h4>
                @foreach($events as $event)
                <div class="shedule-list d-flex align-items-center justify-content-between mb-3">
                    <h3>{{ $event->date }}</h3> <!-- Replace with event date -->
                    <small> {{ $event->created_at }}</small>
                </div>
                <div class="event border-bottom py-3">
                    <p class="mb-2 font-weight-medium">{{ $event->event_title }}</p>
                    <div class="d-flex align-items-center">
                        <div class="badge badge-success">{{ $event->time }}</div>
                        <small class="text-muted ml-2">{{ $event->location }}</small>
                        <div class="image-grouped ml-auto">

                            <p>{{ $event->attendees}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-header">Create Event</div>
                <div class="card-body">
                    <form action="{{ route('schedules.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="event_title">Event Title</label>
                            <input type="text" name="event_title" id="event_title" class="form-control" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="date">Event Date</label>
                            <input type="date" name="date" id="date" class="form-control" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="time">Event Time</label>
                            <input type="time" name="time" id="time" class="form-control" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="location">Location</label>
                            <input type="text" name="location" id="location" class="form-control" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="attendees">Attendees</label>
                            <input type="text" name="attendees" id="attendees" class="form-control" require>
                            
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-success">Create Event</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- end shedule  -->
@endsection

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script src="{{ asset('assets/js/dashboard.js') }}"></script>



@endpush