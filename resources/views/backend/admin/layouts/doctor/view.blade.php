@extends('backend.admin.app', ['title' => 'View Doctor'])

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
                        <h1 class="page-title">View Doctor</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">index</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Personal Information</h5>
                                <hr>
                                <h1 class="card-title" style="font-weight: bold">First Name: <span
                                        style="font-weight: normal">{{ $data->fname ?? 'N/A' }}</span></h1>
                                <h1 class="card-title" style="font-weight: bold">Last Name: <span
                                        style="font-weight: normal">{{ $data->lname ?? 'N/A' }}</span></h1>
                                <h1 class="card-title" style="font-weight: bold">Phone: <span
                                        style="font-weight: normal">{{ $data->phone ?? 'N/A' }}</span></h1>
                                <h1 class="card-title" style="font-weight: bold">Gender: <span
                                        style="font-weight: normal">{{ $data->gender ?? 'N/A' }}</span></h1>
                                <h1 class="card-title" style="font-weight: bold">Date Of Birth: <span
                                        style="font-weight: normal">{{ $data->dob ?? 'N/A' }}</span></h1>
                                <h1 </div>
                            </div>
                        </div>

                         <!-- File upload Card -->
                         <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">File</h5>
                            </div>
                            <hr>
                            <div class="card-body">
                                <img src="{{ asset($data->avatar ?? 'backend/doctor/images/download.jpeg') }}" alt="" style="width: 100%; height:270px;">
                            </div>
                            <div class="card-body">
                                <img src="{{ asset($data->upload_certificate ?? 'backend/doctor/images/download.jpeg') }}" alt="">
                            </div>
                        </div>

                    </div>

                    <div class="col-md-7">
                        <!-- Language Preferences Card -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Language Preferences</h5>
                            </div>
                            <hr>
                            <div class="card-body">
                                <h1 class="card-title" style="font-weight: bold">Language: <span
                                        style="font-weight: normal">{{ $data->language ?? 'N/A' }}</span></h1>
                            </div>
                        </div>

                        <!-- Professional Information Card -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Professional Information</h5>
                            </div>
                            <hr>
                            <div class="card-body">
                                <h1 class="card-title" style="font-weight: bold">Qualification: <span
                                        style="font-weight: normal">{{ $data->qualification ?? 'N/A' }}</span></h1>
                                <h1 class="card-title" style="font-weight: bold">AHPRA Registration Number: <span
                                        style="font-weight: normal">{{ $data->ahpra_registraion_number ?? 'N/A' }}</span>
                                </h1>
                            </div>
                        </div>

                        <!-- Therapy Model Information Card -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Therapy Model Information</h5>
                            </div>
                            <hr>
                            <div class="card-body">
                                <h1 class="card-title" style="font-weight: bold">Practice Name: <span
                                        style="font-weight: normal">{{ $data->practice_name ?? 'N/A' }}</span></h1>
                                <h1 class="card-title" style="font-weight: bold">Practice Address: <span
                                        style="font-weight: normal">{{ $data->practice_address ?? 'N/A' }}</span>
                                </h1>
                                <h1 class="card-title" style="font-weight: bold">Therapy Mode: <span
                                        style="font-weight: normal">{{ $data->therapy_mode ?? 'N/A' }}</span></h1>
                                <h1 class="card-title" style="font-weight: bold">Client Age Group: <span
                                        style="font-weight: normal">{{ $data->client_age_group ?? 'N/A' }}</span>
                                </h1>
                            </div>
                        </div>

                        <!-- Area of Expertise Card -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Area of Expertise</h5>
                            </div>
                            <hr>
                            <div class="card-body">
                                <h1 class="card-title" style="font-weight: bold">Area of Expertise: <span
                                        style="font-weight: normal">{{ $data->area_of_expertise ?? 'N/A' }}</span>
                                </h1>
                            </div>
                            <hr>
                            <div class="card-body">
                                <h1 class="card-title" style="font-weight: bold">Profile Description : <span
                                        style="font-weight: normal">{{ $data->profile_description ?? 'N/A' }}</span>
                                </h1>
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
