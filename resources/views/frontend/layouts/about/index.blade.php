@php
use App\Enums\Page;
use App\Enums\Section;
use App\Models\User;
$data = User::where('role', 'doctor')->where('status', 'inactive')->paginate(12);

@endphp

@extends('frontend.app')

@section('title', 'About Us')

@push('styles')

@endpush

@section('content')
    <main>
        <!-- page title start -->
        <section class="page-top-title">
            <div class="container">
                <div class="page-content-wrapper">
                    <h1 class="page-title">About Us</h1>
                </div>
            </div>
        </section>
        <!-- page title end -->

        <!-- about us first section start -->
        <section class="our-mission-section mt-150 mb-150">
            <div class="container">
                <div class="tm-about-us-row">
                    <div class="tm-col">
                        <div class="tm-about-col-text-area">
                            <h2 class="tm-common-heading">
                                {{ $cms->title ?? "Welcome to Therapist Connect by Psych Insights!" }}
                            </h2>
                            <div class="tm-about-col-text-area-main">
                                <h3>{{ $cms->sub_title ?? 'Our Mission' }}</h3>
                                @if (!empty($cms) && !empty($cms->content))
                                    {!! $cms->content !!}
                                @else
                                    <p>Finding the right psychological
                                        support can feel overwhelming—many
                                        people don’t know where to start. It’s common
                                        to be referred to psychologists with long
                                        waiting lists or struggle to find
                                        someone who truly fits your needs. even
                                        GPs, despite their best efforts, may not
                                        have up-to-date information on
                                        availability, making it harder to
                                        connect with the right support.</p>
                                    <h4>That’s where Therapist Connect
                                        comes in.
                                    </h4>
                                    <p>Our platform simplifies the search by
                                        helping you find a psychologist who
                                        aligns with your unique needs. Whether
                                        you’re looking for in-person sessions,
                                        prefer telehealth, or need expertise in
                                        anxiety, trauma, relationships, or ADHD,
                                        you can filter and connect with
                                        professionals whose availability and
                                        specialties fit your life. we’re here to
                                        remove the barriers to care, so you can
                                        focus on what matters most—getting the
                                        support you deserve, when and where you
                                        need it.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tm-col">
                        <div class="tm-about-us-image-area">
                            <img src="{{ !empty($cms) && !empty($cms->image) ? asset($cms->image) : asset('frontend/assets/images/our-mission.jpg') }}" alt="Our Mission">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- about us first section end -->

        <!-- EXPERT PSYCHOLOGISSTS SECTION START -->
        <section class="expert-section mt-150 about-expert-section ptb-80">
            <div class="container">
                <div class="common-heading-para-link-wrapper">
                    <div class="expert-heading-para">
                        <h4 class="expert-sub-heading">Our
                            Psychologist</h4>
                            <h3 class="tm-common-heading">{{ $meetWithTeams->title ?? "Trusted, Licensed, and Expert
                                Psychologists" }}</h3>
                            <p class="mx-auto">{!! $meetWithTeams->content ?? "At Psychinsights, our licensed and vetted
                                psychologists provide compassionate, expert care tailored to
                                your unique mental health needs, ensuring you feel supported
                                every step of the way." !!}</p>

                    </div>
                    <a class="tm-common-link">Meet With
                        Doctor
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                                fill="none">
                                <path
                                    d="M24.0001 8H25.0001V7H24.0001V8ZM23.293 7.29289L7.29297 23.2931L8.70718 24.7072L24.7071 8.70711L23.293 7.29289ZM14.6667 9H24.0001V7H14.6667V9ZM23.0001 8V17.3333H25.0001V8H23.0001Z" />
                            </svg>
                        </span></a>
                </div>

                <div class="expert-card-wrapper">
                    @if ($data->isEmpty())
                        <p>No experts available at the moment.</p>
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

        <!-- fag section start -->
        <section class="faq-section mt-150 mb-150 about-faq-section">
            <div class="container">
                <div class="tm-accordion-content-wrapper">
                    <h2 class="faq-title">Frequently Asked Questions?</h2>
                    <div class="accordion tm-accordion" id="faqAccordion">
                        @if ($faqs->count() > 0)

                        @foreach ($faqs as $index => $faq)
                            @php
                                $uniqueId = 'faq' . $index;
                            @endphp
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $uniqueId }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $uniqueId }}" aria-expanded="false"
                                        aria-controls="collapse{{ $uniqueId }}">
                                        {{ $faq->title ?? 'What Can I Expect During My First Therapy Session?' }}
                                        <!-- Custom SVG icons for plus and minus -->
                                        <span class="icon-plus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M12 8V16M8 12H16M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                                    stroke="#0C0C0C" stroke-opacity="0.7" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                        <span class="icon-minus">
                                            <!-- SVG code for minus icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M8 12H16M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                                    stroke="#0C0C0C" stroke-opacity="0.7" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </button>
                                </h2>
                                <div id="collapse{{ $uniqueId }}" class="accordion-collapse collapse"
                                    aria-labelledby="heading{{ $uniqueId }}" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        {!! $faq->short_description ?? 'In the first session, your therapist will get to know you, discuss your goals, and develop a personalized plan to address your needs.' !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What Can I Expect During My First Therapy Session?
                                    <!-- Custom SVG icons for plus and minus -->
                                    <span class="icon-plus">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M12 8V16M8 12H16M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                                stroke="#0C0C0C" stroke-opacity="0.7" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="icon-minus">
                                        <!-- SVG code for minus icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M8 12H16M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                                stroke="#0C0C0C" stroke-opacity="0.7" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    In the first session, your therapist will get to know you, discuss your goals, and
                                    develop a personalized plan to address your needs. It's a welcoming space where you can
                                    share at your own pace.
                                </div>
                            </div>
                        </div>
                        <!-- Repeat for other accordion items -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How Long Does Each Therapy Session Last?
                                    <span class="icon-plus">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M12 8V16M8 12H16M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                                stroke="#0C0C0C" stroke-opacity="0.7" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="icon-minus">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M8 12H16M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                                stroke="#0C0C0C" stroke-opacity="0.7" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Each therapy session typically lasts between 50 to 60 minutes, providing adequate time
                                    to discuss issues and work on progress.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    How Do I Know If I Need Therapy or Consulting?
                                    <span class="icon-plus">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M12 8V16M8 12H16M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                                stroke="#0C0C0C" stroke-opacity="0.7" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="icon-minus">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M8 12H16M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                                stroke="#0C0C0C" stroke-opacity="0.7" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Therapy is beneficial for addressing mental health concerns, while consulting focuses on
                                    guidance and advice in specific areas.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Are Therapy Sessions Confidential?
                                    <span class="icon-plus">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M12 8V16M8 12H16M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                                stroke="#0C0C0C" stroke-opacity="0.7" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="icon-minus">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M8 12H16M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                                stroke="#0C0C0C" stroke-opacity="0.7" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, therapy sessions are confidential, with exceptions related to legal and safety
                                    obligations.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    How Often Should I Attend Sessions?
                                    <span class="icon-plus">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M12 8V16M8 12H16M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                                stroke="#0C0C0C" stroke-opacity="0.7" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <span class="icon-minus">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M8 12H16M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                                stroke="#0C0C0C" stroke-opacity="0.7" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    The frequency of sessions is based on your needs and goals. Your therapist will help you
                                    decide on the best schedule.
                                </div>
                            </div>
                        </div>

                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- fag section end -->

    </main>

@endsection

@push('scripts')
@endpush
