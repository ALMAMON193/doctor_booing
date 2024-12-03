@extends('backend.doctor.app')


@section('content')
    <div class="main-content">
        <div class="main-content-container">
            <!-- main container header start -->
            <div class="main-content-header">
                <svg class="menu-icon" width="24px" height="24px" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 448 512">
                    <path
                        d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/>
                </svg>
                <div class="section-title">Welcome {{ Auth::user()->name ?? 'John' }} {{ Auth::user()->lname ?? 'Doe' }} 👋</div>
                @include('backend.doctor.partials.notification')
                <div class="header-actions">

                    <div data-bs-toggle="modal"
                         data-bs-target="#notificationModal" class="notification-btn">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="40"
                            height="41"
                            viewBox="0 0 40 41"
                            fill="none"
                        >
                            <rect
                                x="0.5"
                                y="1"
                                width="39"
                                height="39"
                                rx="7.5"
                                fill="white"
                                stroke="#E8E8E8"
                            />
                            <path
                                d="M20.0199 29.03C17.6899 29.03 15.3599 28.66 13.1499 27.92C12.3099 27.63 11.6699 27.04 11.3899 26.27C11.0999 25.5 11.1999 24.65 11.6599 23.89L12.8099 21.98C13.0499 21.58 13.2699 20.78 13.2699 20.31V17.42C13.2699 13.7 16.2999 10.67 20.0199 10.67C23.7399 10.67 26.7699 13.7 26.7699 17.42V20.31C26.7699 20.77 26.9899 21.58 27.2299 21.99L28.3699 23.89C28.7999 24.61 28.8799 25.48 28.5899 26.27C28.2999 27.06 27.6699 27.66 26.8799 27.92C24.6799 28.66 22.3499 29.03 20.0199 29.03ZM20.0199 12.17C17.1299 12.17 14.7699 14.52 14.7699 17.42V20.31C14.7699 21.04 14.4699 22.12 14.0999 22.75L12.9499 24.66C12.7299 25.03 12.6699 25.42 12.7999 25.75C12.9199 26.09 13.2199 26.35 13.6299 26.49C17.8099 27.89 22.2399 27.89 26.4199 26.49C26.7799 26.37 27.0599 26.1 27.1899 25.74C27.3199 25.38 27.2899 24.99 27.0899 24.66L25.9399 22.75C25.5599 22.1 25.2699 21.03 25.2699 20.3V17.42C25.2699 14.52 22.9199 12.17 20.0199 12.17Z"
                                fill="#A9A9A9"
                            />
                            <path
                                d="M21.8796 12.4401C21.8096 12.4401 21.7396 12.4301 21.6696 12.4101C21.3796 12.3301 21.0996 12.2701 20.8296 12.2301C19.9796 12.1201 19.1596 12.1801 18.3896 12.4101C18.1096 12.5001 17.8096 12.4101 17.6196 12.2001C17.4296 11.9901 17.3696 11.6901 17.4796 11.4201C17.8896 10.3701 18.8896 9.68005 20.0296 9.68005C21.1696 9.68005 22.1696 10.3601 22.5796 11.4201C22.6796 11.6901 22.6296 11.9901 22.4396 12.2001C22.2896 12.3601 22.0796 12.4401 21.8796 12.4401Z"
                                fill="#A9A9A9"
                            />
                            <path
                                d="M20.0195 31.3101C19.0295 31.3101 18.0695 30.9101 17.3695 30.2101C16.6695 29.5101 16.2695 28.5501 16.2695 27.5601H17.7695C17.7695 28.1501 18.0095 28.7301 18.4295 29.1501C18.8495 29.5701 19.4295 29.8101 20.0195 29.8101C21.2595 29.8101 22.2695 28.8001 22.2695 27.5601H23.7695C23.7695 29.6301 22.0895 31.3101 20.0195 31.3101Z"
                                fill="#A9A9A9"
                            />
                        </svg>
                    </div>
                </div>
            </div>
            <!-- main container header end -->
            <div class="messages-container">
                <!-- inbox container start -->
                <div class="inbox">
                    <div class="inbox-top">
                        <div class="inbox-title">Inbox</div>
                        <div class="search-container">
                            <div class="search-icon">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="25"
                                    height="24"
                                    viewBox="0 0 25 24"
                                    fill="none"
                                >
                                    <ellipse
                                        cx="12.6286"
                                        cy="11.7666"
                                        rx="8.96453"
                                        ry="8.98856"
                                        stroke="#6B7280"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M18.8633 18.4851L22.3779 22"
                                        stroke="#6B7280"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </div>
                            <input placeholder="Search mail..." type="text"/>
                        </div>
                    </div>
                    <div class="general-title-container">
                        <div class="general-title">General</div>
                        <div class="general-title-border"></div>
                    </div>
                    <div class="inbox-messages">
                        <div class="item">
                            <div class="profile-container">
                                <img src="{{ asset('backend/doctor/images/user.png') }}" alt="user"/>
                            </div>
                            <div class="message-container">
                                <div class="message-container-top">
                                    <div class="title">Ryan Durl</div>
                                    <div class="time">7min</div>
                                </div>
                                <div class="text">If the super sale starts</div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="profile-container">
                                <img src="{{ asset('backend/doctor/images/user.png') }}" alt="user"/>
                            </div>
                            <div class="message-container">
                                <div class="message-container-top">
                                    <div class="title">Ryan Durl</div>
                                    <div class="time">7min</div>
                                </div>
                                <div class="text">If the super sale starts</div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="profile-container">
                                <img src="{{ asset('backend/doctor/images/user.png') }}" alt="user"/>
                            </div>
                            <div class="message-container">
                                <div class="message-container-top">
                                    <div class="title">Ryan Durl</div>
                                    <div class="time">7min</div>
                                </div>
                                <div class="text">If the super sale starts</div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="profile-container">
                                <img src="{{ asset('backend/doctor/images/user.png') }}" alt="user"/>
                            </div>
                            <div class="message-container">
                                <div class="message-container-top">
                                    <div class="title">Ryan Durl</div>
                                    <div class="time">7min</div>
                                </div>
                                <div class="text">If the super sale starts</div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="profile-container">
                                <img src="{{ asset('backend/doctor/images/user.png') }}" alt="user"/>
                            </div>
                            <div class="message-container">
                                <div class="message-container-top">
                                    <div class="title">Ryan Durl</div>
                                    <div class="time">7min</div>
                                </div>
                                <div class="text">If the super sale starts</div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="profile-container">
                                <img src="{{ asset('backend/doctor/images/user.png') }}" alt="user"/>
                            </div>
                            <div class="message-container">
                                <div class="message-container-top">
                                    <div class="title">Ryan Durl</div>
                                    <div class="time">7min</div>
                                </div>
                                <div class="text">If the super sale starts</div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="profile-container">
                                <img src="{{ asset('backend/doctor/images/user.png') }}" alt="user"/>
                            </div>
                            <div class="message-container">
                                <div class="message-container-top">
                                    <div class="title">Ryan Durl</div>
                                    <div class="time">7min</div>
                                </div>
                                <div class="text">If the super sale starts</div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="profile-container">
                                <img src="{{ asset('backend/doctor/images/user.png') }}" alt="user"/>
                            </div>
                            <div class="message-container">
                                <div class="message-container-top">
                                    <div class="title">Ryan Durl</div>
                                    <div class="time">7min</div>
                                </div>
                                <div class="text">If the super sale starts</div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="profile-container">
                                <img src="{{ asset('backend/doctor/images/user.png') }}" alt="user"/>
                            </div>
                            <div class="message-container">
                                <div class="message-container-top">
                                    <div class="title">Ryan Durl</div>
                                    <div class="time">7min</div>
                                </div>
                                <div class="text">If the super sale starts</div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="profile-container">
                                <img src="{{ asset('backend/doctor/images/user.png') }}" alt="user"/>
                            </div>
                            <div class="message-container">
                                <div class="message-container-top">
                                    <div class="title">Ryan Durl</div>
                                    <div class="time">7min</div>
                                </div>
                                <div class="text">If the super sale starts</div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="profile-container">
                                <img src="{{ asset('backend/doctor/images/user.png') }}" alt="user"/>
                            </div>
                            <div class="message-container">
                                <div class="message-container-top">
                                    <div class="title">Ryan Durl</div>
                                    <div class="time">7min</div>
                                </div>
                                <div class="text">If the super sale starts</div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="profile-container">
                                <img src="{{ asset('backend/doctor/images/user.png') }}" alt="user"/>
                            </div>
                            <div class="message-container">
                                <div class="message-container-top">
                                    <div class="title">Ryan Durl</div>
                                    <div class="time">7min</div>
                                </div>
                                <div class="text">If the super sale starts</div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="profile-container">
                                <img src="{{ asset('backend/doctor/images/user.png') }}" alt="user"/>
                            </div>
                            <div class="message-container">
                                <div class="message-container-top">
                                    <div class="title">Ryan Durl</div>
                                    <div class="time">7min</div>
                                </div>
                                <div class="text">If the super sale starts</div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="profile-container">
                                <img src="{{ asset('backend/doctor/images/user.png') }}" alt="user"/>
                            </div>
                            <div class="message-container">
                                <div class="message-container-top">
                                    <div class="title">Ryan Durl</div>
                                    <div class="time">7min</div>
                                </div>
                                <div class="text">If the super sale starts</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- inbox container end -->

                <!-- indevidual user messages start -->
                <div id="user-messages" class="user-messages">
                    <div class="user-title">
                <span>
                  Nashville
                </span>
                        <div class="d-flex align-item-center gap-2 ">
                            <svg class="back-to-inbox-btn" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none">
                                <path d="M19 12H5M5 12L11 18M5 12L11 6" stroke="#121715" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <svg id="three-dots" width="24px" height="22px" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 128 512">
                                <path
                                    d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="individual-messages">
                        <div class="single-message opposite-message">
                            <div class="user-profile">
                                <img src="{{ asset('backend/doctor/images/user.png') }}" alt="user"/>
                            </div>
                            <div class="right-content">
                                <div class="user-name">John Doe</div>
                                <div class="user-text">
                                    <div class="text">
                                        Hello NCP, <br/>
                                        Please give me some time to thoroughly check the item
                                        you are referring to. I need a few minutes to review it
                                        carefully. I'll get back to you shortly with more
                                        information. Thank you for your patience.
                                    </div>
                                    <div class="time">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            viewBox="0 0 16 16"
                                            fill="none"
                                        >
                                            <g clip-path="url(#clip0_248_163)">
                                                <path
                                                    d="M9.25 5.25L3.75 10.75L1 8"
                                                    stroke="#F8CF2C"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M14.9996 5.25L9.49961 10.75L8.03711 9.2875"
                                                    stroke="#F8CF2C"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_248_163">
                                                    <rect width="16" height="16" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <span>11.43 AM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-message my-message">
                            <div class="right-content">
                                <div class="user-name">John Doe</div>
                                <div class="user-text">
                                    <div class="text">
                                        Hello NCP, <br/>
                                        Please give me some time to thoroughly check the item
                                        you are referring to. I need a few minutes to review it
                                        carefully. I'll get back to you shortly with more
                                        information. Thank you for your patience.
                                    </div>
                                    <div class="time">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            viewBox="0 0 16 16"
                                            fill="none"
                                        >
                                            <g clip-path="url(#clip0_248_163)">
                                                <path
                                                    d="M9.25 5.25L3.75 10.75L1 8"
                                                    stroke="#F8CF2C"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M14.9996 5.25L9.49961 10.75L8.03711 9.2875"
                                                    stroke="#F8CF2C"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_248_163">
                                                    <rect width="16" height="16" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <span>11.43 AM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="user-profile">
                                <img src="{{ asset('backend/doctor/images/user.png') }}" alt="user"/>
                            </div>
                        </div>

                        <div class="single-message opposite-message">
                            <div class="user-profile">
                                <img src="{{ asset('backend/doctor/images/user.png') }}" alt="user"/>
                            </div>
                            <div class="right-content">
                                <div class="user-name">John Doe</div>
                                <div class="user-text">
                                    <div class="text">Hello NCP,</div>
                                    <div class="time">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            viewBox="0 0 16 16"
                                            fill="none"
                                        >
                                            <g clip-path="url(#clip0_248_163)">
                                                <path
                                                    d="M9.25 5.25L3.75 10.75L1 8"
                                                    stroke="#F8CF2C"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M14.9996 5.25L9.49961 10.75L8.03711 9.2875"
                                                    stroke="#F8CF2C"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_248_163">
                                                    <rect width="16" height="16" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <span>11.43 AM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-message my-message">
                            <div class="right-content">
                                <div class="user-name">John Doe</div>
                                <div class="user-text">
                                    <div class="text">
                                        Hello NCP, <br/>
                                        Please give me some time to thoroughly check the item
                                        you are referring to. I need a few minutes to review it
                                        carefully. I'll get back to you shortly with more
                                        information. Thank you for your patience.
                                    </div>
                                    <div class="time">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            viewBox="0 0 16 16"
                                            fill="none"
                                        >
                                            <g clip-path="url(#clip0_248_163)">
                                                <path
                                                    d="M9.25 5.25L3.75 10.75L1 8"
                                                    stroke="#F8CF2C"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M14.9996 5.25L9.49961 10.75L8.03711 9.2875"
                                                    stroke="#F8CF2C"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_248_163">
                                                    <rect width="16" height="16" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <span>11.43 AM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="user-profile">
                                <img src="{{ asset('backend/doctor/images/user.png') }}" alt="user"/>
                            </div>
                        </div>
                        <div class="single-message opposite-message">
                            <div class="user-profile">
                                <img src="{{ asset('backend/doctor/images/user.png') }}" alt="user"/>
                            </div>
                            <div class="right-content">
                                <div class="user-name">John Doe</div>
                                <div class="user-text">
                                    <div class="text">
                                        Hello NCP, <br/>
                                        Please give me some time to thoroughly check the item
                                        you are referring to. I need a few minutes to review it
                                        carefully. I'll get back to you shortly with more
                                        information. Thank you for your patience.
                                    </div>
                                    <div class="time">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            viewBox="0 0 16 16"
                                            fill="none"
                                        >
                                            <g clip-path="url(#clip0_248_163)">
                                                <path
                                                    d="M9.25 5.25L3.75 10.75L1 8"
                                                    stroke="#F8CF2C"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M14.9996 5.25L9.49961 10.75L8.03711 9.2875"
                                                    stroke="#F8CF2C"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_248_163">
                                                    <rect width="16" height="16" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <span>11.43 AM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-message my-message">
                            <div class="right-content">
                                <div class="user-name">John Doe</div>
                                <div class="user-text">
                                    <div class="text">Lorem ipsum dolor sit amet</div>
                                    <div class="time">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            viewBox="0 0 16 16"
                                            fill="none"
                                        >
                                            <g clip-path="url(#clip0_248_163)">
                                                <path
                                                    d="M9.25 5.25L3.75 10.75L1 8"
                                                    stroke="#F8CF2C"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M14.9996 5.25L9.49961 10.75L8.03711 9.2875"
                                                    stroke="#F8CF2C"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_248_163">
                                                    <rect width="16" height="16" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <span>11.43 AM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="user-profile">
                                <img src="{{ asset('backend/doctor/images/user.png') }}" alt="user"/>
                            </div>
                        </div>
                        <div class="single-message opposite-message">
                            <div class="user-profile">
                                <img src="{{ asset('backend/doctor/images/user.png') }}" alt="user"/>
                            </div>
                            <div class="right-content">
                                <div class="user-name">John Doe</div>
                                <div class="user-text">
                                    <div class="text">
                                        Hello NCP, <br/>
                                        Please give me some time to thoroughly check the item
                                        you are referring to. I need a few minutes to review it
                                        carefully. I'll get back to you shortly with more
                                        information. Thank you for your patience.
                                    </div>
                                    <div class="time">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            viewBox="0 0 16 16"
                                            fill="none"
                                        >
                                            <g clip-path="url(#clip0_248_163)">
                                                <path
                                                    d="M9.25 5.25L3.75 10.75L1 8"
                                                    stroke="#F8CF2C"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M14.9996 5.25L9.49961 10.75L8.03711 9.2875"
                                                    stroke="#F8CF2C"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_248_163">
                                                    <rect width="16" height="16" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <span>11.43 AM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-message my-message">
                            <div class="right-content">
                                <div class="user-name">John Doe</div>
                                <div class="user-text">
                                    <div class="text">
                                        Hello NCP, <br/>
                                        Please give me some time to thoroughly check the item
                                        you are referring to. I need a few minutes to review it
                                        carefully. I'll get back to you shortly with more
                                        information. Thank you for your patience.
                                    </div>
                                    <div class="time">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            viewBox="0 0 16 16"
                                            fill="none"
                                        >
                                            <g clip-path="url(#clip0_248_163)">
                                                <path
                                                    d="M9.25 5.25L3.75 10.75L1 8"
                                                    stroke="#F8CF2C"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M14.9996 5.25L9.49961 10.75L8.03711 9.2875"
                                                    stroke="#F8CF2C"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_248_163">
                                                    <rect width="16" height="16" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <span>11.43 AM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="user-profile">
                                <img src="{{ asset('backend/doctor/images/user.png') }}" alt="user"/>
                            </div>
                        </div>
                        <div class="single-message opposite-message">
                            <div class="user-profile">
                                <img src="{{ asset('backend/doctor/images/user.png') }}" alt="user"/>
                            </div>
                            <div class="right-content">
                                <div class="user-name">John Doe</div>
                                <div class="user-text">
                                    <div class="text">
                                        Hello NCP, <br/>
                                        Please give me some time to thoroughly check the item
                                        you are referring to. I need a few minutes to review it
                                        carefully. I'll get back to you shortly with more
                                        information. Thank you for your patience.
                                    </div>
                                    <div class="time">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            viewBox="0 0 16 16"
                                            fill="none"
                                        >
                                            <g clip-path="url(#clip0_248_163)">
                                                <path
                                                    d="M9.25 5.25L3.75 10.75L1 8"
                                                    stroke="#F8CF2C"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M14.9996 5.25L9.49961 10.75L8.03711 9.2875"
                                                    stroke="#F8CF2C"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_248_163">
                                                    <rect width="16" height="16" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <span>11.43 AM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-message my-message">
                            <div class="right-content">
                                <div class="user-name">John Doe</div>
                                <div class="user-text">
                                    <div class="text">
                                        Hello NCP, <br/>
                                        Please give me some time to thoroughly check the item
                                        you are referring to. I need a few minutes to review it
                                        carefully. I'll get back to you shortly with more
                                        information. Thank you for your patience.
                                    </div>
                                    <div class="time">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            viewBox="0 0 16 16"
                                            fill="none"
                                        >
                                            <g clip-path="url(#clip0_248_163)">
                                                <path
                                                    d="M9.25 5.25L3.75 10.75L1 8"
                                                    stroke="#F8CF2C"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                                <path
                                                    d="M14.9996 5.25L9.49961 10.75L8.03711 9.2875"
                                                    stroke="#F8CF2C"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_248_163">
                                                    <rect width="16" height="16" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <span>11.43 AM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="user-profile">
                                <img src="{{ asset('backend/doctor/images/user.png') }}" alt="user"/>
                            </div>
                        </div>
                    </div>
                    <div class="reply-input-container">
                        <div>
                  <textarea
                      placeholder="Type a message"
                      name=""
                      id=""
                  ></textarea>
                        </div>
                        <div class="actions">
                            <div class="add-file-btn">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 16 16"
                                    fill="none"
                                >
                                    <path
                                        d="M8 4V12M12 8L4 8"
                                        stroke="#6B7280"
                                        stroke-width="1.33333"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>

                            </div>
                            <input type="file" class="d-none" name="" id="add-file-input">
                            <a href="" class="send-btn">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 16 16"
                                    fill="none"
                                >
                                    <g clip-path="url(#clip0_248_391)">
                                        <path
                                            d="M13.963 7.12523L3.43173 1.23148C3.25625 1.12915 3.05419 1.08162 2.8515 1.09498C2.64881 1.10835 2.45475 1.182 2.29423 1.30648C2.13029 1.43582 2.01127 1.61352 1.95405 1.81434C1.89683 2.01516 1.90433 2.22891 1.97548 2.42523L3.73173 7.33148C3.74949 7.3804 3.78173 7.42275 3.82416 7.45289C3.86659 7.48304 3.91719 7.49955 3.96923 7.50023H8.48173C8.61147 7.49817 8.73717 7.54541 8.83345 7.63241C8.92972 7.71941 8.98942 7.83969 9.00048 7.96898C9.00475 8.03722 8.99498 8.10561 8.97178 8.16993C8.94857 8.23425 8.91242 8.29312 8.86556 8.34291C8.81869 8.3927 8.76212 8.43235 8.69932 8.45941C8.63653 8.48647 8.56885 8.50036 8.50048 8.50023H3.96923C3.91719 8.50091 3.86659 8.51742 3.82416 8.54757C3.78173 8.57771 3.74949 8.62006 3.73173 8.66898L1.97548 13.5752C1.92278 13.7264 1.9069 13.8879 1.92916 14.0464C1.95142 14.2049 2.01117 14.3559 2.10345 14.4866C2.19574 14.6174 2.31789 14.7243 2.45977 14.7984C2.60165 14.8725 2.75916 14.9117 2.91923 14.9127C3.08956 14.912 3.25704 14.869 3.40673 14.7877L13.963 8.87523C14.1176 8.7874 14.2462 8.66016 14.3357 8.50645C14.4252 8.35275 14.4723 8.17808 14.4723 8.00023C14.4723 7.82238 14.4252 7.64771 14.3357 7.494C14.2462 7.3403 14.1176 7.21305 13.963 7.12523Z"
                                            fill="white"
                                        />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_248_391">
                                            <rect width="16" height="16" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- iindevidual user messages end -->

            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        var options = {
            series: [45, 35, 20], // Values for Excellent, Good, and Poor
            chart: {
                type: "donut",
            },
            labels: ["Excellent", "Good", "Poor"], // Labels for each segment
            colors: ["#187586", "#36B37E", "#FFAB00"],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200,
                    },
                    legend: {
                        position: "bottom",
                    },
                },
            },],
        };

        var chart = new ApexCharts(
            document.querySelector("#donut-chart"),
            options
        );
        chart.render();
    </script>

    <script>
        // Sample data for Visitors per Month
        var visitorData = {
            months: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            visitors: [120, 210, 180, 300, 250, 320, 400, 380, 450, 430, 500, 520],
        };

        var options = {
            series: [{
                name: "Visitors",
                data: visitorData.visitors,
            },],
            chart: {
                type: "area",
                height: "320px",
                zoom: {
                    enabled: false,
                },
                toolbar: {
                    show: false,
                },
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: "smooth",
                colors: ["rgb(24, 117, 134)"],
            },
            fill: {
                type: "gradient",
                gradient: {
                    shade: "light",
                    type: "vertical",
                    shadeIntensity: 0.5,
                    gradientToColors: ["#187586"],
                    opacityFrom: 0.8,
                    opacityTo: 0.2,
                    stops: [0, 100],
                },
            },
            xaxis: {
                categories: visitorData.months, // Set the x-axis categories to month abbreviations
            },
            yaxis: {
                opposite: false, // Set to false to move Y-axis to the left side
                title: {
                    text: "",
                },
            },
            legend: {
                horizontalAlign: "left",
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endpush
