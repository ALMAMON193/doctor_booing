@extends('backend.client.app')

@section('title', 'Doctors')

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
            <div class="section-title mt-4">Doctors List</div>

            <!-- client data table start -->
            <div class="data-table-container mt-4">
                <div class="data-table table-responsive mt-4" >
                  <table class="table  data-table" id="datatable">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Phychologist Name</th>
                             <th>First Name</th>
                             <th>Last Name</th>
                             <th>Phone</th>
                             {{-- <th>session_price</th> --}}
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


    <!-- appointment form modal start -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Make An Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="tm-form">
                         <!-- names -->
                         <div class="form-row">
                            <div class="form-group">
                                <label for="first-name">First Name</label>
                                <input type="text" id="first-name" name="first_name" placeholder="Enter First Name">
                            </div>
                            <div class="form-group">
                                <label for="last-name">Last Name</label>
                                <input type="text" id="last-name" name="last_name" placeholder="Enter Last Name">
                            </div>
                        </div>

                        <!-- contact info -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" name="phone" placeholder="Enter Phone Number">
                            </div>
                        </div>

                        <!-- Consultant Type -->
                        <div class="form-group">
                            <label for="consultant-type">Consultant Type</label>
                            <select id="consultant-type" name="consultant_type" class="form-control">
                                <option value="" disabled selected>Select Consultant Type</option>
                                <option value="Clinical Psychologist">Clinical Psychologist</option>
                                <option value="Counseling Psychologist">Counseling Psychologist</option>
                                <option value="Educational Psychologist">Educational Psychologist</option>
                                <option value="Forensic Psychologist">Forensic Psychologist</option>
                                <option value="Health Psychologist">Health Psychologist</option>
                                <option value="Neuropsychologist">Neuropsychologist</option>
                                <option value="Organizational Psychologist">Organizational Psychologist</option>
                                <option value="Rehabilitation Psychologist">Rehabilitation Psychologist</option>
                                <option value="School Psychologist">School Psychologist</option>
                                <option value="Sports Psychologist">Sports Psychologist</option>
                            </select>
                        </div>

                        <!-- Select Date -->
                        <div class="form-group">
                            <label for="select-date">Select Date</label>
                            <div class="date-input-wrapper">
                                <input type="date" id="appointment-date" name="appointment_date" class="date-input form-control">
                            </div>
                        </div>

                        <!-- Available Slot -->
                        <div class="form-group">
                            <label>Available Slot</label>
                            <div class="time-slots">
                                {{-- @if ($timeSlots->isNotEmpty())
                                    @foreach ($timeSlots as $slot)
                                        <button type="button" class="time-slot"
                                            onclick="selectTime('{{ \Carbon\Carbon::parse($slot->start_time)->format('g:i A') }}')">
                                            {{ \Carbon\Carbon::parse($slot->start_time)->format('g:i A') }}
                                        </button>
                                    @endforeach
                                @else
                                    <p>No available time slots for this psychologist.</p>
                                @endif --}}
                            </div>
                        </div>

                        <!-- Message -->
                        <div class="form-group">
                            <label for="message">Your Message</label>
                            <textarea id="message" name="message" placeholder="Enter your details"></textarea>
                        </div>

                        <!-- Hidden field for time -->
                        <input type="hidden" id="appointment-time" name="appointment_time">

                        <button style="background-color: #187586;" class="tm-dashboard-btn" type="submit">Make
                            Appointment</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- appointment form modal end -->
@endsection

@push('scripts')
<script>
    $(function () {
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('client.doctors.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'psychologist_name', name: 'psychologist_name'},
                {data: 'first_name', name: 'first_name'},
                {data: 'last_name', name: 'last_name'},
                {data: 'phone', name: 'phone'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>
@endpush
