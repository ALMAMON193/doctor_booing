@extends('frontend.app')

@section('title', 'Details Psychologist')

@push('styles')
    <style>
        .time-slot {
            /*background-color: #f0f0f0;*/
            border: 1px solid #ccc;
            padding: 8px 16px;
            margin: 5px;
            cursor: pointer;
        }

        .time-slot.selected {
            background-color: #187586;
            color: white;
        }

        .time-slot:hover {
            background-color: #187586;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.6.0/build/css/intlTelInput.css">
    <style>
        .iti__tel-input {
            position: relative;
            display: inline-block;
            width: 100%;
        }
    </style>
@endpush

@section('content')
    <main>
        <!-- page title start -->
        <section class="page-top-title">
            <div class="container">
                <div class="page-content-wrapper">
                    <h1 class="page-title">Appointment</h1>
                </div>
            </div>
        </section>
        <!-- page title end -->

        <!-- docto details section start -->
        <section class="doctor-details-section mt-150">
            <div class="container">
                <div class="tm-doctor-details-row">
                    <div class="tm-col doctor-details-img-col">
                        <tm class="doctor-details-img-area">
                            <img src="{{ asset($doctor->avatar ?? 'frontend/assets/images/expert-4.png') }}" alt=""
                                 srcset="">
                        </tm>
                    </div>
                    <div class="tm-col doctor-details-col">
                        <div class="tm-doctor-details">
                            <p>
                                <span class="doctor-details-span-1">Name:</span>
                                <span class="doctor-details-span-2">
                                    {{ $doctor->name ?? $doctor->lname ? $doctor->name . ' ' . $doctor->lname : 'N/A' }}
                                </span>
                            </p>
                            <p>
                                <span class="doctor-details-span-1">Primary Care:</span>
                                <span class="doctor-details-span-2">
                                    {{ $doctor->experience ?? 'N/A' }} Years of Experience
                                </span>
                            </p>
                            <p>
                                <span class="doctor-details-span-1">Specializes:</span>
                                <span class="doctor-details-span-2">
                                    @if (Auth::user()->area_of_expertise)
                                        @php
                                            $expertiseArray = explode(',', Auth::user()->area_of_expertise);
                                        @endphp
                                        @foreach ($expertiseArray as $expertise)
                                            {{ $expertise }}@if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    @else
                                        N/A
                                    @endif
                                </span>
                            </p>


                            <p><span class="doctor-details-span-1">About
                                    :</span> <span
                                    class="doctor-details-span-2">{{ $doctor->profile_description ?? '' }}</span></p>
                            <div class="doctor-details-line"></div>
                            <p class="doctor-details-special-p"><span class="doctor-details-span-1">Consult
                                    Duration</span> <span
                                    class="doctor-details-span-3">{{ $doctor->session_duration ?? 'N/A' }}
                                    Minutes</span></p>
                            <p class="doctor-details-special-p"><span class="doctor-details-span-1">Total
                                    Amount</span> <span class="doctor-details-span-3">$
                                    {{ $doctor->session_price ?? 'N/A' }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- docto details section End -->

        <!-- booking form and contct-details section start -->
        <section class="book-contact-section mb-150">
            <div class="container">
                <div class="tm-doctor-details-row">
                    <div class="tm-col doctor-details-img-col">
                        <div class="tm-map-area">
                            <h2 class="tm-common-heading">Quick Contacts</h2>
                            <p class="booking-map-para">Reach out to us
                                quickly for any inquiries or to schedule an
                                appointment with our mental health
                                specialists.</p>
                            <div class="footer-contact-wrapper">
                                <div class="footer-contact-item">
                                    <div class="footer-contact-img-area">
                                        <img src="{{ asset('frontend/assets/images/call-2.svg') }}" alt=""
                                             srcset="">
                                    </div>
                                    <div class="footer-contact-item-text-wrapper">
                                        <p>{{ $doctor->phone ?? 'N/A' }}</p>

                                    </div>
                                </div>
                                <div class="footer-contact-item">
                                    <div class="footer-contact-img-area">
                                        <img src="{{ asset('frontend/assets/images/location.svg') }}" alt=""
                                             srcset="">
                                    </div>
                                    <div class="footer-contact-item-text-wrapper">
                                        <p>{{ $doctor->practice_address ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tm-main-map">
                                <iframe loading="lazy" allowfullscreen=""
                                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8&amp;q=4140%20Parker%20Rd.%20Allentown%2C%20New%20Mexico%2031134&amp;zoom=7&amp;maptype=satellite">
                                </iframe>
                            </div>
                        </div>
                    </div>
                    <div class="tm-col doctor-details-col">
                        <div class="appointment-form-container">
                            <h2 class="tm-common-heading">Book An Appointment</h2>
                            <p class="booking-map-para">Schedule an appointment with our experts to take the first step
                                toward better mental health today.</p>

                            <form class="appointment-form" id="appointment-submit-form" method="POST"
                                  action="{{ route('appointments.store', $doctor->slug) }}">
                                @csrf
                                <!-- names -->
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="first-name">First Name <span class="text-danger">*</span></label>
                                        <input type="text" id="first-name" name="first_name"
                                               placeholder="Enter First Name" value="{{ old('first_name') }}">
                                        @error('first_name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="last-name">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" id="last-name" name="last_name" placeholder="Enter Last Name"
                                               value="{{ old('last_name') }}">
                                        @error('last_name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- contact info -->
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input type="email" id="email" name="email" placeholder="Enter Email"
                                               value="{{ old('email') }}">
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone <span class="text-danger">*</span></label>
                                        <input type="text" id="phone" name="phone" placeholder="Enter Phone Number"
                                               value="{{ old('phone', '+1') }}">
                                        @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Consultant Type -->
                                <div class="form-group">
                                    <label for="consultant-type">Consultant Type <span
                                            class="text-danger">*</span></label>
                                    <select id="consultant-type" name="consultant_type" class="form-control">
                                        <option value="" disabled selected>Select Consultant Type</option>
                                        <option value="Clinical Psychologist"
                                            {{ old('consultant_type') === 'Clinical Psychologist' ? 'selected' : '' }}>
                                            Clinical Psychologist
                                        </option>
                                        <option value="Counseling Psychologist"
                                            {{ old('consultant_type') === 'Counseling Psychologist' ? 'selected' : '' }}>
                                            Counseling Psychologist
                                        </option>
                                        <option value="Educational Psychologist"
                                            {{ old('consultant_type') === 'Educational Psychologist' ? 'selected' : '' }}>
                                            Educational Psychologist
                                        </option>
                                        <option value="Forensic Psychologist"
                                            {{ old('consultant_type') === 'Forensic Psychologist' ? 'selected' : '' }}>
                                            Forensic Psychologist
                                        </option>
                                        <option value="Health Psychologist"
                                            {{ old('consultant_type') === 'Health Psychologist' ? 'selected' : '' }}>
                                            Health
                                            Psychologist
                                        </option>
                                        <option value="Neuropsychologist"
                                            {{ old('consultant_type') === 'Neuropsychologist' ? 'selected' : '' }}>
                                            Neuropsychologist
                                        </option>
                                        <option value="Organizational Psychologist"
                                            {{ old('consultant_type') === 'Organizational Psychologist' ? 'selected' : '' }}>
                                            Organizational Psychologist
                                        </option>
                                        <option value="Rehabilitation Psychologist"
                                            {{ old('consultant_type') === 'Rehabilitation Psychologist' ? 'selected' : '' }}>
                                            Rehabilitation Psychologist
                                        </option>
                                        <option value="School Psychologist"
                                            {{ old('consultant_type') === 'School Psychologist' ? 'selected' : '' }}>
                                            School
                                            Psychologist
                                        </option>
                                        <option value="Sports Psychologist"
                                            {{ old('consultant_type') === 'Sports Psychologist' ? 'selected' : '' }}>
                                            Sports
                                            Psychologist
                                        </option>
                                    </select>
                                    @error('consultant_type')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Select Date -->
                                <div class="form-group">
                                    <label for="select-date">Select Date <span class="text-danger">*</span></label>
                                    <div class="date-input-wrapper">
                                        <input type="date"
                                               value="{{ old('appointment_date', now()->format('Y-m-d')) }}"
                                               id="appointment-date" name="appointment_date" class="date-input"
                                               placeholder="Select Date" min="{{ date('Y-m-d') }}">
                                        <img src="{{ asset('frontend/assets/images/Calendar.svg') }}"
                                             alt="Calendar Icon"
                                             class="custom-calendar-icon">
                                    </div>
                                    @error('appointment_date')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Available Slot -->
                                <div class="form-group">
                                    <label>Available Slot <span class="text-danger">*</span></label>
                                    <div class="time-slots" id="time-slots">
                                        @if ($timeSlots->isNotEmpty())
                                            @foreach ($timeSlots as $slot)
                                                <button type="button" class="time-slot"
                                                        onclick="selectTime(this, {{ $slot->id }})">
                                                    {{ \Carbon\Carbon::parse($slot->start_time)->format('g:i A') }}
                                                </button>
                                            @endforeach
                                        @else
                                            <p class="text-danger">No available time slots for this psychologist.</p>
                                        @endif
                                    </div>
                                    @error('appointment_time_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Message -->
                                <div class="form-group">
                                    <label for="message">Your Message <span class="text-danger">*</span></label>
                                    <textarea id="message" name="message" placeholder="Enter your details"
                                              maxlength="1000">{{ old('message') }}</textarea>
                                    @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Hidden field for time -->
                                <input type="hidden" id="appointment-time" name="appointment_time_id"
                                       value="{{ old('appointment_time') }}">

                                <button type="submit" id="submit-button" class="submit-button">Book An
                                    Appointment
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- booking form and contct-details section end -->

    </main>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $("#appointment-submit-form").on('submit', function (e) {
                e.preventDefault();
                $("#submit-button").prop('disabled', true);
                this.submit();

            })
        })

        function selectTime(button, time) {
            // Reset all buttons to default color
            const buttons = document.querySelectorAll('.time-slot');
            buttons.forEach(btn => btn.classList.remove('selected'));

            // Mark the selected button with a green color
            button.classList.add('selected');

            // Set the selected time in the hidden input field
            document.getElementById('appointment-time').value = time;
        }
    </script>



    {{-- =======for phone validation======== --}}
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@24.6.0/build/js/intlTelInput.min.js"></script>

    <script>
        // Initialize the intl-tel-input
        var input = document.querySelector("#phone");
        let phoneInput = window.intlTelInput(input, {
            loadUtilsOnInit: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.6.0/build/js/utils.js",
            onlyCountries: ["us"], // Restrict to one country, e.g., "us" for the United States
            preferredCountries: ["us"], // Optionally, specify a preferred country
            initialCountry: "US",
            separateDialCode: true,
            allowDropdown: false,
        });
    </script>

    {{-- <script>
        $(document).ready(function() {
            $('#appointment-date').on('change', function() {
                const appointmentDate = $(this).val(); // Get selected category ID
                const appointmentTimeSlot = $('#time-slots'); // Sub-category dropdown

                // Show loading state
                appointmentTimeSlot.html('joy bangla');

                
            });
        });
    </script> --}}
@endpush
