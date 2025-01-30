@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/plugin.css') }}">
@endpush
@section('content')

<div class="row">
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-cube text-danger icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Total Services</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0"> {{ $servicesCount }}</h3>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-receipt text-warning icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Total Project</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{ $projectCount }}</h3>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-poll-box text-success icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Total Review</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{ $reviewCount }}</h3>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-account-box-multiple text-info icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Total Team Member</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{ $teamMemberCount }}</h3>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- end first section dashboard -->

<!-- second section start  -->
<div class="row">
  <!-- start todo  -->
  <div class="col-md-6 col-xl-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Todo</h4>

        <form action="{{ route('dashboard.store') }}" method="POST" class="mb-3">
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
                <form action="{{ route('dashboard.destroy', $todo->id) }}" method="POST">
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
  <!-- end todo  -->

  <!-- start shedule  -->
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
  <!-- sheduel list end  -->


  <!-- messages start  -->
  <div class="col-md-6 col-xl-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Messages</h4>
        <div class="shedule-list d-flex align-items-center justify-content-between mb-3">
          <!-- Current Date -->
          <h3>{{ now()->format('d M Y') }}</h3>
          <small>{{ $messages->count() }} Total Messages</small>
        </div>

        @forelse ($messages as $message)
        <a href="{{ route('messages.show', $message->id) }}">

          <div class="event border-bottom py-3">
            <!-- Subject -->
            <p class="mb-2 font-weight-medium">{{ $message->subject }}</p>
            <div class="d-flex align-items-center">
              <!-- Message Sent Time -->
              <div class="badge badge-success">{{ $message->created_at->format('h:i A') }}</div>
              <!-- Shortened Message -->
              <small class="text-muted ml-2">{{ Str::words($message->message, 3, '...') }}</small>
              <!-- Sender Name -->
              <div class="image-grouped ml-auto">
                <p>{{ $message->name }}</p>
              </div>
            </div>
          </div>
        </a>
        @empty
        <p class="text-muted py-3">No messages to display.</p>
        @endforelse
      </div>
    </div>
  </div>


</div>

<!-- end second section  -->
<div class="row">
  <div class="col-sm-6 col-md-6 col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-5 d-flex align-items-center">
            <canvas id="UsersDoughnutChart" class="400x160 mb-4 mb-md-0" height="200"></canvas>
          </div>
          <div class="col-md-7">
            <h4 class="card-title font-weight-medium mb-0 d-none d-md-block">Active Users</h4>
            <div class="wrapper mt-4">
              <div class="d-flex justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <p class="mb-0 font-weight-medium">67,550</p>
                  <small class="text-muted ml-2">Email account</small>
                </div>
                <p class="mb-0 font-weight-medium">80%</p>
              </div>
              <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="wrapper mt-4">
              <div class="d-flex justify-content-between mb-2">
                <div class="d-flex align-items-center">
                  <p class="mb-0 font-weight-medium">21,435</p>
                  <small class="text-muted ml-2">Requests</small>
                </div>
                <p class="mb-0 font-weight-medium">34%</p>
              </div>
              <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: 34%" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- visitor start -->

  <div class="col-sm-6 col-md-6 col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-7">
            <h4 class="card-title font-weight-medium mb-3">Visitors by Day</h4>
            <h1 class="font-weight-medium mb-0" id="total-visits">Loading...</h1>
            <p class="text-muted">Total visitors this week</p>
          </div>
          <div class="col-md-5 d-flex align-items-end mt-4 mt-md-0">
            <canvas id="visitorBarChart" style="height: 200px;"></canvas> <!-- Increased height -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- visitor end  -->



@endsection

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Sample data (replace with your dynamic data)
    const visitorsData = @json($data);

    const days = visitorsData.map(item => item.day);
    const counts = visitorsData.map(item => item.count);
    const totalVisits = counts.reduce((a, b) => a + b, 0);

    document.getElementById('total-visits').textContent = totalVisits;
    // Render the bar chart
    const ctx = document.getElementById('visitorBarChart').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: days,
        datasets: [{
          data: counts,
          backgroundColor: '#2196F3', // Solid blue color
          borderRadius: 5,
          barThickness: 8, // Make bars thicker
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: false, // Hide legend
          },
        },
        scales: {
          x: {
            display: false, // Hide x-axis
            grid: {
              display: false, // Remove grid lines
            },
          },
          y: {
            display: false, // Hide y-axis
            grid: {
              display: false, // Remove grid lines
            },
          },
        },
        layout: {
          padding: 10,
        },
        maintainAspectRatio: false, // Allow flexible height
      },
    });
  });
</script>
@endpush