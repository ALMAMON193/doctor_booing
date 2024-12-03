@extends('backend.client.app')

@section('content')
    <div class="main-content">
        <div class="mx-auto">
            <!-- main container header start -->
            @include('backend.client.partials.header')
            <!-- main container header end -->
            <!-- profile container start -->
            <div class="doctor-profile-container">
                <div class="profile-top">
                    <div class="img">
                        <img src="{{ asset($doctor->avatar ?? 'backend/doctor/images/doctor.png') }}" alt="" />
                    </div>
                    <div class="profile-title mt-4">
                        {{ $doctor->psychologist->name ?? 'Dr. Emily Parker Woner' }}
                    </div>
                    <div class="text mt-2">
                        {{ $doctor->psychologist->area_of_expertise ?? 'Clinical Psychologist' }}
                    </div>
                    <div class="profile-statistics">
                        <div class="item">
                            <div class="item-title text-center">Appointments</div>
                            <div class="item-text">{{ $totalAppointments }}</div>
                        </div>
                        <div class="border-line"></div>
                        <div class="item">
                            <div class="item-title">Total Clients</div>
                            <div class="item-text">{{ $totalClients }}</div>
                        </div>
                        <div class="border-line"></div>
                        <div class="item">
                            <div class="item-title">Rating</div>
                            <div class="item-text">{{ $averageRating ? number_format($averageRating, 1) : '0.0' }}</div>
                        </div>
                    </div>                    
                    {{-- <div data-bs-toggle="modal" data-bs-target="#exampleModal" class="make-appointment-btn mt-4">
                        Make An Appointment
                    </div> --}}
                </div>
                <!-- doctor reviews start -->
                <div class="section-title mt-4 mt-md-5">Reviews</div>
                <div class="doctor-reviews mt-4 mt-md-5">
                    @if ($ratings->count() > 0)
                        @foreach ($ratings as $item)
                            <div class="item">
                                <div class="review-profile">
                                    <div class="review-profile-img">
                                        <img src="{{ $item->psychologist->avatar ? asset($item->psychologist->avatar) : asset('backend/client/images/user.png') }}" alt="">
                                    </div>
                                    <div class="review-profile-info">
                                        <div class="review-title">{{ $item->psychologist->name ?? 'Anonymous' }}</div>
                                        <div class="d-flex align-items-center gap-1 mt-1">
                                            @for ($i = 0; $i < 5; $i++)
                                                <svg width="14px" height="14px" xmlns="http://www.w3.org/2000/svg"
                                                    fill="{{ $i < $item->rating ? '#1E1E1E' : '#e0e0e0' }}"
                                                    viewBox="0 0 576 512">
                                                    <path
                                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                </svg>
                                            @endfor
                                        </div>
                                        <div class="review-time mt-1">{{ $item->updated_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                                <div class="review-text mt-3">
                                    <span class="review-content">{!! Str::limit($item->review, 250) !!}</span>
                                    @if (strlen($item->review) > 250)
                                        <span class="review-full" style="display: none;">{!! $item->review !!}</span>
                                        <a href="#" class="see-more" onclick="event.preventDefault(); toggleSeeMore(this);">See more</a>
                                    @endif
                                </div>
                                
                                <script>
                                    function toggleSeeMore(el) {
                                        const reviewContent = el.previousElementSibling;
                                        const previewContent = el.parentElement.querySelector('.review-content'); // Select the limited review content
                                
                                        if (reviewContent.style.display === 'none') {
                                            // Expand to show full review
                                            reviewContent.style.display = 'inline';
                                            previewContent.style.display = 'none';
                                            el.textContent = 'See less';
                                        } else {
                                            // Collapse to show limited review
                                            reviewContent.style.display = 'none';
                                            previewContent.style.display = 'inline';
                                            el.textContent = 'See more';
                                        }
                                    }
                                </script>
                                
                            </div>
                        @endforeach
                   
                </div>
                @else
                <img src="{{ asset('backend/doctor/images/no_review.jpeg') }}" alt="" style="width: 50%; height:370px; display:block; margin:0 auto;">
             @endif
                <!-- doctor reviews end -->
                <div style="color: #1E1E1E;" class="dashboard-title mt-5 mb-1 ">Put a Review</div>

                <form id="review-form" action="{{ route('client.ratings.store') }}" method="POST">
                    @csrf
                    <!-- User ID (Authenticated User) -->
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <!-- Rated Item ID -->
                    <input type="hidden" name="rated_item_id" value="{{ $doctor->id }}">
                    <!-- Rated Item Type -->
                    <input type="hidden" name="rated_item_type" value="App\Models\User">
                    <!-- Rating -->
                    <div id="full-stars-example-two">
                        <div class="rating-group">
                            <input disabled checked class="rating__input rating__input--none" name="rating" id="rating-none" value="0" type="radio">
                            <label aria-label="1 star" class="rating__label" for="rating-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating" id="rating-1" value="1" type="radio">
                            <label aria-label="2 stars" class="rating__label" for="rating-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating" id="rating-2" value="2" type="radio">
                            <label aria-label="3 stars" class="rating__label" for="rating-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating" id="rating-3" value="3" type="radio">
                            <label aria-label="4 stars" class="rating__label" for="rating-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating" id="rating-4" value="4" type="radio">
                            <label aria-label="5 stars" class="rating__label" for="rating-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                            <input class="rating__input" name="rating" id="rating-5" value="5" type="radio">
                        </div>
                    </div>
                    <!-- Review -->
                    <textarea class="doctor-review-textarea mt-3 @error('review') is-invalid @enderror" placeholder="Write a Review" name="review"></textarea>
                    @error('review')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <!-- Submit Button -->
                    <div class="make-appointment-btn mt-3" onclick="document.getElementById('review-form').submit()">
                        Submit
                    </div>
                </form>
                

            </div>
            <!-- profile container end -->
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
        document.addEventListener("DOMContentLoaded", function() {
            // Initialize Flatpickr on the input element
            const dateInput = document.getElementById('date-input');
            const flatpickrInstance = flatpickr(dateInput, {
                dateFormat: "d/m/y",
                minDate: "today" // Disable past dates
            });

            // Add event listener to open Flatpickr on container click
            document.querySelector('.date-picker-container').addEventListener('click', function() {
                flatpickrInstance.open();
            });
        });
    </script>
@endpush
