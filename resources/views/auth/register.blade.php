@extends('layout.master-mini')

@section('content')
<div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one" style="background-image: url({{ url('assets/images/auth/register.jpg') }}); background-size: cover;">
  <div class="row w-100">
    <div class="col-lg-4 mx-auto">
      <h2 class="text-center mb-4">Register</h2>
      <div class="auto-form-wrapper">
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="form-group">
            <div class="input-group">
              <input id="name" type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required autofocus autocomplete="name">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input id="email" type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autocomplete="username">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input id="password" type="password" name="password" class="form-control" placeholder="Password" required autocomplete="new-password">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required autocomplete="new-password">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
            </div>
          </div>
          @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
          <div class="form-group d-flex justify-content-center">
            <div class="form-check form-check-flat mt-0">
              <label class="form-check-label">
                <input type="checkbox" name="terms" id="terms" class="form-check-input" required>
                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-black text-small">'.__('Terms of Service').'</a>',
                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-black text-small">'.__('Privacy Policy').'</a>',
                ]) !!}
              </label>
            </div>
          </div>
          @endif
          <div class="form-group">
            <button class="btn btn-primary submit-btn btn-block">Register</button>
          </div>
          <div class="text-block text-center my-3">
            <span class="text-small font-weight-semibold">Already have an account?</span>
            <a href="{{ route('login') }}" class="text-black text-small">Login</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
