@extends('frontend.app')

@section('title', 'Verify')

@push('styles')
    <!-- ==== All Css Links ==== -->
@endpush

@section('content')
<main>
    <!-- page title start -->
    <section class="page-top-title">
      <div class="container">
        <div class="page-content-wrapper">
          <h1 class="page-title">Verify</h1>
        </div>
      </div>
    </section>
    <!-- page title end -->
    <section class="sign-in-section">
      <div class="sign-in-up-content-wrapper tm-reset-password-area">
        <div class="sign-in-up-image-area">
          <img src="{{ asset('frontend//assets/images/forgot-password.png') }}" alt srcset />
        </div>
        <div class="sign-in-up-form-area">
          <div class="form-header-para">
            <h1>Forgot Password</h1>
            <p>
              Enter your email for the verification process, we will send code
              to your email
            </p>
          </div>
          <form class="tm-sign-in-up-form" action="../dashboard/index.html">
            <div class="pin-container">
              <input type="text" maxlength="1" class="pin-box" id="pin-1" />
              <input type="text" maxlength="1" class="pin-box" id="pin-2" />
              <input type="text" maxlength="1" class="pin-box" id="pin-3" />
              <input type="text" maxlength="1" class="pin-box" id="pin-4" />
            </div>
            <button type="submit">Verify</button>
          </form>
        </div>
      </div>
    </section>
  </main>

@endsection

@push('scripts')

@endpush
