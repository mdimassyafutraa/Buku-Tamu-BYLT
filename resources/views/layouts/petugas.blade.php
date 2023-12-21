<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- icon --}}
    <link rel="icon" href="{{ asset('img/logokai.png') }}">

    {{-- Css Tailwind --}}
    @vite('resources/css/app.css')



    {{-- google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    {{-- Icon  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    {{-- Scroll --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>UPT BYLT | @yield('title')</title>

    <style>
        .active {
            color: white;
            display: block;
            padding: 1rem;
            border-radius: 0.375rem;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
            margin-right: 0.5rem;
            background-color: #2C2A6B;
            color: #fff;
            margin-left: 0.5rem;
            transition-duration: 0.3s;
            transition-timing-function: ease-in-out;
        }
    </style>

</head>

<body class="text-biru">
    <section>
        <div class="fixed w-60">
            <div class="humberger p-4 text-2xl cursor-pointer md:hidden">
                <i id="sidebar-open" class="fa-solid fa-bars"></i>
            </div>
            {{-- Nav --}}
            <div
                class="absolute  backdrop-blur-3xl bg-slate-200 bg-opacity-70 h-screen z-50 top-0 p-4 -translate-x-full duration-300 md:translate-x-0 md:relative">
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('img/logokai.png') }}" class="brightness-90" width="60" alt="Logo KAI">
                    <h3 class="text-xl font-semibold text-biru">UPT <span class="text-secondary">BYLT</span></h3>
                </div>
                <div class="w-full  mx-2 mt-2 space-x-2 ">
                    <h2 class="text-sm font-semibold">{{ Auth::user()->name }}</h2>
                </div>
                <ul class=" w-full mt-10 text-biru font-semibold ">
                    <li class="mb-2">
                        <a href="{{ route('petugas.dashboard') }}"
                            class="flex items-center text-base p-4 rounded-md hover:bg-biru hover:text-white space-x-2 transition duration-300 ease-in-ot {{ Request::is('petugas.dashboard*') ? 'active' : '' }}">
                            <i class="fa-solid fa-gauge "></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('petugas.tamu') }}"
                            class="flex items-center text-base p-4 rounded-md hover:bg-biru hover:text-white  space-x-2 transition duration-300 ease-in-out {{ Request::is('petugas.tamu*') ? 'active' : '' }}">
                            <i class="fa-solid fa-users "></i>
                            <span>Data Tamu</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('scan') }}"
                            class="flex items-center text-base p-4 rounded-md hover:bg-biru hover:text-white  space-x-2 transition duration-300 ease-in-out {{ Request::is('scan*') ? 'active' : '' }}">
                            <i class="fa-solid fa-qrcode"></i>
                            <span>Scan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" id="logout-link"
                            class="flex items-center text-base p-4 rounded-md hover:bg-biru hover:text-white  space-x-2 transition duration-300 ease-in-out">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                    <li class="mt-10">
                        <div class="md:hidden text-3xl text-biru cursor-pointer flex justify-center">
                            <i id="sidebar-close" class="fa-solid fa-arrow-left"></i>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        {{-- page --}}
        @yield('content')
    </section>

    {{-- Aktive --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const currentLocation = window.location.href;

            const links = document.querySelectorAll('a');
            links.forEach(link => {
                if (link.href === currentLocation) {
                    link.classList.add('active');
                }
            });
        });
    </script>
    {{-- sidebar --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var sidebarOpen = document.getElementById("sidebar-open");
            var sidebarClose = document.getElementById("sidebar-close");
            var sidebar = document.querySelector(".backdrop-blur-3xl");
            var humberger = document.querySelector(".humberger");
            var body = document.querySelector("body");

            // Menambahkan event listener untuk mengaktifkan sidebar saat tombol "sidebar-open" diklik
            sidebarOpen.addEventListener("click", function() {
                sidebar.style.transform = "translateX(0)";
                humberger.classList.add('-translate-x-full');

                // Menambahkan event listener untuk menutup sidebar saat tombol "sidebar-close" diklik
                sidebarClose.addEventListener("click", function() {
                    sidebar.style.transform = "translateX(-100%)";
                    humberger.classList.remove('-translate-x-full');
                });

                // Menambahkan event listener untuk menutup sidebar saat klik di luar area sidebar
                body.addEventListener("click", function(event) {
                    if (event.target !== sidebar && !sidebar.contains(event.target) && event
                        .target !== sidebarOpen) {
                        sidebar.style.transform = "translateX(-100%)";
                        humberger.classList.remove('-translate-x-full');
                    }
                });
            });
        });

        // Logout 
        const logoutLink = document.getElementById('logout-link');
        logoutLink.addEventListener('click', function(event) {
            event.preventDefault();

            // Konfirmasi logout
            if (confirm('Apakah Anda yakin ingin keluar?')) {
                window.location.href = logoutLink.getAttribute('href');
            }
        });
    </script>

    {{-- alert --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const closeButtons = document.querySelectorAll('[data-dismiss-target]');

            closeButtons.forEach((button) => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-dismiss-target');
                    const alertElement = document.querySelector(targetId);

                    if (alertElement) {
                        alertElement.remove();
                    }
                });
            });
        });
    </script>
    {{-- Script --}}
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
