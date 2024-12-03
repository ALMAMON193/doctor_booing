
@extends('frontend.app')
@section('title', 'Reset Password')
@section('content')
    <main>
        <!-- page title start -->
        <section class="page-top-title">
            <div class="container">
                <div class="page-content-wrapper">
                    <h1 class="page-title">Forget Password</h1>
                </div>
            </div>
        </section>
        <!-- page title end -->
        <section class="sign-in-section">
            <div class="sign-in-up-content-wrapper">
                <div class="sign-in-up-image-area">
                    <img src="{{ asset('frontend/assets/images/forgot-password.png') }}" alt="" srcset="">
                </div>
                <div class="sign-in-up-form-area">
                    <div class="form-header-para">
                        <h1>Reset Password</h1>
                        <p>Enter your email for the verification process,
                            we will send code to your email
                        </p>
                    </div>
                   
                    <form class="tm-sign-in-up-form" action="{{ route('password.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="email" value="{{ $email }}">
                        <div class="form-group">
                           
                            <input type="password" class=" @error('password') is-invalid @enderror"
                                name="password" placeholder="Enter Password" value="{{ old('password') }}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            
                            <input type="password" class=" @error('password') is-invalid @enderror"
                                name="password_confirmation" placeholder="Re-Password" value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit">Continue</button>
                    </form>

                </div>
            </div>
        </section>
    </main>
@endsection

