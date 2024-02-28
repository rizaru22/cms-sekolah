<style>
    /* Gaya default untuk navbar kedua */
    .nav-2 {
        position: -webkit-sticky;
        /* Safari */
        position: sticky;
        /* Standar */
        top: 70px;
        /* Posisi awal ketika halaman dimuat */
        z-index: 1000;
        /* Sesuaikan nilai z-indeks sesuai kebutuhan */
        
    }

    /* Ubah properti top menjadi 0 saat halaman digulir */
    .nav-2.scrolled {
        top: 0;
    }
    
</style>
<header class="navbar navbar-expand-md navbar-light d-print-none" style="background-color: #0C356A;">
    <div class="container-xl py-2">
        <!-- logo -->
        <div class="d-flex align-items-center">
            <img src="{{ asset('storage/' . $schoolProfile->logo) }}" class="bg-transparent avatar me-2" alt="SMK Negeri 1 Karang Baru Logo (Tut Wuri Handayani)" width="450" height="350">
            <div>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal p-0 pe-0 pe-md-3 text-uppercase">
                    <a href="{{ route('home.index') }}" style="color: #ffffff;">
                        SMKN 1 Karang Baru
                    </a>
                </h1>
                <p class="d-none d-md-block fw-normal fs-5 m-0" style="color: #ffffff;">{{ $schoolProfile->address }}</p>
            </div>
        </div>
        <!-- end logo -->

        <!-- right section in first navbar -->
        <div class="navbar-nav flex-row order-md-last flex-fill align-items-center justify-content-end">
            <div class="me-3">
                <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                    </svg>
                </a>
                <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="12" r="4" />
                        <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                    </svg>
                </a>
            </div>
        </div>
        <!-- end right section in first navbar -->

        <!-- hamburger menu -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- end humburger menu -->
    </div>
</header>

