<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sorkar It') }}</title>

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/@mdi/font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Livewire Styles -->
    @livewireStyles

    @stack('plugin-styles')
    @stack('style')
</head>
<body data-base-url="{{ url('/') }}" class="font-sans antialiased">
    <x-banner />

    <div class="container-scroller" id="app">
        <!-- Header -->
        @include('layout.header')

        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar -->
            @include('layout.sidebar')

            <!-- Main Panel -->
            <div class="main-panel">
                <div class="content-wrapper bg-gray-100">
                    <!-- Page Heading -->
                    @if (isset($header))
                        <header class="bg-white shadow">
                            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endif

                    <!-- Page Content -->
                    @yield('content')
                </div>

                <!-- Footer -->
                @include('layout.footer')
            </div>
        </div>
    </div>

    <!-- Base JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <!-- Plugins JS -->
    @stack('plugin-scripts')

    <!-- App JS -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
<!-- Add these in your layout master file -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>

    <!-- Livewire Scripts -->
    @livewireScripts

    @stack('custom-scripts')
</body>
</html>
