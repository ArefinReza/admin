@extends('layout.master')

@section('header')
    
    <div class="page-header py-5 bg-gradient-primary text-white text-center shadow rounded">
        <h1 class="display-4">{{ __('Profile') }}</h1>
        <p class="lead">Manage your personal information, account security, and settings all in one place.</p>
    </div>
@endsection

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 mx-auto">
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    @livewire('profile.update-profile-information-form')

                    <hr class="my-4" />
                @endif

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    <div class="mt-4">
                        @livewire('profile.update-password-form')
                    </div>

                    <hr class="my-4" />
                @endif

                @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                    <div class="mt-4">
                        @livewire('profile.two-factor-authentication-form')
                    </div>

                    <hr class="my-4" />
                @endif

                <div class="mt-4">
                    @livewire('profile.logout-other-browser-sessions-form')
                </div>

                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    <hr class="my-4" />

                    <div class="mt-4">
                        @livewire('profile.delete-user-form')
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
