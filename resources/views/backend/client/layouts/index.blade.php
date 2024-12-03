@php
    use Illuminate\Support\Facades\DB;
    use App\Models\AppointmentBooking;
    use App\Models\User;


 $topDoctors = User::withAvg('ratings', 'rating')->where('role','doctor')
    ->orderByDesc('ratings_avg_rating')
    ->get();
@endphp


@extends('backend.client.app')
@section('title', 'Dashboard')
@push('styles')
    <style>
        .blog-item {
            background-color: #f0f0f0;
            padding: 15px;
            margin: 10px;
            border-radius: 8px;
            text-align: center;
            font-size: 16px;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .blog-item {
                font-size: 14px;
                padding: 12px;
            }
        }

        @media (max-width: 480px) {
            .blog-item {
                font-size: 12px;
                padding: 10px;
                margin: 5px;
            }
        }
    </style>
@endpush
@section('content')
    <div class="main-content">
        <div class="main-content-container">
            <!-- main container header start -->
            @include('backend.client.partials.header')

            <!-- dashboard content start -->
            <div class="section-title mt-4">Active Appointments</div>
            <div class="order-slider-wrapper mt-4 mt-md-5">
                <div class="order-slider">

                    @forelse ($data as $item)
                        <div class="order-card-wrapper">
                            <div class="order-card">
                                <div class="order-card-image">
                                    <img
                                        src="{{ asset($item->psychologist->avatar ?? 'backend/doctor/images/doctor.png') }}"
                                        alt="Half Day Trip" class="order-image"/>
                                </div>
                                <div class="order-details">
                                    <h3>{{ Str::limit($item->psychologist->area_of_expertise, 30) }}</h3>
                                    <p>
                                        <strong>Date:</strong>
                                        {{ \Carbon\Carbon::parse($item->appointment_date)->format('l, F j, Y') }}
                                    </p>
                                    <p>
                                        <strong>Therapy Type:</strong> {{ $item->psychologist->therapy_mode }}
                                    </p>
                                    <p class="last-child">
                                      <span><strong>Time:</strong>
                                           {{ \Carbon\Carbon::parse($item->appointment_date)->format('g:i A') }}
                                          </span><span class="status paid">{{$item->status}}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="blog-item">
                            No appointments found.
                        </p>
                    @endforelse

                </div>

                <!-- dashboard content end -->
            </div>

            <!-- dashboard bottom start -->
            <div class="dashboard-bottom mt-4 mt-md-5">
                <div class="left">
                    <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between ">
                        <div class="dashboard-title">Top Rated Doctors</div>
                        {{-- <a class="more-btn" href="./doctors.html">More >></a> --}}
                    </div>
                    <div class="top-doctors-list mt-4">
                        @forelse  ($topDoctors as $item)
                            <div class="item">
                                <div class="item-left">
                                    <div class="number">#{{ $loop->index + 1 }}</div>
                                    <div class="doctor-img">
                                        <img
                                            src="{{ asset($item->avatar ?? 'backend/doctor/images/doctor.png') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="item-right">
                                    <div class="doctor-info">
                                        <div class="doctor-title">
                                            {{ $item->name }}
                                        </div>
                                        <div class="doctor-text mt-2">{{ \Str::limit($item->area_of_expertise, 20, '') }}</div>
                                    </div>
                                    <div class="doctor-ratings">
                                        <!-- Dynamic Star Ratings -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="95" height="13"
                                             viewBox="0 0 95 13" fill="none">
                                            @for ($i = 0; $i < 5; $i++)
                                                <path
                                                    d="M6.69533 0.452219L4.86449 3.81352L0.768236 4.35428C0.0336581 4.45075 -0.260734 5.27076 0.271975 5.74043L3.23552 8.35534L2.53459 12.0492C2.40842 12.7169 3.18505 13.217 3.83552 12.9048L7.5 11.1607L11.1645 12.9048C11.8149 13.2145 12.5916 12.7169 12.4654 12.0492L11.7645 8.35534L14.728 5.74043C15.2607 5.27076 14.9663 4.45075 14.2318 4.35428L10.1355 3.81352L8.30467 0.452219C7.97664 -0.146926 7.02617 -0.154542 6.69533 0.452219Z"
                                                    fill="{{ $i < $item->average_rating ? '#FF5630' : '#FF5630' }}"/>
                                            @endfor
                                        </svg>
                                        <span>{{ $item->review_count }} reviews</span>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p class="blog-item">Not found.</p>
                        @endforelse

                    </div>
                </div>
                 <div class="right">
                    <div class="dashboard-title">Upcoming Check Up</div>
                    <div style="width: 100%; max-width: 500px;" class="mt-4 mt-md-5">
                        <p id="calendar-container"></p>
                    </div>
                </div>
            </div>
            <!-- dashboard bottom end -->

        </div>
    </div>
@endsection
