<!--APP-SIDEBAR-->
<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ route('admin.dashboard') }}">
                <img src="{{ asset($settings->logo ?? 'default/logo.png') }}" class="header-brand-img desktop-logo"
                    alt="logo">
                <img src="{{ asset($settings->logo ?? 'default/logo.png') }}" class="header-brand-img toggle-logo"
                    alt="logo">
                <img src="{{ asset($settings->logo ?? 'default/logo.png') }}" class="header-brand-img light-logo"
                    alt="logo">
                <img src="{{ asset($settings->logo ?? 'default/logo.png') }}" class="header-brand-img light-logo1"
                    alt="logo">
            </a>
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg>
            </div>
            <ul class="side-menu mt-2">
                <li>
                    <h3>Menu</h3>
                </li>

                <!-- Dashboard -->
                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('admin.dashboard') ? 'has-link' : '' }}"
                        href="{{ route('admin.dashboard') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"
                            enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                            <path
                                d="M19.9794922,7.9521484l-6-5.2666016c-1.1339111-0.9902344-2.8250732-0.9902344-3.9589844,0l-6,5.2666016C3.3717041,8.5219116,2.9998169,9.3435669,3,10.2069702V19c0.0018311,1.6561279,1.3438721,2.9981689,3,3h2.5h7c0.0001831,0,0.0003662,0,0.0006104,0H18c1.6561279-0.0018311,2.9981689-1.3438721,3-3v-8.7930298C21.0001831,9.3435669,20.6282959,8.5219116,19.9794922,7.9521484z M15,21H9v-6c0.0014038-1.1040039,0.8959961-1.9985962,2-2h2c1.1040039,0.0014038,1.9985962,0.8959961,2,2V21z M20,19c-0.0014038,1.1040039-0.8959961,1.9985962-2,2h-2v-6c-0.0018311-1.6561279-1.3438721-2.9981689-3-3h-2c-1.6561279,0.0018311-2.9981689,1.3438721-3,3v6H6c-1.1040039-0.0014038-1.9985962-0.8959961-2-2v-8.7930298C3.9997559,9.6313477,4.2478027,9.0836182,4.6806641,8.7041016l6-5.2666016C11.0455933,3.1174927,11.5146484,2.9414673,12,2.9423828c0.4853516-0.0009155,0.9544067,0.1751099,1.3193359,0.4951172l6,5.2665405C19.7521973,9.0835571,20.0002441,9.6313477,20,10.2069702V19z" />
                        </svg>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>
                <!-- Doctors -->
                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('admin.doctor.index') ? 'has-link' : '' }}"
                        href="{{ route('admin.doctor.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"
                            enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                            <path
                                d="M17.5,13c-3.0375366,0-5.5,2.4624634-5.5,5.5s2.4624634,5.5,5.5,5.5s5.5-2.4624634,5.5-5.5S20.5375366,13,17.5,13z M20,19h-2v2c0,0.276123-0.223877,0.5-0.5,0.5S17,21.276123,17,21v-2h-2c-0.276123,0-0.5-0.223877-0.5-0.5s0.223877-0.5,0.5-0.5h2v-2c0-0.276123,0.223877-0.5,0.5-0.5s0.5,0.223877,0.5,0.5v2h2c0.276123,0,0.5,0.223877,0.5,0.5S20.276123,19,20,19z M12,14c0.0014038-1.1040039,0.8959961-1.9985962,2-2h2c1.1040039,0.0014038,1.9985962,0.8959961,2,2v1.0490112C16.9194946,14.3665161,16.0409546,14,15,14h-2c-0.3682251,0-0.6781006,0.2901611-0.6921387,0.6678467C12.1038208,14.4487915,12.0014648,14.2241211,12,14z M8,14v6c0.0014038,1.1040039,0.8959961,1.9985962,2,2h2.0587769C11.2093506,20.6871338,11,19.1311646,11,17.5c0-0.17215,0.0195312-0.3397217,0.0297852-0.5092773C11.0195312,16.8397217,11,16.67215,11,16.5c0-2.2803345,1.2810669-4.2570801,3.1589355-5.2682495C14.0316162,11.0892944,13.9983521,11,13.949707,11H13c-0.5523071,0-1-0.4476929-1-1s0.4476929-1,1-1h1c1.6568604,0,3-1.3431396,3-3V4.5c0-0.8284302-0.6715698-1.5-1.5-1.5S14,3.6715698,14,4.5V5c0,0.5523071-0.4476929,1-1,1s-1-0.4476929-1-1V3c0-1.6568604-1.3431396-3-3-3S6,1.3431396,6,3v8.5351562C6.0001831,11.6441650,5.9251709,11.7423706,5.8154297,11.7939453C4.6553955,12.3492432,3.8757324,13.5686035,4.0333252,14.8568115C4.1909790,16.1450195,5.2880859,17.0770874,6.5891113,17.0158691C6.6561890,17.0106812,6.7229614,17.0065918,6.7897949,17.0024414C6.9312134,16.9929199,7.0771484,17.0050659,7.2089844,17.0670166C7.3408203,17.1289673,7.4482422,17.2285767,7.5185547,17.3525391C7.8066406,17.8583374,7.9990234,18.4127808,8,18.9669189V20c-0.0018311,1.6561279-1.3438721,2.9981689-3,3H3c-1.6561279-0.0018311-2.9981689-1.3438721-3-3v-8.7930298C-0.0001831,10.3435669,0.3717041,9.5219116,1.0205078,8.9521484l6-5.2666016C8.1544189,2.6953125,9.8455811,2.6953125,11.0205078,3.6855469l4.1976318,3.6823120C15.7250366,7.7164307,16.0706177,8.2503052,16,8.805542C15.9293823,9.3607788,15.4711304,9.7798462,14.9130859,9.8002930C14.9085693,9.8003540,14.9040527,9.8003540,14.8995361,9.8002930H13c-0.7859497,0.0026855-1.5711060,0.1837158-2.2885742,0.5307617C9.9111328,10.7243652,9.3150024,11.3426514,9,12.0703125V7.7930298C9.0001831,7.6840210,8.9251709,7.5858154,8.8154297,7.5342407l-2-1C6.6981201,6.4719238,6.5051270,6.4902344,6.3671875,6.5947266S6.1640625,6.8382568,6.1796875,7.0009766L6.5019531,10H5c-0.5523071,0-1,0.4476929-1,1s0.4476929,1,1,1h1.5566406C7.7147217,12.5135498,8.2829590,13.4678345,9.0676270,14.1738281C8.4443359,14.0587769,8,13.5540161,8,13V14z" />
                        </svg>
                        <span class="side-menu__label">Psychologists</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('admin.blog.index') ? 'has-link' : '' }}"
                        href="{{ route('admin.blog.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path
                                d="M19,2H5C3.3438721,2.0018311,2.0018311,3.3438721,2,5v10c0.0018311,1.6561279,1.3438721,2.9981689,3,3h2v4c0,0.0001831,0,0.0003662,0,0.0005493C7.0001831,22.2765503,7.223999,22.5001831,7.5,22.5C7.6312256,22.4998169,7.7578125,22.4486084,7.8535156,22.3535156L11.707,18.5H19c1.6561279-0.0018311,2.9981689-1.3438721,3-3V5C21.9981689,3.3438721,20.6561279,2.0018311,19,2z" />
                        </svg>
                        <span class="side-menu__label">Blog</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('admin.psychology.session.index') ? 'has-link' : '' }}"
                        href="{{ route('admin.psychology.session.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path
                                d="M19,2H5C3.3438721,2.0018311,2.0018311,3.3438721,2,5v10c0.0018311,1.6561279,1.3438721,2.9981689,3,3h2v4c0,0.0001831,0,0.0003662,0,0.0005493C7.0001831,22.2765503,7.223999,22.5001831,7.5,22.5C7.6312256,22.4998169,7.7578125,22.4486084,7.8535156,22.3535156L11.707,18.5H19c1.6561279-0.0018311,2.9981689-1.3438721,3-3V5C21.9981689,3.3438721,20.6561279,2.0018311,19,2z" />
                        </svg>
                        <span class="side-menu__label">Session</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item {{ request()->routeIs('admin.faq.index') ? 'has-link' : '' }}"
                        href="{{ route('admin.faq.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"
                            enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                            <path
                                d="M19.9794922,7.9521484l-6-5.2666016c-1.1339111-0.9902344-2.8250732-0.9902344-3.9589844,0l-6,5.2666016C3.3717041,8.5219116,2.9998169,9.3435669,3,10.2069702V19c0.0018311,1.6561279,1.3438721,2.9981689,3,3h2.5h7c0.0001831,0,0.0003662,0,0.0006104,0H18c1.6561279-0.0018311,2.9981689-1.3438721,3-3v-8.7930298C21.0001831,9.3435669,20.6282959,8.5219116,19.9794922,7.9521484z M15,21H9v-6c0.0014038-1.1040039,0.8959961-1.9985962,2-2h2c1.1040039,0.0014038,1.9985962,0.8959961,2,2V21z M20,19c-0.0014038,1.1040039-0.8959961,1.9985962-2,2h-2v-6c-0.0018311-1.6561279-1.3438721-2.9981689-3-3h-2c-1.6561279,0.0018311-2.9981689,1.3438721-3,3v6H6c-1.1040039-0.0014038-1.9985962-0.8959961-2-2v-8.7930298C3.9997559,9.6313477,4.2478027,9.0836182,4.6806641,8.7041016l6-5.2666016C11.0455933,3.1174927,11.5146484,2.9414673,12,2.9423828c0.4853516-0.0009155,0.9544067,0.1751099,1.3193359,0.4951172l6,5.2665405C19.7521973,9.0835571,20.0002441,9.6313477,20,10.2069702V19z" />
                        </svg>
                        <span class="side-menu__label">FAQ</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="side-menu__icon" viewBox="0 0 16 16">
                            <path
                                d="M7.5 5.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L6 7l-.549.317a.5.5 0 1 0 .5.866l.549-.317V8.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L8 7l.549-.317a.5.5 0 1 0-.5-.866l-.549.317zm-2 4.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z" />
                            <path
                                d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                        </svg>
                        <span class="side-menu__label">CMS</span><i class="angle fa fa-angle-right"></i>
                    </a>

                    <ul class="slide-menu">
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="#">
                                <span class="sub-side-menu__label">Home</span>
                                <i class="sub-angle fa fa-angle-right"></i>
                            </a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item"
                                        href="{{ route('admin.cms.home.banner.index') }}">Banner</a></li>
                                <li><a class="sub-slide-item"
                                        href="{{ route('admin.cms.home.service.index') }}">About US</a></li>
                                <li><a class="sub-slide-item"
                                        href="{{ route('admin.cms.home.psychologists.index')
                                        }}">Client Psychologists</a></li>
                                <li><a class="sub-slide-item"
                                       href="{{ route('admin.cms.home.psychologist.index')
                                        }}">For Psychologist</a></li>
                                <li><a class="sub-slide-item"
                                        href="{{ route('admin.cms.home.rebates.index') }}">Rebates</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="slide-menu">
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="#">
                                <span class="sub-side-menu__label">Service</span>
                                <i class="sub-angle fa fa-angle-right"></i>
                            </a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item"
                                        href="{{ route('admin.cms.service.individualTherapy.index') }}">Individual Therapy</a></li>
                                <li><a class="sub-slide-item"
                                        href="{{ route('admin.cms.service.benefitsTherapy.index') }}">Benefits Individual Therapy</a></li>
                                <li><a class="sub-slide-item"
                                        href="{{ route('admin.cms.service.whatToExpect.index') }}">What To Expect</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="slide-menu">
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="#">
                                <span class="sub-side-menu__label">Our Psychologists</span>
                                <i class="sub-angle fa fa-angle-right"></i>
                            </a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item"
                                        href="{{ route('admin.cms.ourPsychologists.meetWithTeam.index') }}">Meet With Our Team Static</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="slide-menu">
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="{{ route('admin.aboutUs.index') }}">
                                <span class="sub-side-menu__label">About Us</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 512 512">
                            <path
                                d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
                        </svg>
                        <span class="side-menu__label">Settings</span><i class="angle fa fa-angle-right"></i>
                    </a>

                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.setting.general.index') }}" class="slide-item">General
                                Settings</a></li>
                        <li><a href="{{ route('admin.setting.profile.index') }}" class="slide-item">Profile
                                Settings</a></li>
                        <li><a href="{{ route('admin.setting.mail.index') }}" class="slide-item">Mail Settings</a></li>
                        <li><a href="{{ route('admin.setting.social.index') }}" class="slide-item">Social Media Settings</a></li>

                        <li><a href="{{ route('admin.setting.dynamic.index') }}" class="slide-item">Dynamic Pages</a>
                        </li>
                        <li><a href="{{ route('admin.stripe.setting.index') }}" class="slide-item">Stripe Settings
                                </a>
                        </li>

                    </ul>
                </li>
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg>
            </div>
        </div>
    </div>
</div>
<!--/APP-SIDEBAR-->