<!-- second navbar -->
<div class="navbar-expand-md nav-2">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light custom-navbar" style="box-shadow: 0px 5px 9px rgba(0, 0, 0, 0.4);">
            <div class="container-xl">
                <ul class="navbar-nav">

                    <li class="nav-item {{ request()->routeIs('home.*') ? 'active' : '' }}">
                        <a class="nav-link py-3 py-md-0" href="{{ route('home.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title" style="font-size: large;">
                                Beranda
                            </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown {{ (request()->routeIs('school-profile.*') || request()->routeIs('sejarah-sekolah.*') || request()->routeIs('visi-misi.*')) ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                                    <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                                </svg>
                            </span>
                            <span class="nav-link-title" style="font-size: large;">
                                Profil
                            </span>
                        </a>
                        <div class="dropdown-menu {{ (request()->routeIs('school-profile.*') || request()->routeIs('sejarah-sekolah.*') || request()->routeIs('visi-misi.*')) ? 'active' : '' }}">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column" style="font-size: large;">
                                    <a class="dropdown-item {{ request()->routeIs('school-profile.*') ? 'active' : '' }}" href="{{ route('school-profile.index') }}">
                                        Profil Sekolah
                                    </a>
                                </div>
                            </div>
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column" style="font-size: large;">
                                    <a class="dropdown-item {{ request()->routeIs('sejarah-sekolah.*') ? 'active' : '' }}" href="{{ route('sejarah-sekolah.index') }}">
                                        Sejarah Sekolah
                                    </a>
                                </div>
                            </div>
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column" style="font-size: large;">
                                    <a class="dropdown-item {{ request()->routeIs('visi-misi.*') ? 'active' : '' }}" href="{{ route('visi-misi.index') }}">
                                        Visi Misi
                                    </a>
                                </div>
                            </div>
                        </div>

                    </li>
                    <li class="nav-item dropdown {{ request()->routeIs('majors.*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M17.8 19.817l-2.172 1.138a0.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a0.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a0.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a0.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a0.39 .39 0 0 1 -.567 .411l-2.172 -1.138z" />
                                    <path d="M6.2 19.817l-2.172 1.138a0.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a0.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a0.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a0.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a0.39 .39 0 0 1 -.567 .411l-2.172 -1.138z" />
                                    <path d="M12 9.817l-2.172 1.138a0.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a0.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a0.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a0.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a0.39 .39 0 0 1 -.567 .411l-2.172 -1.138z" />
                                </svg>
                            </span>
                            <span class="nav-link-title" style="font-size: large;">
                                Kompetensi Keahlian
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    @foreach($majors as $major)
                                    <a class="dropdown-item" href="{{ route('majors.show',  $major->slug) }}">
                                        {{ $major->name }}
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </li>


                    <!-- 1. tambahkan halaman pages detail -->
                    <!-- 2. fix routeIs() dibawah ini dan juga tambahkan routeIs -->
                    @foreach($menus as $menu)
                    @if( $menu->pages->isNotEmpty())
                    @if(count($menu->pages) === 1)
                    <li class="nav-item">
                        <a class="nav-link py-3 py-md-0" href="/pages/{{ $menu->pages[0]->slug }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                @if($menu->icon)
                                {!! $menu->icon !!}
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <rect x="4" y="4" width="6" height="5" rx="2" />
                                    <rect x="4" y="13" width="6" height="7" rx="2" />
                                    <rect x="14" y="4" width="6" height="16" rx="2" />
                                </svg>
                                @endif
                            </span>
                            <span class="nav-link-title">
                                {{ $menu->pages[0]->title }}
                            </span>
                        </a>
                    </li>
                    @else
                    <li class="nav-item dropdown {{ request()->routeIs('pages.*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                @if($menu->icon)
                                {!! $menu->icon !!}
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <rect x="4" y="4" width="6" height="5" rx="2" />
                                    <rect x="4" y="13" width="6" height="7" rx="2" />
                                    <rect x="14" y="4" width="6" height="16" rx="2" />
                                </svg>
                                @endif
                            </span>
                            <span class="nav-link-title" style="font-size: large;">
                                {{ $menu->name }}
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    @foreach($menu->pages as $page)
                                    <a class="dropdown-item" href="/pages/{{ $page->slug }}">
                                        {{ $page->title }}
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </li>
                    @endif
                    @endif
                    @endforeach
                    
                    <li class="nav-item {{ request()->routeIs('prestasi.*') ? 'active' : '' }}">
                        <a class="nav-link py-3 py-md-0" href="{{ route('prestasi.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><defs><style>.a{fill:none;stroke:#000000;stroke-linecap:round;stroke-linejoin:round;}</style></defs><path class="a" d="M13.3855,4.5H34.495L23.94,27.241Z"></path><path class="a" d="M40.3158,4.5,23.94,43.5,7.6842,4.5"></path></g></svg>
                            </span>
                            <span class="nav-link-title" style="font-size: large;">
                                Prestasi
                            </span>
                        </a>
                    </li>

                </ul>
                <!-- right side of second navbar -->
                <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                    <div class="btn-list">
                        @auth
                        <a href="{{ route('dashboard.index') }}" class="btn btn-primary w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="12" cy="13" r="2" />
                                <line x1="13.45" y1="11.55" x2="15.5" y2="9.5" />
                                <path d="M6.4 20a9 9 0 1 1 11.2 0z" />
                            </svg>
                            Dashboard
                        </a>
                        @else
                        <a href="{{ route('signIn') }}" class="btn btn-primary w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                <path d="M20 12h-13l3 -3m0 6l-3 -3" />
                            </svg>
                            Sign in
                        </a>
                        @endauth
                    </div>
                </div>
                <!-- end right side of second navbar -->

            </div>
        </div>
    </div>
</div>
<!-- end second navbar -->
<script>
    // JavaScript untuk menambahkan dan menghapus kelas "scrolled" saat halaman digulir
    window.addEventListener("scroll", function() {
        var navbar = document.querySelector(".nav-2");
        if (window.scrollY > 0) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    });
</script>