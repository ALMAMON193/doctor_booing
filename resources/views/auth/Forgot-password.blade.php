@extends('frontend.app')
@section('title', 'Forgot Password')
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
                        <h1>Forgot Password</h1>
                        <p>Enter your email for the verification process,
                            we will send code to your email
                        </p>
                    </div>
                    <form class="tm-sign-in-up-form" action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="form-floating">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <button type="submit">Continue</button>
                    </form>

                </div>
            </div>
        </section>
    </main>
@endsection
