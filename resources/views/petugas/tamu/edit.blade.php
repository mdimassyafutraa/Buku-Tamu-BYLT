@extends('layouts.petugas')
@section('title', 'Data Tamu')
@section('content')

    <div class="md:pl-64 p-5 w-full md:pt-2">
        <div class="pt-10">
            <h1 class="text-xl text-center font-semibold md:text-left pb-5">Edit Data Tamu</h1>
        </div>
        {{-- Tabel --}}
        <div class="p-5 bg-gray-100 overflow-auto rounded-lg shadow-lg">
            <form action="{{ route('petugas.tamu.update', $tamu->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium ">Nama</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-secondary  focus:border-secondary block w-full p-2.5 "
                            placeholder="Nama lengkap" required value="{{ $tamu->name }}">
                    </div>
                    <div class="w-full">
                        <label for="alamat" class="block mb-2 text-sm font-medium ">Alamat</label>
                        <input type="text" name="alamat" id="alamat"
                            class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-secondary  focus:border-secondary block w-full p-2.5 "
                            placeholder="Alamat" required value="{{ $tamu->alamat }}">
                    </div>
                    <div class="w-full">
                        <label for="no_telp" class="block mb-2 text-sm font-medium ">No. Telepon</label>
                        <input type="number" name="no_telp" id="no_telp"
                            class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-secondary  focus:border-secondary block w-full p-2.5 "
                            placeholder="No. Telepon" required value="{{ $tamu->no_telp }}">
                    </div>
                    <div class="w-full">
                        <label for="profesi" class="block mb-2 text-sm font-medium ">Profesi</label>
                        <input type="text" name="profesi" id="profesi"
                            class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-secondary  focus:border-secondary block w-full p-2.5 "
                            placeholder="Profesi" required value="{{ $tamu->profesi }}">
                    </div>
                    <div class="w-full">
                        <label for="instansi" class="block mb-2 text-sm font-medium ">Instansi</label>
                        <input type="text" name="instansi" id="instansi"
                            class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-secondary  focus:border-secondary block w-full p-2.5 "
                            placeholder="Instansi" required value="{{ $tamu->instansi }}">
                    </div>
                    <div class="w-full">
                        <label for="tanggal" class="block mb-2 text-sm font-medium ">Tanggal Kunjungan</label>
                        <input type="date" name="tanggal_kunjungan" id="tanggal"
                            class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-secondary  focus:border-secondary block w-full p-2.5 "
                            required value="{{ $tamu->tanggal_kunjungan }}">
                    </div>
                    <div class="w-full">
                        <label for="waktu" class="block mb-2 text-sm font-medium ">Waktu Kunjungan</label>
                        <input type="time" name="waktu_kunjungan" id="waktu"
                            class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-secondary  focus:border-secondary block w-full p-2.5 "
                            required value="{{ $tamu->waktu_kunjungan }}">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="tujuan" class="block mb-2 text-sm font-medium ">Tujuan</label>
                        <textarea id="tujuan" rows="8" name="tujuan"
                            class="block p-2.5 w-full text-sm  bg-gray-50 rounded-lg border border-gray-300 focus:ring-secondary  focus:border-secondary "
                            placeholder="Silahkan tulis tujuan anda disini">{{ $tamu->tujuan }}</textarea>
                    </div>
                    <div class="w-full">
                        <label for="nama_tujuan_tamu" class="block mb-2 text-sm font-medium">Bertemu dengan</label>
                        <input type="text" name="nama_tujuan_tamu" id="nama_tujuan_tamu"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5"
                            placeholder="Bertemu dengan" required value="{{ $tamu->nama_tujuan_tamu }}">
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('petugas.tamu.show', $tamu->id) }}"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-secondary rounded-lg focus:ring-4 focus:ring-primary-200  hover:bg-opacity-80">
                        Kembali
                    </a>
                    <button type="submit" id="submit-link"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary rounded-lg focus:ring-4 focus:ring-primary-200  hover:bg-opacity-80">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('submit-link').onclick = function() {
            return confirm('Apakah data sudah benar?');
        };
    </script>

@endsection
