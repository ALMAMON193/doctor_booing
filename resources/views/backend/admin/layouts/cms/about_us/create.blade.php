@extends('backend.admin.app', ['title' => 'Create About Us'])

@push('styles')
    <style>
        .ck-editor__editable_inline {
            min-height: 150px;
        }
    </style>
@endpush

@section('content')
    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <div class="page-header">
                    <div>
                        <h1 class="page-title">Create About Us</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">About Us</a></li>
                            <li class="breadcrumb-item active" aria-current="page">create</li>
                        </ol>
                    </div>
                </div>

                <div class="row" id="user-profile">
                    <div>

                        <div class="tab-content">
                            <div class="tab-pane active show" id="editProfile">
                                <div class="card">
                                    <div class="card-body border-0">
                                        <form class="form-horizontal" method="post"
                                            action="{{ route('admin.aboutUs.store') }}" enctype="multipart/form-data">
                                            @csrf

                                            <div class="row mb-4">

                                                <div class="form-group">
                                                    <label for="title" class="form-label">Title:</label>
                                                    <input type="text"
                                                        class="form-control @error('title') is-invalid @enderror"
                                                        name="title" placeholder="Enter title here" id="title"
                                                        value="{{ old('title') }}">
                                                    @error('title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="sub_title" class="form-label">Sub Title:</label>
                                                    <input type="text"
                                                        class="form-control @error('sub_title') is-invalid @enderror"
                                                        name="sub_title" placeholder="Enter sub title here" id="sub_title"
                                                        value="{{ old('sub_title') }}">
                                                    @error('sub_title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="content" class="form-label">Content:</label>
                                                    <textarea class="description form-control @error('content') is-invalid @enderror" name="content"
                                                        id="content">{{ old('content') }}</textarea>
                                                    @error('content')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="image" class="form-label">Image:</label>
                                                    <input type="file"
                                                        class="dropify form-control @error('image') is-invalid @enderror"
                                                        name="image" placeholder="image" id="image"
                                                        data-default-value ="{{ old('image') }}">
                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
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
