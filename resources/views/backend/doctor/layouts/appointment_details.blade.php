@extends('backend.doctor.app')

@section('title', 'Appointments details')

@push('styles')
   <style>
    #datatable_wrapper{
       margin-top:20px !important;
    }
    #datatable_length{
        margin-bottom: 20px !important;
    }
   </style>
@endpush

@section('content')
    <div class="main-content">
        <div class="main-content-container">
            <!-- main container header start -->
            <!-- main container header end -->
            <div class="section-title mt-4">Appointments details</div>

            <!-- client data table start -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Appointment Details</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>First Name</th>
                                    <td>{{ $appointment->first_name }}</td>
                                </tr>
                                <tr>
                                    <th>Last Name</th>
                                    <td>{{ $appointment->last_name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $appointment->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $appointment->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Consultant Type</th>
                                    <td>{{ $appointment->consultant_type }}</td>
                                </tr>
                                <tr>
                                    <th>Appointment Date</th>
                                    <td>{{ $appointment->appointment_date }}</td>
                                </tr>
                                <tr>
                                    <th>Appointment Time</th>
                                    <td>{{ $appointment->appointment_time }}</td>
                                </tr>
                                <tr>
                                    <th>Message</th>
                                    <td>{{ $appointment->message }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <br>
            <!-- client data table end -->
        </div>
    </div>
@endsection

@push('scripts')

@endpush
