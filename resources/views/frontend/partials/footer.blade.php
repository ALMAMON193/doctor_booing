@php
    $socialLinks = App\Models\SocialLink::all();
    $dynamicPage = App\Models\DynamicPage::where('status', 'active')->get();

@endphp

<footer>
    <div class="container">
        <div class="footer-container">
            <div class="footer-col footer-first-col">
                <a href="{{ route('home') }}" class="footer-logo">
                    <img src="{{ asset('frontend/assets/images/footer-logo.png') }}" alt="" srcset="">
                </a>
                <p> {!! $settings->description ??
                    'Psychlnsights, we provide compassionate mental health support tailored to your needs. Our experienced team is dedicated to helping you achieve wellness through effective therapy and resources. Your well-being is our priority!' !!} </p>

                <div class="tm-social-media-wrapper">
                    {{-- <h4>Follow Us:</h4> --}}
                    <div class="tm-social-media">
                        @if ($socialLinks->isNotEmpty())
                            @foreach ($socialLinks as $socialLink)
                                <a href="{{ $socialLink->social_link }}" target="_blank">
                                    <img src="{{ asset($socialLink->social_icon) }}"
                                        alt="{{ $socialLink->social_name }}">
                                </a>
                            @endforeach
                        @else
                            {{-- Default Static Content --}}
                            <a href="#" target="_blank">
                                <img src="{{ asset('frontend/assets/images/call.svg') }}" alt="" srcset="">
                            </a>
                            <a href="#" target="_blank">
                                <img src="{{ asset('frontend/assets/images/linked_in.svg') }}" alt=""
                                    srcset="">
                            </a>
                            <a href="#" target="_blank">
                                <img src="{{ asset('frontend/assets/images/fb.svg') }}" alt="" srcset="">
                            </a>

                        @endif
                    </div>
                </div>

            </div>
            <div class="footer-col">
                <h4>Page</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    {{-- <li><a href="">Contact Us</a></li> --}}
                    {{-- <li><a href="">Appointment</a></li> --}}
                </ul>
            </div>
            <div class="footer-col">
                <h4>Service</h4>
                <ul>
                    <li><a href="">Book Session</a></li>
                     <li><a href="{{route('home')}}">Session</a></li>
                    <li><a href="{{ route('blog') }}">Blog</a></li>
                     <li><a href="{{route('service')}}">Service</a></li>
                </ul>
            </div>
            <div class="footer-col footer-fourth-col">
                <h4>Newsletter Signup</h4>
                <p>Get the inside scoop on new frames, events, and more</p>
                {{-- <div class="tm-footer-email-address-wrapper">
              {{-- <input type="text" placeholder="Email address">
              <button>Sent</button>
            </div> --}}
                <div class="footer-contact-wrapper">
                    <div class="footer-contact-item">
                        <div class="footer-contact-img-area">
                            <img src="{{ asset('frontend/assets/images/location.svg') }}" alt=""
                                srcset="">
                        </div>
                        <div class="footer-contact-item-text-wrapper">
                            <p>{{ $settings->address ??
                                '4517 Washington Ave.
                                                                            Manchester, Kentucky 394' }}
                            </p>
                        </div>
                    </div>
                    <div class="footer-contact-item">
                        <div class="footer-contact-img-area">
                            <img src="{{ asset('frontend/assets/images/call-2.svg') }}" alt="" srcset="">
                        </div>
                        <div class="footer-contact-item-text-wrapper">
                            <p>{{ $settings->phone ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            {{-- <p>© 2024 Glamora. All rights reserved.</p> --}}
        </div>
    </div>
</footer>
