@extends('layouts.app')
@section('title', 'Home')
@section('content')
    {{-- Navbar --}}
    <nav class="absolute top-0 left-0 w-full ">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 ">
            {{-- brand --}}
            <a href="" class="flex items-center hover:scale-105 transition duration-300 ease-in-out">
                <img src="img/logokai.png" alt="Logo KAI" width="60">
                <h2 class="font-semibold text-xl text-biru">UPT <span class="text-secondary font-bold">BYLT</span></h2>
            </a>
            {{-- humberger --}}
            <div class="flex items-center md:hidden">
                <button id="humberger" name="humberger" type="button" class="block relative z-10  rounded-xl p-2">
                    <span
                        class="humberger-line transition duration-300 ease-in-out origin-top-left block w-6 h-1 mb-1"></span>
                    <span class="humberger-line transition duration-300 ease-in-out block w-6 h-1 mb-1"></span>
                    <span
                        class="humberger-line transition duration-300 ease-in-out origin-bottom-left block w-6 h-1"></span>
                </button>
            </div>
            {{-- link --}}
            <div id="nav-menu"
                class="hidden md:block md:w-auto md:mt-0 md:bg-transparent md:text-biru w-full bg-secondary  mt-6 rounded-xl overflow-hidden text-white">
                <ul
                    class="text-center md:font-bold font-semibold flex flex-col py-4 rounded-xl md:p-0 md:flex-row md:space-x-8 md:mt-0">
                    <li>
                        <a href="#beranda"
                            class="block p-4  hover:bg-orange-400 md:hover:text-secondary md:hover:bg-transparent md:hover:scale-110 transition duration-300 ease-in-out">Beranda</a>
                    </li>
                    <li>
                        <a href="#tamu"
                            class="block p-4  hover:bg-orange-400 md:hover:text-secondary md:hover:bg-transparent md:hover:scale-110 transition duration-300 ease-in-out">Tamu</a>
                    </li>
                    <li>
                        <a href="#tentang"
                            class="block p-4  hover:bg-orange-400 md:hover:text-secondary md:hover:bg-transparent md:hover:scale-110 transition duration-300 ease-in-out">Tentang</a>
                    </li>
                    <li>
                        <a href="#kontak"
                            class="block p-4  hover:bg-orange-400 md:hover:text-secondary md:hover:bg-transparent md:hover:scale-110 transition duration-300 ease-in-out">Kontak</a>
                    </li>
                    <li>
                        <a href="{{ route('formLogin') }}"
                            class="block p-4  hover:bg-orange-400 md:hover:text-secondary md:hover:bg-transparent md:hover:scale-110 transition duration-300 ease-in-out">Akun</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Main --}}
    <main>

        {{-- Beranda --}}
        <section id="beranda" class="py-24 lg:h-screen ">
            @if (session('success'))
                <div id="alert-border-3"
                    class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="ml-3 text-sm font-medium">
                        {{ session('success') }}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8"
                        data-dismiss-target="#alert-border-3" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif
            <div class="w-full flex flex-wrap justify-center items-center px-4 ">
                <div class="w-full mb-10 md:w-1/2 text-center ">
                    <h3 class="text-base font-semibold lg:text-xl">Selamat datang di,</h3>
                    <h2 class="text-2xl font-bold uppercase lg:text-4xl">UPT Balai Yasa <span
                            class="text-secondary">Lahat</span>
                    </h2>
                    <p class="text-sm mb-6 font-medium lg:text-base">Silahkan isi buku tamu terlebih dahulu...</p>
                    <a href="{{ route('formLogin') }}"
                        class="text-base font-semibold px-10 py-4 rounded-full text-white bg-secondary   transition-all duration-300 ease-in-out hover:shadow-slate-500 hover:shadow-md">Daftar</a>
                </div>
                <div class="w-full md:w-1/2 rounded-xl overflow-hidden">
                    <img src="img/bylt.png" alt="UPT Balai Yasa Lahat">
                </div>
            </div>
        </section>

        {{-- Tamu --}}
        <section id="tamu" class="xl:px-24 xl:pt-0 p-4 ">
            <div class="w-full flex justify-center lg:py-10 pb-10" data-aos="zoom-in-up" data-aos-duration="2000">
                <h1 class="font-semibold text-xl uppercase">Jumlah Tamu</h1>
            </div>
            <div class="flex flex-wrap justify-center">
                {{-- Hari Ini --}}
                <div class="w-full px-4 lg:w-1/3 md:w-1/2 mb-10 " data-aos="zoom-in-up" data-aos-duration="2000">
                    <div class="border-l-4 border-biru lg:border-none shadow-lg p-10 rounded-lg h-full">
                        <div class="flex w-full justify-center items-center text-5xl p-6">
                            <i class="fa-solid fa-users text-biru"></i>
                        </div>
                        <div class="flex flex-row justify-center items-center space-x-4">
                            <h2 class="font-semibold text-base">Hari ini:</h2>
                            <span class="text-2xl font-bold text-secondary">{{ $todayCount }}</span>
                        </div>
                    </div>
                </div>
                {{-- Kemarin --}}
                <div class="w-full px-4 lg:w-1/3 md:w-1/2 mb-10 " data-aos="zoom-in-up" data-aos-duration="2000">
                    <div class="border-l-4 border-biru lg:border-none shadow-lg p-10 rounded-lg h-full">
                        <div class="flex w-full justify-center items-center text-5xl p-6">
                            <i class="fa-solid fa-calendar-day text-biru"></i>
                        </div>
                        <div class="flex flex-row justify-center space-x-4 items-center">
                            <h2 class="font-semibold text-base">Kemarin :</h2>
                            <span class="text-2xl font-bold text-secondary">{{ $yesterdayCount }}</span>
                        </div>
                    </div>
                </div>
                {{-- Minggu ini --}}
                <div class="w-full px-4 lg:w-1/3 md:w-1/2 mb-10 " data-aos="zoom-in-up" data-aos-duration="2000">
                    <div class="border-l-4 border-biru lg:border-none shadow-lg p-10 rounded-lg h-full">
                        <div class="flex w-full justify-center items-center text-5xl p-6">
                            <i class="fa-solid fa-calendar-week text-biru"></i>
                        </div>
                        <div class="flex flex-row justify-center space-x-4 items-center">
                            <h2 class="font-semibold text-base">Minggu ini:</h2>
                            <span class="text-2xl font-bold text-secondary">{{ $thisWeekCount }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Tentang --}}
        <section id="tentang" class="xl:px-24 xl:pt-0 p-4 ">
            <div class="w-full flex justify-center lg:py-10 pb-10">
                <h1 class="font-semibold text-xl rounded-full uppercase" data-aos="fade-up" data-aos-duration="2000">
                    Tentang Kami</h1>
            </div>
            <div class="flex flex-wrap justify-center">
                {{-- profil perusahaan --}}
                <div class="w-full px-4 lg:w-1/3 md:w-1/2 mb-10 " data-aos="fade-up" data-aos-duration="2000">
                    <div class="border-s-8 border-biru md:border-none shadow-lg p-10 rounded-lg h-full">
                        <img src="img/logokai.png" alt="" class="w-full h-28 object-scale-down">
                        <div class="pt-8">
                            <h4 class="uppercase text-center mb-4 font-semibold text-xl">Profil Perusahaan</h4>
                            <p class="text-xs pt-4 leading-relaxed"><span class="font-bold">UPT Balai Yasa Lahat
                                </span> terletak
                                satu
                                kompleks
                                dengan Stasiun
                                Lahat dan digunakan untuk memperbaiki semua sarana perkeretaapian yang dialokasikan di
                                Divisi
                                Regional III Palembang dan Divisi Regional IV Tanjungkarang. Ciri khas UPT Balai Yasa
                                Lahat
                                adalah sirine peringatan peninggalan Belanda yang masih aktif digunakan dan dibunyikan
                                mulai pukul 7.00 pagi dan pukul 17.00 sore yang berfungsi untuk menandakan waktu masuk &
                                pulang
                                kerja.</p>
                        </div>
                    </div>
                </div>
                {{-- visi & misi --}}
                <div class="w-full px-4 lg:w-1/3 md:w-1/2 mb-10 " data-aos="fade-up" data-aos-duration="2000">
                    <div class="border-s-8 border-biru md:border-none shadow-lg p-10 rounded-lg h-full">
                        <img src="img/logobumn.png" alt="" class="w-full h-28 object-scale-down">
                        <div class="pt-8 leading-relaxed">
                            <h4 class="uppercase text-center mb-4 font-semibold text-xl">Visi & Misi</h4>
                            <h5 class="text-sm font-bold underline text-center py-2">Visi</h5>
                            <p class="text-xs">Menjadi solusi ekosistem transportasi terbaik untuk indonesia</p>
                            <h5 class="text-sm font-bold underline text-center pb-4">Misi</h5>
                            <ul class="list-disc ">
                                <li>
                                    <p class="text-xs">Untuk menyediakan sistem transportasi yang aman, efisien,
                                        berbasis digital, dan berkembang pesat untuk memenuhi kebutuhan pelanggan</p>
                                </li>
                                <li>
                                    <p class="text-xs">untuk mengembangkan solusi transportasi massal yang terintegrasi
                                        melalui investasi dalam sumber daya manusia, infrastruktur, dan teknologi</p>
                                </li>
                                <li>
                                    <p class="text-xs">Untuk memajukan pembangunan nasional melalui kemitraan dengan
                                        cara pemangku kepentingan termasuk memprakarsai dan melaksanakan pengembangan
                                        infrastruktur-infrastruktur penting terkait transportasi</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- Nilai akhlak --}}
                <div class="w-full px-4 lg:w-1/3 md:w-1/2 mb-10 " data-aos="fade-up" data-aos-duration="2000">
                    <div class="border-s-8 border-biru md:border-none shadow-lg p-10 rounded-lg h-full">
                        <img src="img/logoakhlak.png" alt="" class="w-full h-28 object-scale-down">
                        <div class="pt-8 leading-relaxed">
                            <h4 class="uppercase text-center mb-4 font-semibold text-xl">Nilai-nilai utama</h4>
                            <ul class="list-disc">
                                <li>
                                    <h2 class="text-sm font-medium"><span class="font-bold text-xl">A</span>manah
                                    </h2>
                                    <p class="text-xs">Memegang teguh kepercayaan yang di berikan.</p>
                                </li>
                                <li>
                                    <h2 class="text-sm font-medium"><span class="font-bold text-xl">K</span>ompeten
                                    </h2>
                                    <p class="text-xs">Terus belajar dan mengembangkan kapabilitas</p>
                                </li>
                                <li>
                                    <h2 class="text-sm font-medium"><span class="font-bold text-xl">H</span>armonis
                                    </h2>
                                    <p class="text-xs">Saling peduli dan menghargai perbedaan</p>
                                </li>
                                <li>
                                    <h2 class="text-sm font-medium"><span class="font-bold text-xl">L</span>oyal
                                    </h2>
                                    <p class="text-xs">Saling peduli dan menghargai perbedaan</p>
                                </li>
                                <li>
                                    <h2 class="text-sm font-medium"><span class="font-bold text-xl">A</span>daptif
                                    </h2>
                                    <p class="text-xs">Terus berinovasi dan antusias dalam menggerakan ataupun
                                        menghadapi
                                        perubahaan</p>
                                </li>
                                <li>
                                    <h2 class="text-sm font-medium"><span class="font-bold text-xl">K</span>olaboratif
                                    </h2>
                                    <p class="text-xs">Membangun kerja sama yang sinergis</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Kontak --}}
        <section id="kontak" class="xl:px-24 xl:pt-0 p-4 ">
            <div data-aos="zoom-in" class="w-full flex justify-center lg:py-10 pb-10">
                <h1 class="font-semibold text-xl rounded-full uppercase">Kontak</h1>
            </div>
            <div class="flex flex-wrap min-h-screen w-full justify-center px-4">
                <div data-aos="zoom-in"
                    class="flex flex-col space-y-6 w-full max-w-4xl p-8 rounded-xl shadow-lg md:w-1/2  px-4  mb-10">
                    <div>
                        <h1 class="font-bold text-xl tracking-wide">Kontak Kami</h1>
                        <p class="pt-2 text-sm">
                            UPT Balai Yasa Lahat
                        </p>
                    </div>
                    <div class="flex flex-col space-y-6">
                        <div class="inline-flex space-x-2 items-center">
                            <i class="fas fa-phone"></i>
                            <span class="text-sm">08xxxx</span>
                        </div>
                        <div class="inline-flex space-x-2 items-center">
                            <i class="fas fa-envelope"></i>
                            <span class="text-sm">uptbalaiyasalahat@gmail.com</span>
                        </div>
                        <div class="inline-flex space-x-2 items-center">
                            <i class="fa-solid fa-location-dot"></i>
                            <span class="text-sm">6G5M+79Q, Rd. Pjka Lahat, Kec. Lahat, Kabupaten Lahat, Sumatera
                                Selatan 31461</span>
                        </div>
                    </div>
                    <div class="rounded-xl p-8 ">
                        <form action="{{ route('contact.store') }}" method="POST" class="flex flex-col space-y-4">
                            @csrf
                            <div>
                                <label for="name" class="text-sm">Nama</label>
                                <input type="text" id="name" name="name" placeholder="Masukan nama anda"
                                    class="ring-1 ring-gray-300 w-full rounded-md px-4 py-2 outline-none focus:ring-2 focus:ring-secondary">
                            </div>
                            <div>
                                <label for="email" class="text-sm">Email</label>
                                <input type="email" id="email" name="email" placeholder="Masukan email anda"
                                    class="ring-1 ring-gray-300 w-full rounded-md px-4 py-2 outline-none focus:ring-2 focus:ring-secondary">
                            </div>
                            <div>
                                <label for="pesan" class="text-sm">Pesan</label>
                                <textarea id="pesan" rows="4" name="pesan" placeholder="Pesan"
                                    class="ring-1 ring-gray-300 w-full rounded-md px-4 py-2 outline-none focus:ring-2 focus:ring-secondary">
                                </textarea>
                            </div>
                            <button type="submit"
                                class="p-4 bg-secondary rounded-full text-white font-semibold text-sm hover:bg-opacity-80">Kirim</button>
                        </form>
                    </div>
                </div>
                {{-- Maps --}}
                <div data-aos="zoom-in-left" data-aos-duration="2000"
                    class="flex flex-col space-y-6 w-full max-w-4xl p-8 rounded-xl shadow-lg md:w-1/2 px-4  mb-10 ">
                    <div class="flex w-full max-w-4xl rounded-xl ">
                        <h1 class="font-bold text-xl tracking-wide">Google Maps</h1>
                    </div>
                    <div class="w-full rounded-lg overflow-hidden">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15924.33793869854!2d103.5334859!3d-3.7917774!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3757fa6a60235d%3A0x806db6c9a74075f7!2sUPT%20Balai%20Yasa%20Lahat!5e0!3m2!1sid!2sid!4v1698887557808!5m2!1sid!2sid"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" class="w-full"></iframe>
                    </div>
                </div>
            </div>
        </section>
    </main>

    {{-- Footer --}}
    <footer>
        <div class="flex flex-wrap bg-[#01184A] text-white text-xs">
            <div class="w-full px-4 md:w-1/3 py-10 flex flex-col pt-10 lg:items-center">
                <img src="img/logokai.png" alt="" style="max-width: 100px" class="brightness-110">
                <img src="img/logobumn.png" alt="" style="max-width: 100px" class="brightness-125">
            </div>
            <div class="w-full px-4 md:w-1/3 pt-10 flex flex-col">
                <h3 class="text-2xl font-semibold uppercase text-secondary">Kontak Kami</h3>
                <ul class="py-4">
                    <li class="py-2">
                        <a href="https://www.instagram.com/bumnmudakaibylt/" target="_blank"
                            class="hover:text-secondary inline-flex space-x-2 items-center transition duration-300 ease-in-out">
                            <i class="fa-brands fa-instagram fa-xl">
                            </i>
                            <span>@bumnmudakaibylt</span>
                        </a>
                    </li>
                    <li class="py-2">
                        <a href="" target="_blank"
                            class="hover:text-secondary inline-flex space-x-2 items-center transition duration-300 ease-in-out">
                            <i class="fas fa-phone"></i>
                            <span>08xxxx</span>
                        </a>
                    </li>
                    <li class="py-2">
                        <a href="" target="_blank"
                            class="hover:text-secondary inline-flex space-x-2 items-center transition duration-300 ease-in-out">
                            <i class="fas fa-envelope"></i>
                            <span>email@gmail.com</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="w-full px-4 mb-12 md:w-1/3  pt-10">
                <h3 class="text-2xl font-semibold uppercase text-secondary">Link</h3>
                <ul class="py-4">
                    <li class="py-2">
                        <a href="#beranda" class="hover:text-secondary transition duration-300 ease-in-out"> <span
                                class="text-secondary font-bold">></span> Beranda</a>
                    </li>
                    <li class="py-2">
                        <a href="#tamu" class="hover:text-secondary transition duration-300 ease-in-out"> <span
                                class="text-secondary font-bold">></span> Tamu</a>
                    </li>
                    <li class="py-2">
                        <a href="#tentang" class="hover:text-secondary transition duration-300 ease-in-out"><span
                                class="text-secondary font-bold">></span> Tentang
                            Kami</a>
                    </li>
                    <li class="py-2">
                        <a href="#kontak" class="hover:text-secondary transition duration-300 ease-in-out"><span
                                class="text-secondary font-bold">></span> Kontak</a>
                    </li>
                    <li class="py-2">
                        <a href="{{ route('formLogin') }}"
                            class="hover:text-secondary transition duration-300 ease-in-out"><span
                                class="text-secondary font-bold">></span> Akun</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-full p-4 bg-secondary">
            <h2 class="text-center text-white text-xs">&copy; <?= date('Y') ?> UPT Balai Yasa Lahat, All Rights Reserved
            </h2>
        </div>
    </footer>


@endsection
