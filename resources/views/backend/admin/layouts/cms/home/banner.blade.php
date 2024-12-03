@extends('backend.admin.app', ['title' => 'Home Banner'])

@section('content')

<!--app-content open-->
<div class="app-content main-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <div class="page-header">
                <div>
                    <h1 class="page-title">Home Banner</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Banner</li>
                    </ol>
                </div>
            </div>

            <div class="row" id="user-profile">
                <div class="col-lg-12">

                    <div class="tab-content">
                        <div class="tab-pane active show" id="editProfile">
                            <div class="card">
                                <div class="card-body border-0">
                                    <form class="form-horizontal" method="post" action="{{ route('admin.cms.home.banner.content') }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row mb-4">

                                            <div class="form-group">
                                                <label for="title" class="form-label">Title:</label>
                                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title" id="title" value="{{ $banner->title ?? old('title') ?? '' }}">
                                                @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="sub_title" class="form-label">Sub Title:</label>
                                                <input type="text" class="form-control @error('sub_title') is-invalid @enderror" name="sub_title" placeholder="Sub Title" id="sub_title" value="{{ $banner->sub_title ?? old('sub_title') ?? '' }}">
                                                @error('sub_title')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="content" class="form-label">Content:</label>
                                                <textarea class="description form-control @error('content') is-invalid @enderror" name="content" placeholder="Content" id="content">{{ $banner->content ?? old('content') ?? '' }}</textarea>
                                                @error('content')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="btn_text" class="form-label">Button Text:</label>
                                                        <input type="text" class="form-control @error('btn_text') is-invalid @enderror" name="btn_text" placeholder="Button Text" id="btn_text" value="{{ $banner->btn_text ?? old('btn_text') ?? '' }}">
                                                        @error('btn_text')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="btn_url" class="form-label">Button Link:</label>
                                                        <input type="text" class="form-control @error('btn_url') is-invalid @enderror" name="btn_url" placeholder="Button Link" id="btn_url" value="{{ $banner->btn_url ?? old('btn_url') ?? '' }}">
                                                        @error('btn_url')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="bg" class="form-label">Background Image:</label>
                                                <input type="file" data-default-file="{{ !empty($banner->bg) && file_exists(public_path($banner->bg)) ? url($banner->bg) : url('default/logo.png') }}" class="dropify form-control @error('bg') is-invalid @enderror" name="bg" id="bg">
                                                @error('bg')
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