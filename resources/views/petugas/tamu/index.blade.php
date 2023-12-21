@extends('layouts.petugas')
@section('title', 'Data Tamu')
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
            @php
                $nowJakarta = \Carbon\Carbon::now('Asia/Jakarta');
            @endphp
            <h1 class="text-xl text-center font-semibold md:text-left pb-5">Data Tamu</h1>
            <div class="flex flex-wrap justify-between items-center">
                <a href="{{ route('formTamu') }}"
                    class="inline-block mb-2 px-4 py-2 bg-secondary text-white font-semibold rounded-full hover:bg-opacity-80 transition duration-300 ease-in-out">
                    <i class="fa-solid fa-plus"></i>
                    <span class="text-sm">Tamu</span>
                </a>
                <span class="text-base font-semibold text-gray-700">
                    {{ $nowJakarta->isoFormat('dddd, D MMMM YYYY') }}
                </span>
                <form action="{{ route('petugas.tamu') }}" method="GET">
                    <input type="text" name="q" placeholder="Cari nama tamu"
                        class="w-full p-2 border-2 rounded-md text-xs">
                    <button type="submit" class="bg-secondary text-white px-4 py-2 rounded-md hidden">Cari</button>
                </form>
            </div>
        </div>
        {{-- Tabel --}}
        <div class="p-5 bg-gray-100 overflow-auto rounded-lg shadow-lg">
            <table class="w-full">
                @if ($tamu->count() > 0)
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left">No.</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left">Nama</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left">Alamat</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left">No Telpon</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left">Instansi</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left">Bertemu dengan</th>

                            <th class="p-3 text-sm font-semibold tracking-wider text-left">Status</th>
                            <th class="p-3 text-sm font-semibold tracking-wider text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tamu as $index => $tamus)
                            <tr class="bg-white border-b-2">
                                <td class="p-3 text-sm text-gray-700">{{ $index + 1 }}</td>
                                <td class="p-3 text-sm text-gray-700">{{ $tamus->name }}</td>
                                <td class="p-3 text-sm text-gray-700">{{ $tamus->alamat }}</td>
                                <td class="p-3 text-sm text-gray-700">{{ $tamus->no_telp }}</td>
                                <td class="p-3 text-sm text-gray-700">{{ $tamus->instansi }}</td>
                                <td class="p-3 text-sm text-gray-700">{{ $tamus->nama_tujuan_tamu }}</td>

                                <td class="p-3 text-lg">
                                    <form action="{{ route('petugas.tamu.update.status', $tamus->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" onchange="this.form.submit()" class="text-sm font-semibold">
                                            <option value="Belum Hadir"
                                                {{ $tamus->status === 'Belum Hadir' ? 'selected' : '' }}>Belum Hadir
                                            </option>
                                            <option value="Sudah Hadir"
                                                {{ $tamus->status === 'Sudah Hadir' ? 'selected' : '' }}>
                                                Sudah hadir</option>
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('petugas.tamu.show', ['id' => $tamus->id]) }}">
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
            <div class="flex justify-between items-center mt-2 flex-wrap">
                <div>
                    @if ($tamu->count() > 0)
                        <p class="text-sm text-gray-600">
                            Showing {{ $tamu->firstItem() }} to {{ $tamu->lastItem() }} of {{ $tamu->total() }} entries
                        </p>
                    @endif
                </div>
                <div>
                    {{ $tamu->links() }}
                @else
                    <p>Tidak ada data tamu.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
