@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/plugin.css') }}">
@endpush

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Messages</h4>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Email</th>
                            <th>Send DateTime</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $message)
                        <tr>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->subject }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <span class="badge {{ $message->status == 'unread' ? 'badge-danger' : 'badge-success' }}">
                                    {{ ucfirst($message->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('messages.show', $message->id) }}" class="btn btn-primary btn-sm">View</a>
                                <a href="{{ route('messages.reply', $message->id) }}" class="btn btn-secondary btn-sm">Reply</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No messages found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $messages->links() }}
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
