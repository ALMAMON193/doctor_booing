@extends('backend.client.app')

@section('title', 'TimeSlots')

@push('styles')
   <style>
    .tm-form{
        justify-content: start !important;
    }
   </style>
@endpush


@section('content')
    <div class="main-content">

        <div class="main-content-container">
            <!-- main container header start -->
            @include('backend.client.partials.header')
            <!-- main container header end -->
            <div class="section-title mt-4">Appointments</div>
            <!-- client data table start -->
            <form class="tm-form mt-5">
                <div class="form-group">
                    <label for="start-time">Start Time</label>
                    <input id="start-time" class="form-control" type="time" name="start_time" required>
                </div>
                <div class="form-group">
                    <label for="end-time">End Time</label>
                    <input id="end-time" class="form-control" type="time" name="end_time" required>
                </div>
                <button style="background-color: #187586;" class="tm-dashboard-btn" type="submit">Update</button>
            </form>
            <!-- client data table end -->
        </div>

    </div>
@endsection

@push('scripts')
@endpush
