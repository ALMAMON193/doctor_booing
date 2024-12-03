@extends('frontend.app')

@section('title','Log in')

@push('styles')
    <!-- ==== All Css Links ==== -->
@endpush

@section('content')
    <main>
        <!-- page title start -->
        <section class="page-top-title">
            <div class="container">
                <div class="page-content-wrapper">
                    <h1 class="page-title">Sign In</h1>
                </div>
            </div>
        </section>
        <!-- page title end -->
        <section class="sign-in-section">
            <div class="sign-in-up-content-wrapper">
                <div class="sign-in-up-image-area">
                    <img src="{{ asset('frontend/assets/images/sign-in.png') }}" alt srcset />
                </div>
                <div class="sign-in-up-form-area">
                    <div class="form-header-para align-items-start w-100">
                        <h1>Login To Your Account</h1>
                        <p>New user? <a href="{{ route('account.type') }}">Create an account</a></p>
                    </div>
                    <form class="tm-sign-in-up-form" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-floating">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="email"/>
                            <label for="floatingInput">Email address</label>
                            @error('email')

                            <div class="invalid-feedback d-block">{{$message}}</div>

                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password"/>
                            <label for="floatingPassword">Password</label>
                            @error('password')

                            <div class="invalid-feedback d-block">{{$message}}</div>

                            @enderror
                        </div>
                        <div class="remember-forgot">
                            <label class="custom-checkbox tm-remember-me">
                                <input type="checkbox" name="remember" />
                                <span class="checkmark"></span>
                                Remember Me
                            </label>
                            <a class="forgot-password" href="{{ route('password.request') }}">Forgot password?</a>
                        </div>
                        <button type="submit">Sign In</button>
                        <p class="tm-create-btn-link">
                            Don't have an account? <a href="{{ route('account.type') }}">Sign Up</a>
                        </p>
                    </form>
                </div>
            </div>
        </section>
    </main>

@endsection

@push('scripts')

@endpush
