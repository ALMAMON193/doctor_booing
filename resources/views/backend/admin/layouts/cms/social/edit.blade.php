@extends('backend.admin.app', ['title' => 'Psychologists'])

@section('content')

<!--app-content open-->
<div class="app-content main-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <div class="page-header">
                <div>
                    <h1 class="page-title">Psychologists</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Psychologists</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update</li>
                    </ol>
                </div>
            </div>

            <div class="row" id="user-profile">
                <div class="col-lg-12">

                    <div class="tab-content">
                        <div class="tab-pane active show" id="editProfile">
                            <div class="card">
                                <div class="card-body border-0">
                                    <form class="form-horizontal" method="post" action="{{ route('admin.cms.social.update', $social->id) }}">
                                        @csrf
                                        @method('PATCH')

                                        <div class="row mb-4">
                                            
                                            <div class="form-group">
                                                <label for="btn_text" class="form-label">Button Text:</label>
                                                <input type="text" class="form-control @error('btn_text') is-invalid @enderror" name="btn_text" placeholder="Button Text" id="btn_text" value="{{ $social->btn_text ?? '' }}">
                                                @error('btn_text')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="btn_url" class="form-label">Button URL:</label>
                                                <input type="text" class="form-control @error('btn_url') is-invalid @enderror" name="btn_url" placeholder="Button URL" id="btn_url" value="{{ $social->btn_url ?? '' }}">
                                                @error('btn_url')
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