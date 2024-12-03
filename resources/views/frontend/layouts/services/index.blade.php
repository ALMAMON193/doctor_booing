@extends('frontend.app')

@section('title', 'Service')

@push('styles')
    <!-- ==== All Css Links ==== -->
@endpush

@section('content')
    <main>
        <!-- page title start -->
        <section class="page-top-title">
            <div class="container">
                <div class="page-content-wrapper">
                    <h1 class="page-title">Service</h1>
                </div>
            </div>
        </section>
        <!-- page title end -->

        <!-- blog details section start -->
        <section class="service-section mt-150">
            <div class="container">
                <div class="service-content-wrapper">
                    <div class="blog-details-img-area">
                        <img src="{{ asset( $individualTherapy?->image ? url($individualTherapy->image) :'frontend/assets/images/services.jpg') }}" alt="Individual Therapy">
                        
                    </div>
                    <div class="service-main-content-wrapper">
                        <div class="services-content-header">
                            <h2>{{ $individualTherapy->title ?? 'Individual Therapy' }}</h2>
                            <p>{!! $individualTherapy->content ?? 'Individual therapy offers a personalized and confidential space where you can work one-on-one
                                with a licensed therapist to address emotional challenges, mental health concerns, and
                                personal struggles. Each session is tailored to your unique needs, providing professional
                                guidance to help you manage issues like anxiety, depression, stress, and trauma. Through a
                                supportive and goal-oriented approach, individual therapy empowers you to gain
                                self-awareness, develop coping strategies, and make meaningful progress towards improved
                                mental well-being. With a compassionate therapist by your side, this therapeutic journey
                                fosters growth, healing, and lasting positive change.' !!}</p>
                        </div>
                        <div class="service-content-lower">
                            <h2>{{ $benefitTherapyTitle->title ?? 'Benefits Individual Therapy' }}</h2>
                            <div class="services-content-lower-wrapper">
                                @if ($benefitTherapies->count() > 0)

                                @foreach ($benefitTherapies as $benefitTherapy)

                                <div class="service-lower-item">
                                    <h3>{{ $benefitTherapy->sub_title ?? '' }}</h3>
                                    <p>{!! $benefitTherapy->sub_content ?? '' !!}</p>
                                </div>

                                @endforeach

                                @else

                                <div class="service-lower-item">
                                    <h3>Confidential and Safe Environment</h3>
                                    <p>Therapy sessions are conducted in a confidential setting where you can openly share
                                        your thoughts and feelings without fear of judgment.</p>
                                </div>
                                <div class="service-lower-item">
                                    <h3>Professional Guidance</h3>
                                    <p>Led by experienced and licensed therapists who are trained to help you navigate
                                        through emotional difficulties and develop practical solutions.</p>
                                </div>
                                <div class="service-lower-item">
                                    <h3>Goal-Oriented</h3>
                                    <p>The therapist works with you to set and achieve specific mental health goals,
                                        empowering you to take control of your well-being.</p>
                                </div>
                                <div class="service-lower-item">
                                    <h3>Supportive Relationship</h3>
                                    <p>Therapy provides a space to build trust and a strong rapport with your therapist,
                                        making it easier to explore your emotions and behaviors..</p>
                                </div>
                                <div class="service-lower-item">
                                    <h3>Professional Guidance</h3>
                                    <p>Led by experienced and licensed therapists who are trained to help you navigate
                                        through emotional difficulties and develop practical solutions.</p>
                                </div>

                                @endif

                            </div>
                        </div>
                        <div class="service-content-lower">
                            <h2>{{ $whatExpectTitle->title ?? 'What to Expect' }}</h2>
                            <div class="services-content-lower-wrapper">
                                @if ($whatExpects->count() > 0)

                                @foreach ($whatExpects as $whatExpect )

                                <div class="service-lower-item">
                                    <h3>{{ $whatExpect->sub_title ?? '' }}</h3>
                                    <p>{!! $whatExpect->sub_content ?? '' !!}</p>
                                </div>

                                @endforeach

                                @else
                                <div class="service-lower-item">
                                    <h3>Ongoing Sessions</h3>
                                    <p>Regular one-on-one meetings to track your progress, explore challenges, and refine
                                        your coping strategies.</p>
                                </div>
                                <div class="service-lower-item">
                                    <h3>Progress Evaluation</h3>
                                    <p> Periodically, the therapist will review your growth and adjust the approach to
                                        ensure you are moving towards your mental health goals.</p>
                                </div>
                                <div class="service-lower-item">
                                    <h3>Goal-Oriented</h3>
                                    <p>The therapist works with you to set and achieve specific mental health goals,
                                        empowering you to take control of your well-being.</p>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog details section end -->
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
                    <!-- blog item-1 -->

                    @if ($blogs->count() > 0)

                    @foreach ($blogs as $blog)
                        <div class="blog-item">
                            <div class="blog-img-area">
                                <img src="{{ asset($blog->image ?? '') }}" alt="blog-img-1" srcset="">
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
                    <div class="blog-item pb-5">
                        <p>Data Not Avaliable</p>
                    </div>
                    @endif
                </div>
            </div>
            </div>
        </section>
        <!-- blog section end -->

    </main>

@endsection

@push('scripts')
@endpush
