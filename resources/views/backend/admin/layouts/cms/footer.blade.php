@extends('backend.admin.app', ['title' => 'Footer'])

@section('content')

<!--app-content open-->
<div class="app-content main-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <div class="page-header">
                <div>
                    <h1 class="page-title">Footer</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Footer</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Content</li>
                    </ol>
                </div>
            </div>

            <div class="row" id="user-profile">
                <div class="col-lg-12">

                    <div class="tab-content">
                        <div class="tab-pane active show" id="editProfile">
                            <div class="card">
                                <div class="card-body border-0">
                                    <form class="form-horizontal" method="post" action="{{ route('admin.cms.home.footer.content') }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row mb-4">

                                            <div class="form-group">
                                                <label for="title" class="form-label">Address:</label>
                                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title" id="title" value="{{ $footer->title ?? old('title') ?? '' }}">
                                                @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="sub_title" class="form-label">Phone:</label>
                                                <input type="text" class="form-control @error('sub_title') is-invalid @enderror" name="sub_title" placeholder="Sub Title" id="sub_title" value="{{ $footer->sub_title ?? old('sub_title') ?? '' }}">
                                                @error('sub_title')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="content" class="form-label">Content:</label>
                                                <textarea class="description form-control @error('content') is-invalid @enderror" name="content" placeholder="Content" id="content">{{ $footer->content ?? old('content') ?? '' }}</textarea>
                                                @error('content')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="image" class="form-label">Background Image:</label>
                                                <input type="file" data-default-file="{{ !empty($footer->image) && file_exists(public_path($footer->image)) ? url($footer->image) : url('default/logo.png') }}" class="dropify form-control @error('image') is-invalid @enderror" name="image" id="image">
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