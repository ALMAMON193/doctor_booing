@extends('backend.admin.app', ['title' => 'Social Links Edit'])

@section('content')

<!--app-content open-->
<div class="app-content main-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <div class="page-header">
                <div>
                    <h1 class="page-title">Social Link Edit</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Social Link</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </div>
            </div>

            <div class="row" id="user-profile">
                <div class="col-lg-12">

                    <div class="tab-content">
                        <div class="tab-pane active show" id="editProfile">
                            <div class="card">
                                <div class="card-body border-0">
                                    <form class="form-horizontal" method="post" action="{{ route('admin.setting.social.update', $social->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <!-- Social Name -->
                                            <div class="col-md-12 mb-3">
                                                <label for="social_name" class="form-label">Social Name:</label>
                                                <input type="text" class="form-control @error('social_name') is-invalid @enderror" name="social_name"
                                                    placeholder="Enter social name" id="social_name"value="{{ old('social_name') ?? $social->social_name ?? '' }}">
                                                @error('social_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Social Links -->
                                            <div class="col-md-12 mb-3">
                                                <label for="social_link" class="form-label">Social Links:</label>
                                                <input type="url" class="form-control @error('social_link') is-invalid @enderror" name="social_link"
                                                    placeholder="Enter social link (e.g., https://example.com)" id="social_link"
                                                    value="{{ old('social_link') ?? $social->social_link ?? '' }}">
                                                @error('social_link')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="social_icon" class="form-label">Social Icon:</label>
                                                <input type="file" class="dropify form-control @error('social_icon') is-invalid @enderror" name="social_icon" id="social_icon" data-default-file="{{ $social->social_icon ? asset($social->social_icon) : '' }}" >
                                                @error('social_icon')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                            <!-- Submit Button -->
                                            <div class="col-md-12 text-end">
                                                <button type="submit" class="btn btn-primary">Update</button>
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
    </div>
</div>
<!-- CONTAINER CLOSED -->
@endsection
@push('scripts')

@endpush
