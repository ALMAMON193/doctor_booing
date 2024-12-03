@extends('backend.admin.app')
@section('title','Stripe Settings')
@section('content')
<!--app-content open-->
<div class="app-content main-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            {{-- PAGE-HEADER --}}
            <div class="page-header">
                <div>
                    <h1 class="page-title">Stripe Settings</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Settings</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Stripe Settings</li>
                    </ol>
                </div>
            </div>
            {{-- PAGE-HEADER --}}

            <div class="row">
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <div class="card box-shadow-0">
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.stripe.setting.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="stripe_secret_key">Stripe Secret Key</label>
                                    <input type="text" name="stripe_secret_key" id="stripe_secret_key" class="form-control @error('stripe_secret_key') is-invalid @enderror" value="{{ old('stripe_secret_key', env('STRIPE_SECRET_KEY', '')) }}">
                                    @error('stripe_secret_key')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Stripe Public Key -->
                                <div class="form-group">
                                    <label for="stripe_public_key">Stripe Public Key</label>
                                    <input type="text" name="stripe_public_key" id="stripe_public_key" class="form-control @error('stripe_public_key') is-invalid @enderror" value="{{ old('stripe_public_key', env('STRIPE_PUBLIC_KEY', '')) }}">
                                    @error('stripe_public_key')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Stripe Webhook -->
                                <div class="form-group">
                                    <label for="stripe_webhook_key">Stripe Webhook Key</label>
                                    <input type="text" name="stripe_webhook_key" id="stripe_webhook_key"
                                           class="form-control @error('stripe_webhook_key') is-invalid @enderror"
                                           value="{{ old('stripe_webhook_key', env('STRIPE_WEBHOOK_SECRET', '')) }}">
                                    @error('stripe_webhook_key')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-9">
                                        <div>
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- CONTAINER CLOSED -->
@endsection



@push('scripts')
@endpush
