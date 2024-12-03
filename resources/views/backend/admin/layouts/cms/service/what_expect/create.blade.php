@extends('backend.admin.app', ['title' => 'Service what to expect Create'])

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
                    <h1 class="page-title">What To Expect Create</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Service What To Expect</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </div>
            </div>

            <div class="row" id="user-profile">
                <div class="col-lg-12">

                    <div class="tab-content">
                        <div class="tab-pane active show" id="editProfile">
                            <div class="card">
                                <div class="card-body border-0">
                                    <form class="form-horizontal" method="post" action="{{ route('admin.cms.service.whatToExpect.store') }}">
                                        @csrf
                                        <div class="row mb-4">

                                            <div class="form-group">
                                                <label for="sub_title" class="form-label">Sub Title:</label>
                                                <input type="text" class="form-control @error('sub_title') is-invalid @enderror" name="sub_title" placeholder="Enter sub title" id="sub_title" value="{{ old('sub_title') }}">
                                                @error('sub_title')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="sub_content" class="form-label">Sub Content:</label>
                                                <textarea class="description form-control @error('sub_content') is-invalid @enderror" name="sub_content" id="sub_content">{{ old('sub_content') }}</textarea>
                                                @error('sub_content')
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
