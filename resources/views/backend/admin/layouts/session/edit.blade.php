@extends('backend.admin.app', ['title' => 'Psychology Sessions'])

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
                        <h1 class="page-title">Psychology Sessions</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Psychology Sessions</a></li>
                            <li class="breadcrumb-item active" aria-current="page">edit</li>
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
                                            action="{{ route('admin.psychology.session.update', $data) }}" enctype="multipart/form-data">
                                            @csrf

                                            <div class="row mb-4">

                                                <div class="form-group">
                                                    <label for="title" class="form-label">Title:</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" placeholder="Enter name here" id="name"
                                                        value="{{ old('name', $data->name) }}">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="image" class="form-label">Image:</label>
                                                    <input type="file"
                                                        class="dropify form-control @error('image') is-invalid @enderror"
                                                        name="image" placeholder="image" id="image"
                                                        data-default-file="{{ old('image') ?? asset($data->image ?? '') }}">
                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="description" class="form-label">Description:</label>
                                                    <textarea class="description form-control @error('description') is-invalid @enderror" name="description"
                                                        id="description">{{ old('description', $data->description) }}</textarea>
                                                    @error('description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <button class="btn btn-primary" type="submit">Update</button>
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
