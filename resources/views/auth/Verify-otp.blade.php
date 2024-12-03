@extends('frontend.app')
@section('title' ,'verify otp')
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
                    <img src="{{ asset('frontend/assets/images/forgot-password.png') }}" alt="" srcset="">
                </div>
                <div class="sign-in-up-form-area">
                    <div class="form-header-para">
                        <h1>Forgot Password</h1>
                        <p>
                            Enter your email for the verification process, we will send code
                            to your email
                        </p>
                    </div>
                    <form class="tm-sign-in-up-form" method="POST" action="{{ route('password.verify.submit') }}">
                        @csrf
                        <input type="hidden" name="email" value="{{ $email }}">

                        <div class="pin-container">
                            <input type="text" maxlength="1" class="pin-box" id="pin-1" name="otp[]">
                            <input type="text" maxlength="1" class="pin-box" id="pin-2" name="otp[]">
                            <input type="text" maxlength="1" class="pin-box" id="pin-3" name="otp[]">
                            <input type="text" maxlength="1" class="pin-box" id="pin-4" name="otp[]">
                        </div>

                        <button type="submit">Verify</button>
                    </form>

                    <script>
                        document.querySelectorAll('.pin-box').forEach((input, index, inputs) => {
                            input.addEventListener('input', (e) => {
                                if (e.target.value.length === 1 && index < inputs.length - 1) {
                                    inputs[index + 1].focus();
                                }
                            });
                        });
                    </script>

                </div>
            </div>
        </section>
    </main>
@endsection
