@php
    use App\Enums\Page;
    use App\Enums\Section;
    use App\Models\User;
    use App\Models\PsychologySessions;
    $data = User::where('role', 'doctor')->where('status', 'active')->paginate(12);
    $sessions = PsychologySessions::all();

@endphp

@extends('frontend.app')

@push('styles')
    <style>
        .banner-section-start {
            background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0.6) 100%),
                url('{{ asset($cms[Section::HOME_BANNER->value]->bg ?? 'frontend/assets/images/hero-banner.jpg') }}');
            background-size: cover;
            background-position: 0px -126.781px;
        }

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


@section('title', 'Home page')

@section('content')

    <main>
        <!-- banner area starts -->
        <section class="banner-section-start">
            <div class="hero-content-wrapper d-flex flex-column justify-content-center align-items-center">
                <h1>{{ $cms[Section::HOME_BANNER->value]->title ?? 'Therapist Connect' }}</h1>
                <h2>{{ $cms[Section::HOME_BANNER->value]->sub_title ?? 'Find the Right Psychologist for You' }}</h2>
                <p>{!! $cms[Section::HOME_BANNER->value]->content ??
                    "Finding the right psychological support can feel overwhelming—many
                                                                                                                people don’t know where to start. It’s common to be referred to
                                                                                                                psychologists with long waiting lists or struggle to find someone
                                                                                                                who truly fits your needs Read More." !!}</p>
                <a href="{{ route('ourPsychologist') }}"
                    class="hero-banner-btn">{{ $cms[Section::HOME_BANNER->value]->btn_text ?? 'Find a Psychologist' }}</a>
            </div>
        </section>
        <!-- banner area ends -->

        <!-- SERVICE SECTION START -->
        <section class="service-blog-section mt-150">
            <div class="container">
                <div class="common-heading-para-link-wrapper">
                    <div class="expert-heading-para">
                        <h4 class="expert-sub-heading">  {{ $cms[Section::HOME_THERAPY_SERVICE->value]->title ??
                        'About Us' }}</h4>
                        <h5>{{ $cms[Section::HOME_THERAPY_SERVICE->value]->sub_title ??
                            'We are passionate about providing exceptional mental health care in a compassionate and
                                                                                                                                             supportive environment.' }}
                        </h5>
                    </div>
                    <a class="tm-common-link" href="{{route('service')}}">Read More <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                                fill="none">
                                <path
                                    d="M24.0001 8H25.0001V7H24.0001V8ZM23.293 7.29289L7.29297 23.2931L8.70718 24.7072L24.7071 8.70711L23.293 7.29289ZM14.6667 9H24.0001V7H14.6667V9ZM23.0001 8V17.3333H25.0001V8H23.0001Z" />
                            </svg>
                        </span></a>
                </div>
                <div class="tm-row w-100">
                    <div class="tm-col tm-col-therapy">
                        <div class="therapy-section">
                            {!! $cms[Section::HOME_THERAPY_SERVICE->value]->content ?? "Finding the right psychological support can be overwhelming. Many people don’t know where to begin. Long waiting lists, limited availability, and even GPs with the best intentions may struggle to connect you with the right psychologist.
That’s where Therapist Connect steps in.
Our platform streamlines the search process, helping you find a psychologist who fits your unique needs. Whether you prefer in-person sessions, telehealth, or require expertise in areas such as anxiety, trauma, relationships, or ADHD, our platform lets you filter options to suit your lifestyle.
We’re here to remove the barriers to care so you can focus on what matters most—getting the support you need, when and where you need it.
" !!}
                        </div>
                    </div>
                    <div class="tm-col tm-col-img">
                        <div class="tm-blog-img-area">
                            <img src="{{ asset($cms[Section::HOME_THERAPY_SERVICE->value]->image ?? 'frontend/assets/images/blog-img.jpg') }}"
                                alt="" srcset="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- SERVICE SECTION END -->

        <!-- contact section start -->
        <section class="join-our-section mt-150">
            <div class="container">
                <div class="tm-row-2">
                    <div class="tm-col">
                        <div class="common-heading-para-link-wrapper-2">
                            <div class="expert-heading-para">
                                <h3 class="tm-common-heading">
                                    {{ $cms[Section::HOME_NETWORK_PSYCHOLOGISTS->value]->title ?? 'For Clients' }}
                                </h3>
                                <h3 class="tm-common-about mt-3" style="font-style: italic">
                                    {{ $cms[Section::HOME_NETWORK_PSYCHOLOGISTS->value]->sub_title ?? 'Find the Right
                                    Support with Therapist Connect' }}
                                </h3>
                                <p class="pt-2">{!! $cms[Section::HOME_NETWORK_PSYCHOLOGISTS->value]->content ??
                                   "Looking for a psychologist can feel overwhelming, but Therapist Connect makes it simple and stress-free. Our platform connects you with qualified professionals who align with your needs.
Why Choose Therapist Connect?
Tailored Matches: Filter by specialty, location, availability, and session preferences (in-person or telehealth).
Expertise You Can Trust: Connect with psychologists experienced in anxiety, trauma, ADHD, relationships, and more.
Real-Time Availability: Avoid waiting lists by finding professionals with current openings.

How to Get Started:
Search: Use the search tool to filter by your preferences.
Review Profiles: Explore psychologists’ expertise, approaches, and availability.
Book a Session: Contact the psychologist directly to schedule your first session.

Your Journey Matters
Whether you're seeking help for the first time or transitioning to a new psychologist, Therapist Connect makes it easier to find the right support.
" !!}</p>
                            </div>
                            <a class="tm-common-link tm-common-link-2" href="{{ route('ourPsychologist') }}">Find a Psychologist</a>
                        </div>
                    </div>
                    <div class="tm-col">
                        <div class="tm-join-instruction-wrapper">

                            @if ($cms[Section::HOME_NETWORK_PSYCHOLOGISTS_ITEM->value]->count() > 0)

                                @foreach ($cms[Section::HOME_NETWORK_PSYCHOLOGISTS_ITEM->value] as $item)
                                    <div class="tm-join-instruction-item">
                                        <h4>{{ $item->title ?? '' }}</h4>
                                        <p>{!! $item->content ?? '' !!}</p>
                                        <span class="serial-number">
                                            {{ $loop->iteration }}
                                        </span>
                                    </div>
                                @endforeach
                            @else
                                <div class="tm-join-instruction-item">
                                    <h4>Create Your Profile</h4>
                                    <p>Start by creating a professional profile that highlights your expertise, experience,
                                        and
                                        qualifications. A well-crafted profile helps clients understand your background and
                                        feel
                                        confident in choosing you for their mental health needs</p>
                                    <span class="serial-number">
                                        1
                                    </span>
                                </div>
                                <div class="tm-join-instruction-item">
                                    <h4>Verify Your License</h4>
                                    <p>To maintain a trusted platform, we require all psychologists to verify their
                                        licenses.
                                        This process helps ensure that clients can connect with certified professionals.
                                        Simply
                                        upload your license details, and we’ll handle the verification swiftly.</p>
                                    <span class="serial-number">
                                        2
                                    </span>
                                </div>
                                <div class="tm-join-instruction-item">
                                    <h4>Connect with Clients</h4>
                                    <p>Reach out to clients actively searching for mental health support. Our platform
                                        connects
                                        you with individuals who are looking for your expertise, helping you grow your
                                        practice
                                        and make a positive impact on their lives.</p>
                                    <span class="serial-number">
                                        3
                                    </span>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact section End -->

        <!-- EXPERT PSYCHOLOGISTS SECTION START -->
        <section class="expert-section mt-150">
            <div class="container">
                <div class="common-heading-para-link-wrapper">
                    <div class="expert-heading-para">
                        <h4 class="expert-sub-heading"> {{$home_pshchologiest->title ?? 'For Psychologists'}}</h4>
                        <h3 class="tm-common-heading">
                            {{$home_pshchologiest->sub_title ?? 'Join Therapist Connect'}}
                                </h3>
                        <p class="mx-auto">{!! $home_pshchologiest->content ?? "Are you a psychologist looking to expand your reach and connect with more clients? Therapist Connect is the perfect platform to showcase your expertise.
Why Join Therapist Connect?
Grow Your Client Base: Connect with a targeted audience looking for your services.
Highlight Your Expertise: Showcase your specialties, availability, and therapeutic approach.
Easy Profile Management: Keep your details up-to-date with minimal effort.

Requirements to Join:
AHPRA registration.
Place of practice (in-person or telehealth).
A professional description outlining your expertise.
" !!}
                                   </div>
                    @auth
                        @php
                            // Determine the route based on the authenticated user's role
                            $redirectRoute = match (auth()->user()->role) {
                                'doctor' => route('doctor.dashboard'),
                                'admin' => route('admin.dashboard'),
                                'client' => route('client.dashboard'),
                                default => route('home'), // Fallback route if no role matches
                            };
                        @endphp
                        <a href="{{ $redirectRoute }}" class="tm-common-link">
                            Sign Up as a Psychologist
                            <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                <path
                    d="M24.0001 8H25.0001V7H24.0001V8ZM23.293 7.29289L7.29297 23.2931L8.70718 24.7072L24.7071 8.70711L23.293 7.29289ZM14.6667 9H24.0001V7H14.6667V9ZM23.0001 8V17.3333H25.0001V8H23.0001Z" />
            </svg>
        </span>
                        </a>
                    @else
                        <a href="{{ route('account.type') }}" class="tm-common-link">
                            Sign Up as a Psychologist
                            <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                <path
                    d="M24.0001 8H25.0001V7H24.0001V8ZM23.293 7.29289L7.29297 23.2931L8.70718 24.7072L24.7071 8.70711L23.293 7.29289ZM14.6667 9H24.0001V7H14.6667V9ZM23.0001 8V17.3333H25.0001V8H23.0001Z" />
            </svg>
        </span>
                        </a>
                    @endauth

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
                                    <p>Specialty - <span>{{ Str::limit($item->area_of_expertise, 30) ?? 'N/A' }}</span></p>
                                    <p>Primary Care - <span>{{ $item->experience ?? 'N/A' }} Years of
                                            Experience</span></p>
                                    <a class="expert-card-item-link"
                                        href="{{ route('phychologist.view', ['slug' => $item->slug]) }}">View Doctor
                                        Profile</a>
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

        <!-- how to section start -->

        <section class="how-to-section mt-150">
            <div class="container">
                <h2 class="faq-title tm-common-heading">Our Psychologists<br
                        class="d-none d-lg-block"> Meet the Experts Who Make a Difference</h2>
                <h6 style="text-align: center;">
                    Therapist Connect partners with highly qualified psychologists dedicated to providing exceptional care for a variety of mental health needs.
                </h6>
                <div class="how-to-card-wrapper pt-5">
                    @if ($sessions->isNotEmpty())
                        @foreach ($sessions as $session)
                            <div class="how-to-card-item">
                                <div class="how-to-card-item-img-area">
                                    <img src="{{ asset($session->image ?? 'frontend/assets/images/default-icon.svg') }}"
                                        alt="">
                                </div>
                                <div class="how-to-card-item-content-area">
                                    <h4>{{ $session->name }}</h4>
                                    <p>{!! $session->description !!}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="how-to-card-item">
                            <div class="how-to-card-item-img-area">
                                <img src="{{ asset('frontend/assets/images/book-icon.svg') }}" alt="">
                            </div>
                            <div class="how-to-card-item-content-area">
                                <h4>Book an appointment with your GP</h4>
                                <p>Book an extended appointment with your GP to get a Mental Health Plan and a referral
                                    letter.</p>
                            </div>
                        </div>
                        <div class="how-to-card-item">
                            <div class="how-to-card-item-img-area">
                                <img src="{{ asset('frontend/assets/images/medicarea-icon.svg') }}" alt="">
                            </div>
                            <div class="how-to-card-item-content-area">
                                <h4>Upload your Medicare documents</h4>
                                <p>Upload your Mental Health Plan & referral to your My Mirror dashboard to share them with
                                    your psychologist.</p>
                            </div>
                        </div>
                        <div class="how-to-card-item">
                            <div class="how-to-card-item-img-area">
                                <img src="{{ asset('frontend/assets/images/doctor-session-icon.svg') }}" alt="">
                            </div>
                            <div class="how-to-card-item-content-area">
                                <h4>Complete and pay for your session</h4>
                                <p>You will be charged the private fee after your session. Part of this session fee can be
                                    rebated through a Medicare self-claim.</p>
                            </div>
                        </div>
                        <div class="how-to-card-item">
                            <div class="how-to-card-item-img-area">
                                <img src="{{ asset('frontend/assets/images/rebates-icon.svg') }}" alt="">
                            </div>
                            <div class="how-to-card-item-content-area">
                                <h4>Receive rebates to your account</h4>
                                <p>Once you submit your claim it will be processed by Medicare, and you'll receive the
                                    rebate back into your account.</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <!-- how to section End -->

        <!-- rebates section start -->
        <section class="reabtes-section mt-150 ptb-80">
            <div class="container">
                <div class="tm-row-3">
                    <div class="tm-col">
                        <div class="tm-rebates-image-area">
                            <img src="{{ asset($rebates->image ?? 'frontend/assets/images/rebates.jpg') }}"
                                alt="Rebates Image" srcset="">
                        </div>
                    </div>
                    <div class="tm-col">
                        <div class="expert-heading-para">
                            <h4 class="tm-common-heading">{{ $rebates->title ?? 'Claiming Medicare Rebates for Psychology Sessions' }}</h4>
                            <p>
                                {!! $rebates->content ?? "Access Affordable Mental Health Care in Australia"
!!}  </p>
                        </div>
                        <div class="rebates-mini-card-wrapper">
                            @if ($rebatesItems->count() > 0)

                                @foreach ($rebatesItems as $item)
                                    <div class="rebates-mini-card-item">
                                        <h3>{{ $item->title ?? '' }}</h3>
                                        <p>{!! $item->content ?? '' !!}</p>
                                    </div>
                                @endforeach
                            @else
                                <div class="rebates-mini-card-item">
                                    <h3>Receiving Medical Services</h3>
                                    <p>After receiving a medical service, your healthcare provider will usually provide you
                                        with
                                        an invoice or receipt detailing the services rendered and their costs.</p>
                                </div>
                                <div class="rebates-mini-card-item">
                                    <h3>Submitting a Claim</h3>
                                    <p>Claim Medicare rebates via Online,In-Person,By Mail</p>
                                </div>
                                <div class="rebates-mini-card-item">
                                    <h3>Processing Times</h3>
                                    <p>Claims submitted online are typically processed faster than those submitted by mail.
                                        Most
                                        online claims are processed within a few days, while mail claims may take up to
                                        several
                                        weeks.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- rebates section end -->

        <!-- blog section start -->
        <section class="blog-section mt-150">
            <div class="container">
                <div class="common-heading-para-link-wrapper psychologist-heading-para-link-wrapper">
                    <div class="expert-heading-para">
                        <h4 class="expert-sub-heading">Article</h4>
                        <h3 class="tm-common-heading">Explore Our Blog Insights on Mental Wellness</h3>
                    </div>
                </div>
                <div class="blog-collections-cards">
                    @if ($blogs->count() > 0)
                        <!-- blog item-1 -->
                        @foreach ($blogs as $blog)
                            <div class="blog-item">
                                <div class="blog-img-area">
                                    <img src="{{ asset($blog->image) ?? '' }}" alt="blog-img-1" srcset="">
                                </div>
                                <div class="blog-content-area">
                                    <div class="blog-date-heading-wrapper">
                                        <p>{{ $blog->created_at->format('M d, Y') ?? '' }}</p>
                                        <h3>{{ $blog->title ?? '' }}</h3>
                                    </div>
                                    <p class="blog-para">
                                        {!! substr($blog->description, 0, 100) !!}
                                    </p>
                                    <a class="blog-read-more" href="{{ route('blogDetails', $blog->slug) }}">Read More
                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="17"
                                                viewBox="0 0 16 17" fill="none">
                                                <path
                                                    d="M12 4.5H12.5V4H12V4.5ZM11.6465 4.14645L3.64648 12.1465L4.35359 12.8536L12.3536 4.85355L11.6465 4.14645ZM7.33337 5H12V4H7.33337V5ZM11.5 4.5V9.16667H12.5V4.5H11.5Z"
                                                    fill="#187586" />
                                            </svg></span></a>
                                </div>


                        </div>
                    @endforeach
                    @else
                        <div class="blog-item">
                            <p>Data Not Available</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <!-- blog section end -->

        <!-- fag section start -->
        <section class="faq-section mt-150 ptb-80">
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
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $uniqueId }}"
                                            aria-expanded="false" aria-controls="collapse{{ $uniqueId }}">
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
                                            {!! $faq->short_description ??
                                                'In the first session, your therapist will get to know you, discuss your goals, and develop a personalized plan to address your needs.' !!}
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
                                        develop a personalized plan to address your needs. It's a welcoming space where you
                                        can
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
                                        Each therapy session typically lasts between 50 to 60 minutes, providing adequate
                                        time
                                        to discuss issues and work on progress.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
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
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Therapy is beneficial for addressing mental health concerns, while consulting
                                        focuses on
                                        guidance and advice in specific areas.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
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
                                        data-bs-target="#collapseFive" aria-expanded="false"
                                        aria-controls="collapseFive">
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
                                        The frequency of sessions is based on your needs and goals. Your therapist will help
                                        you
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
