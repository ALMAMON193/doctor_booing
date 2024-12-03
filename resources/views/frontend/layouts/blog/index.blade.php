@extends('frontend.app')

@section('title', 'Blog Page')

@push('styles')
@endpush

@section('content')
    <main>
        <!-- page title start -->
        <section class="page-top-title">
            <div class="container">
                <div class="page-content-wrapper">
                    <h1 class="page-title">Blog Page</h1>
                </div>
            </div>
        </section>
        <!-- page title end -->

        <!-- blog section start -->
        <section class="blog-section mt-150 mb-150">
            <div class="container">
                <div class="common-heading-para-link-wrapper psychologist-heading-para-link-wrapper">
                    <div class="expert-heading-para">
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
                        <p>Data Not Avaliable</p>
                    </div>
                    @endif
                </div>
            </div>
        </section>
        <!-- blog section end -->

    </main>

@endsection

@push('scripts')
@endpush
