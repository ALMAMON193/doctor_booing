@extends('backend.client.app')

@section('title', 'Appointments')

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
            @include('backend.client.partials.header')
            <!-- main container header end -->
            <div class="section-title mt-4">Appointments List</div>

            <!-- client data table start -->
            <div class="data-table-container mt-4">
                <div class="data-table table-responsive mt-4" >
                  <table class="table  data-table" id="datatable">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>First Name</th>
                             <th>Email</th>
                             <th>Phone</th>
                             <th>Consultant Type</th>
                             <th>Appointment Date</th>
                             <th>Appointment Time</th>
                             <th width="100px">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                     </tbody>
                 </table>
                </div>
                <!-- pagination-container start -->

                <!-- pagination-container end -->
            </div>
            <!-- client data table end -->
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(function () {
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('client.appointment.appointments') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'first_name', name: 'first_name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'consultant_type', name: 'consultant_type'},
                {data: 'appointment_date', name: 'appointment_date'},
                {data: 'appointment_time', name: 'appointment_time'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>
@endpush
