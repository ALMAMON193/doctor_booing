<!-- mobile header -->
<div class="mobile-header d-flex align-items-center justify-content-between p-4 d-none">
    <a href="" class="mobile-logo">
        <img src="{{ asset($settings->logo ?? 'frontend/assets/images/logo.png') }}" alt="logo">
    </a>
    <div class="mobile-menu">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none">
            <path d="M3 7H21" stroke stroke-width="1.5" stroke-linecap="round" />
            <path d="M3 12H21" stroke stroke-width="1.5" stroke-linecap="round" />
            <path d="M3 17H21" stroke stroke-width="1.5" stroke-linecap="round" />
        </svg>
    </div>
</div>
<!-- mobile header -->
<!-- header area starts -->
<header>
    <div class="header-main d-flex justify-content-between container">
        <a href="" class="logo-area">
            <img src="{{ asset($settings->logo ?? 'frontend/assets/images/logo.png') }}" alt="Logo" srcset>
            <span class="close-sidebar-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 384 512">
                    <path
                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                </svg>
            </span>
        </a>
        <div class="header-menu-area d-flex align-items-center">
            <ul class="menu d-flex align-items-center justify-content-between list-unstyled">
                <li><a href="{{ route('home') }}" class="text-decoration-none tm-active-menu">Home</a></li>
                <li><a href="{{ route('about') }}" class="text-decoration-none">About Us</a></li>
                <li><a href="{{ route('service') }}" class="text-decoration-none">Service</a></li>
                <li><a href="{{ route('ourPsychologist') }}" class="text-decoration-none">Our Psychologist</a></li>
        
                @auth
                    @if (auth()->user()->role === 'admin')
                        <li><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Appointment</a></li>
                    @elseif (auth()->user()->role === 'client')
                        <li><a href="{{ route('client.appointment.appointments') }}" class="text-decoration-none">Appointment</a></li>
                    @elseif (auth()->user()->role === 'doctor')
                        <li><a href="{{ route('doctor.appointment.appointments') }}" class="text-decoration-none">Appointment</a></li>
                    @endif
                @endauth
        
                <li>
                    @guest
                        <a href="{{ route('account.type') }}" class="text-decoration-none">Become A Psychologist</a>
                    @endguest
                </li>
            </ul>
        
            @auth
                <a href="{{ route(auth()->user()->role . '.dashboard') }}" class="nav-btn">Dashboard</a>
            @endauth
        
            @guest
                <a href="{{ route('login') }}" class="nav-btn">Get Started</a>
            @endguest
        </div>
        
    </div>
</header>
