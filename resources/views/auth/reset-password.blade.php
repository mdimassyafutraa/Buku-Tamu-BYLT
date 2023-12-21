@extends('layouts.app')
@section('title', 'Login')
@section('content')

    @if (Auth::check() && Auth::user()->hasVerifiedEmail())
        <script>
            window.location = "{{ route('tamu.dashboard') }}";
        </script>
    @endif

    <section class="bg-gray-50">
        <a href="{{ route('beranda') }}" class="text-xs font-light text-gray-500">
            <i class="fa-solid fa-angle-left"></i>
            <span>Beranda</span>
        </a>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="/" class="flex items-center text-2xl font-semibold text-biru ">
                <img class="w-20 h-20 mr-2" src="{{ asset('img/logokai.png') }}" alt="logokai">
            </a>
            <h2 class="font-bold text-biru text-2xl mb-6 italic">UPT Balai Yasa <span class="text-secondary">Lahat</span>
            </h2>
            <div class="w-full bg-white rounded-lg shadow  md:mt-0 sm:max-w-md xl:p-0 ">
                <div class="p-6  sm:p-8 space-y-4 md:space-y-6">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-biru md:text-2xl  text-center">
                        Reset Password
                    </h1>
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
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div id="alert-border-3"
                            class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50"
                            role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <div class="ml-3 text-sm font-medium">
                                {{ session('error') }}
                            </div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
                                data-dismiss-target="#alert-border-3" aria-label="Close">
                                <span class="sr-only">Dismiss</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <input type="email" name="email" placeholder="Masukkan email" required
                            class="bg-gray-50 border border-gray-300 text-biru sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5  mb-4">
                        @error('email')
                            <div>{{ $message }}</div>
                        @enderror

                        <input type="password" name="password" placeholder="Masukkan password baru" required
                            class="bg-gray-50 border border-gray-300 text-biru sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 mb-4">
                        @error('password')
                            <div>{{ $message }}</div>
                        @enderror

                        <input type="password" name="password_confirmation" placeholder="Konfirmasi password baru" required
                            class="bg-gray-50 border border-gray-300 text-biru sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 ">
                        @error('password_confirmation')
                            <div>{{ $message }}</div>
                        @enderror

                        <button type="submit"
                            class="w-full text-white bg-primary hover:bg-opacity-80 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-4">Reset
                            Password</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
