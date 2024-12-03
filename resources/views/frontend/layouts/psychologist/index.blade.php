@php
    use App\Models\User;
    $data = User::where('role', 'doctor')->where('status', 'active')->paginate(12);
@endphp
@extends('frontend.app')

@section('title', 'Our Psychologist')

@push('styles')
      <style>
          /* Basic styles for the blog item */
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
    <main>
        <!-- page title start -->
        <section class="page-top-title">
            <div class="container">
                <div class="page-content-wrapper">
                    <h1 class="page-title">Our Psychologist</h1>
                </div>
            </div>
        </section>
        <!-- page title end -->

        <!-- EXPERT PSYCHOLOGISSTS SECTION START -->
        <section class="expert-section mt-150 mb-150">
            <div class="container">
                <div class="common-heading-para-link-wrapper psychologist-heading-para-link-wrapper">
                    <div class="expert-heading-para">
                        <h4 class="expert-sub-heading">Meet With Our Team</h4>
                        <h3 class="tm-common-heading">{{ $meetWithTeams->title ?? "Trusted, Licensed, and Expert
                            Psychologists" }}</h3>
                        <p class="mx-auto">{!! $meetWithTeams->content ?? "At Psychinsights, our licensed and vetted
                            psychologists provide compassionate, expert care tailored to
                            your unique mental health needs, ensuring you feel supported
                            every step of the way." !!}</p>
                    </div>
                </div>

                <div class="expert-card-wrapper">
                    @if ($data->isEmpty())
                        <p class="blog-item">No experts available at the moment.</p>
                    @else
                        @foreach ($data as $item)
                            <div class="expert-card-item">
                                <div class="expert-card-img-area">
                                    <img src="{{ asset($item->avatar ?? 'frontend/assets/images/expert-1.png') }}"
                                        alt="Doctor Image">
                                </div>
                                <div class="expert-card-content-area">
                                    <h5>Name: <span>{{ $item->name }}</span></h5>
                                    <p>Specialty - <span>{{ $item->area_of_expertise ?? 'N/A' }}</span></p>
                                    <p>Primary Care - <span>{{ $item->experience ?? 'N/A' }} Years of
                                            Experience</span></p>
                                    <a class="expert-card-item-link" href="{{ route('phychologist.view', ['slug' => $item->slug]) }}">View Doctor Profile</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
               <!-- Bootstrap 5 Pagination -->
            <div class="pagination-wrapper mt-4">
                {{ $data->links('vendor.pagination.custom') }}
            </div>
            </div>

        </section>
        <!-- EXPERT PSYCHOLOGISSTS SECTION END -->

    </main>

@endsection

@push('scripts')
@endpush
