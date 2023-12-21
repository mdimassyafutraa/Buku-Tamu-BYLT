@extends('layouts.tamu')
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

            <div class="p-5 bg-gray-100 overflow-auto rounded-lg shadow-lg">
                <h2 class="mb-4 text-xl font-bold">Riwayat Tamu</h2>
                <table class="w-full">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left text-gray-600">No.</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left text-gray-600">Nama</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left text-gray-600">Alamat</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left text-gray-600">No Telpon</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left text-gray-600">Profesi</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left text-gray-600">Instansi</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left text-gray-600">Tanggal</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left text-gray-600">Waktu</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left text-gray-600">Tujuan</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left text-gray-600">Bertemu</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left text-gray-600">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tamu as $index => $tamus)
                            <tr class="bg-white border-b-2">
                                <td class="p-3 text-sm text-gray-500">{{ $index + 1 }}</td>
                                <td class="p-3 text-sm text-gray-500">{{ $tamus->name }}</td>
                                <td class="p-3 text-sm text-gray-500">{{ $tamus->alamat }}</td>
                                <td class="p-3 text-sm text-gray-500">{{ $tamus->no_telp }}</td>
                                <td class="p-3 text-sm text-gray-500">{{ $tamus->profesi }}</td>
                                <td class="p-3 text-sm text-gray-500">{{ $tamus->instansi }}</td>
                                <td class="p-3 text-sm text-gray-500">{{ $tamus->tanggal_kunjungan }}</td>
                                <td class="p-3 text-sm text-gray-500">{{ $tamus->waktu_kunjungan }}</td>
                                <td class="p-3 text-sm text-gray-500">{{ $tamus->tujuan }}</td>
                                <td class="p-3 text-sm text-gray-500">{{ $tamus->nama_tujuan_tamu }}</td>
                                <td class="p-3 text-sm  text-white flex flex-wrap ">
                                    <span class=" text-green-300 text-sm font-semibold ">{{ $tamus->status }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
