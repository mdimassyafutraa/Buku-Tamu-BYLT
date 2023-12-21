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

            {{-- Check if there are guests or not --}}
            @if ($tamu->isEmpty())
                <!-- Show message for no guests -->
                <p class="text-center text-xl font-semibold mb-4">Silahkan isi data tamu terlebih dahulu.</p>
            @else
                <!-- Show guest data -->
                <h2 class="mb-2 text-xl font-bold">Data Tamu</h2>
                {{-- Show message for scanning --}}
                @if (!$tamu->isEmpty())
                    <p class="text-xs font-semibold mt-2 text-red-600 mb-4">
                        *Silahkan di bawa dan di scan.
                    </p>
                @endif
                <div class="flex flex-wrap justify-center ">
                    <!-- Loop through guest data -->
                    @foreach ($tamu as $dataTamu)
                        @foreach ($tamu as $dataTamu)
                            <div
                                class="w-full px-4 lg:w-1/3 md:w-1/2 mb-10 shadow-lg py-4 max-w-sm border-t-4 border-biru sm:border-none">
                                <div class="w-full items-center justify-center flex mb-4">
                                    {!! QrCode::size(250)->generate($dataTamu->qr_code) !!}
                                </div>
                                <table>
                                    <tr>
                                        <th class="text-left p-4 text-sm font-semibold tracking-wider">Nama :</th>
                                        <td class="p-3 text-sm text-gray-700">{{ $dataTamu->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left p-4 text-sm font-semibold tracking-wider">Alamat :</th>
                                        <td class="p-3 text-sm text-gray-700">{{ $dataTamu->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left p-4 text-sm font-semibold tracking-wider">No Telepon :</th>
                                        <td class="p-3 text-sm text-gray-700">{{ $dataTamu->no_telp }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left p-4 text-sm font-semibold tracking-wider">Profesi :</th>
                                        <td class="p-3 text-sm text-gray-700">{{ $dataTamu->profesi }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left p-4 text-sm font-semibold tracking-wider">Instansi :</th>
                                        <td class="p-3 text-sm text-gray-700">{{ $dataTamu->instansi }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left p-4 text-sm font-semibold tracking-wider">Tanggal Kunjungan :
                                        </th>
                                        <td class="p-3 text-sm text-gray-700">{{ $dataTamu->tanggal_kunjungan }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left p-4 text-sm font-semibold tracking-wider">Waktu Kunjungan :
                                        </th>
                                        <td class="p-3 text-sm text-gray-700">{{ $dataTamu->waktu_kunjungan }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left p-4 text-sm font-semibold tracking-wider">Tujuan :</th>
                                        <td class="p-3 text-sm text-gray-700">{{ $dataTamu->tujuan }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left p-4 text-sm font-semibold tracking-wider">Bertemu dengan :</th>
                                        <td class="p-3 text-sm text-gray-700">{{ $dataTamu->nama_tujuan_tamu }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left p-4 text-sm font-semibold tracking-wider">Status :</th>
                                        <td class="p-3 text-sm text-red-600">{{ $dataTamu->status }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left p-4 text-sm font-semibold tracking-wider">Aksi :</th>
                                        <td>
                                            <form action="{{ route('tamu.destroy', $dataTamu->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            @endif
        </div>
    </div>

@endsection
