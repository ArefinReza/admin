@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/plugin.css') }}">
@endpush

@section('content')


<div class="row">
    <!-- Visitor Stats Summary -->
    <div class="col-lg-12 grid-margin">
        <div class="row">
            <!-- Daily Visitors -->
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Daily Visitors</h5>
                        <h3 class="card-text">{{ $dailyVisitors }}</h3>
                    </div>
                </div>
            </div>
            <!-- Weekly Visitors -->
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Weekly Visitors</h5>
                        <h3 class="card-text">{{ $weeklyVisitors }}</h3>
                    </div>
                </div>
            </div>
            <!-- Monthly Visitors -->
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Monthly Visitors</h5>
                        <h3 class="card-text">{{ $monthlyVisitors }}</h3>
                    </div>
                </div>
            </div>
            <!-- Yearly Visitors -->
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Yearly Visitors</h5>
                        <h3 class="card-text">{{ $yearlyVisitors }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="p-4 border-bottom bg-light">
                <h4 class="card-title mb-0">Visitors Chart</h4>
            </div>
            <div class="card-body">
                <canvas id="mixed-chart" height="100"></canvas>
                <div class="mt-4" id="mixed-chart-legend"></div>
            </div>
        </div>
    </div>

    <!-- Visitors Table -->
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Visitor Logs</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>IP Address</th>
                                <th>Region</th>
                                <th>Destination Port</th>
                                <th>User Agent</th>
                                <th>Visited At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($visitors as $index => $visitor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $visitor->ip_address }}</td>
                                <td>{{ $visitor->region }}</td>
                                <td>{{ $visitor->destination_port }}</td>
                                <td>{{ $visitor->user_agent }}</td>
                                <td>{{ $visitor->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    {{ $visitors->links() }} <!-- Pagination Links -->
                </div>
            </div>
        </div>
    </div>

</div>
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



@endsection

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
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



<script>
    // Data for the chart
    const chartData = {
        labels: ['Daily', 'Weekly', 'Monthly', 'Yearly'],
        datasets: [{
            type: 'line',
            label: 'Trend',
            borderColor: '#36a2eb',
            data: [{{ $dailyVisitors }}, {{ $weeklyVisitors }}, {{ $monthlyVisitors }}, {{ $yearlyVisitors }}],
            fill: false
        }, {
            type: 'bar',
            label: 'Visitor Counts',
            backgroundColor: '#ff6384',
            data: [{{ $dailyVisitors }}, {{ $weeklyVisitors }}, {{ $monthlyVisitors }}, {{ $yearlyVisitors }}]
        }]
    };

    // Chart configuration
    const config = {
        type: 'bar',
        data: chartData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Time Period'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Visitor Count'
                    }
                }
            }
        }
    };

    // Render the chart
    const mixedChart = new Chart(
        document.getElementById('mixed-chart'),
        config
    );
</script>


@endpush