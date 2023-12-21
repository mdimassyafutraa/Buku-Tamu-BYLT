@extends('layouts.admin')
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
        </div>
        {{-- Tabel --}}
        <div class="p-5 w-full">
            <div class="p-5 bg-gray-100 rounded-lg shadow-lg lg:w-1/2 mx-auto border-t-4 border-biru">
                <div class="p-4">
                    <div class="flex justify-center">
                        <table>
                            <tr>
                                <th class="text-left p-4 text-sm font-semibold tracking-wider">Nama :</th>
                                <td class="p-3 text-sm text-gray-700">{{ $tamu->name }}</td>
                            </tr>
                            <tr>
                                <th class="text-left p-4 text-sm font-semibold tracking-wider">Alamat :</th>
                                <td class="p-3 text-sm text-gray-700">{{ $tamu->alamat }}</td>
                            </tr>
                            <tr>
                                <th class="text-left p-4 text-sm font-semibold tracking-wider">No Telepon :</th>
                                <td class="p-3 text-sm text-gray-700">{{ $tamu->no_telp }}</td>
                            </tr>
                            <tr>
                                <th class="text-left p-4 text-sm font-semibold tracking-wider">Profesi :</th>
                                <td class="p-3 text-sm text-gray-700">{{ $tamu->profesi }}</td>
                            </tr>
                            <tr>
                                <th class="text-left p-4 text-sm font-semibold tracking-wider">Instansi :</th>
                                <td class="p-3 text-sm text-gray-700">{{ $tamu->instansi }}</td>
                            </tr>
                            <tr>
                                <th class="text-left p-4 text-sm font-semibold tracking-wider">Tujuan :</th>
                                <td class="p-3 text-sm text-gray-700">{{ $tamu->tujuan }}</td>
                            </tr>
                            <tr>
                                <th class="text-left p-4 text-sm font-semibold tracking-wider">Tanggal Kunjungan :</th>
                                <td class="p-3 text-sm text-gray-700">{{ $tamu->tanggal_kunjungan }}</td>
                            </tr>
                            <tr>
                                <th class="text-left p-4 text-sm font-semibold tracking-wider">Waktu Kunjungan :</th>
                                <td class="p-3 text-sm text-gray-700">{{ $tamu->waktu_kunjungan }}</td>
                            </tr>
                            <tr>
                                <th class="text-left p-4 text-sm font-semibold tracking-wider">Bertemu dengan :</th>
                                <td class="p-3 text-sm text-gray-700">{{ $tamu->nama_tujuan_tamu }}</td>
                            </tr>
                            <tr>
                                <th class="text-left p-4 text-sm font-semibold tracking-wider">Status :</th>
                                <td class="p-3 text-sm text-gray-700">
                                    {{ $tamu->status }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="flex justify-center items-center gap-4">
                        <a href="{{ route('admin.tamu.edit', $tamu->id) }}"
                            class="text-sm p-4 bg-secondary rounded-full text-white font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out">
                            <i class="fa-solid fa-pen-to-square"></i>
                            <span>Edit</span>
                        </a>
                        <form action="{{ route('admin.tamu.destroy', $tamu->id) }}" method="POST"
                            onsubmit="return confirm('Anda yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-sm p-4 bg-red-500 rounded-full text-white font-semibold hover:bg-opacity-80 transition duration-300 ease-in-out">
                                <i class="fa-solid fa-trash"></i>
                                <span>Hapus</span>
                            </button>
                        </form>
                    </div>
                </div>
                <a href="{{ route('admin.tamu') }}"
                    class="block mt-2 text-center p-2 bg-biru text-white font-semibold rounded-full hover:bg-opacity-80 transition duration-300 ease-in-out">
                    Kembali
                </a>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('deletedLink').onclick = function() {
            return confirm('Anda yakin ingin menghapus data ini?');
        };
    </script>
@endsection
