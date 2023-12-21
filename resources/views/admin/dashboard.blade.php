@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

    <div class="md:pl-64 p-5 w-full md:pt-2">
        <div class="pt-10">
            @if (session('success'))
                <div id="alert-border-3"
                    class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
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

            {{-- Jumlah Tamu Start --}}
            <section>
                <div class="w-full flex justify-center">
                    <h1 class="font-semibold text-xl uppercase">Jumlah Tamu</h1>
                </div>
                <div class="flex flex-wrap justify-center">
                    {{-- Hari Ini --}}
                    <div class="w-full px-4  md:w-1/3 mb-10">
                        <div class="border-l-4 border-biru lg:border-none shadow-lg p-10 rounded-lg h-full">
                            <div class="flex w-full justify-center items-center text-2xl p-4">
                                <i class="fa-solid fa-users text-biru"></i>
                            </div>
                            <div class="flex flex-row justify-center items-center space-x-4">
                                <h2 class="font-semibold text-base">Hari ini:</h2>
                                <span class="text-2xl font-bold text-secondary">{{ $todayCount }}</span>
                            </div>
                        </div>
                    </div>
                    {{-- Kemarin --}}
                    <div class="w-full px-4  md:w-1/3 mb-10">
                        <div class="border-l-4 border-biru lg:border-none shadow-lg p-10 rounded-lg h-full">
                            <div class="flex w-full justify-center items-center text-xl p-4">
                                <i class="fa-solid fa-calendar-day text-biru"></i>
                            </div>
                            <div class="flex flex-row justify-center space-x-4 items-center">
                                <h2 class="font-semibold text-base">Kemarin :</h2>
                                <span class="text-xl font-bold text-secondary">{{ $yesterdayCount }}</span>
                            </div>
                        </div>
                    </div>
                    {{-- Minggu ini --}}
                    <div class="w-full px-4  md:w-1/3 mb-10">
                        <div class="border-l-4 border-biru lg:border-none shadow-lg p-10 rounded-lg h-full">
                            <div class="flex w-full justify-center items-center text-xl p-4">
                                <i class="fa-solid fa-calendar-week text-biru"></i>
                            </div>
                            <div class="flex flex-row justify-center space-x-4 items-center">
                                <h2 class="font-semibold text-base">Minggu ini:</h2>
                                <span class="text-xl font-bold text-secondary">{{ $thisWeekCount }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4  mb-10">
                    <div class="border-l-4 border-biru lg:border-none shadow-lg p-10 rounded-lg h-full">
                        <div class="flex w-full justify-center items-center text-xl p-4">
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>
                        <div class="flex flex-row justify-center items-center space-x-4">
                            <h2 class="font-semibold text-base">Total Bulan ini</h2>
                            <span class="text-xl font-bold text-secondary">{{ $thisMonthCount }}</span>
                        </div>
                    </div>
                </div>
            </section>

            @php
                $nowJakarta = \Carbon\Carbon::now('Asia/Jakarta');
            @endphp
            {{-- Data tamu hari ini --}}
            <section>
                <div class="p-5 bg-gray-100 overflow-auto rounded-lg shadow-lg">
                    <h1 class="text-base text-center font-semibold md:text-left pb-5">Hari ini :
                        <span class="underline text-base text-gray-700">
                            {{ $nowJakarta->isoFormat('dddd, D MMMM YYYY') }}
                        </span>
                    </h1>
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b-2 border-gray-200">
                            <tr>
                                <th class="p-3 text-sm font-semibold tracking-wider text-left">No.</th>
                                <th class="p-3 text-sm font-semibold tracking-wider text-left">Status hadir</th>
                                <th class="p-3 text-sm font-semibold tracking-wider text-left">Nama</th>
                                <th class="p-3 text-sm font-semibold tracking-wider text-left">Alamat</th>
                                <th class="p-3 text-sm font-semibold tracking-wider text-left">No Telpon</th>
                                <th class="p-3 text-sm font-semibold tracking-wider text-left">Instansi</th>
                                <th class="p-3 text-sm font-semibold tracking-wider text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tamuToday as $index => $tamus)
                                <tr class="bg-white border-b-2">
                                    <td class="p-3 text-sm text-gray-700">{{ $index + 1 }}</td>
                                    <td class="p-3 text-sm text-gray-700">{{ $tamus->last_status_change }}</td>
                                    <td class="p-3 text-sm text-gray-700">{{ $tamus->name }}</td>
                                    <td class="p-3 text-sm text-gray-700">{{ $tamus->alamat }}</td>
                                    <td class="p-3 text-sm text-gray-700">{{ $tamus->no_telp }}</td>
                                    <td class="p-3 text-sm text-gray-700">{{ $tamus->instansi }}</td>
                                    <td>
                                        <a href="{{ route('admin.tamu.show', ['id' => $tamus->id]) }}">
                                            <button>
                                                <i
                                                    class="fa-solid fa-eye hover:scale-110 transition duration-300 ease-in-out"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
@endsection
