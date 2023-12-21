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

            <div class="lg:px-20">
                <h2 class="mb-4 text-xl font-bold">Silahkan isi data tamu</h2>
                <form action="{{ route('tamu.store') }}" method="POST">
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium ">Nama</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-secondary  focus:border-secondary block w-full p-2.5 "
                                placeholder="Nama lengkap" required>
                        </div>
                        <div class="w-full">
                            <label for="alamat" class="block mb-2 text-sm font-medium ">Alamat</label>
                            <input type="text" name="alamat" id="alamat"
                                class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-secondary  focus:border-secondary block w-full p-2.5 "
                                placeholder="Alamat" required>
                        </div>
                        <div class="w-full">
                            <label for="no_telp" class="block mb-2 text-sm font-medium ">No. Telepon</label>
                            <input type="number" name="no_telp" id="no_telp"
                                class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-secondary  focus:border-secondary block w-full p-2.5 "
                                placeholder="No. Telepon" required>
                        </div>
                        <div class="w-full">
                            <label for="profesi" class="block mb-2 text-sm font-medium ">Profesi</label>
                            <input type="text" name="profesi" id="profesi"
                                class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-secondary  focus:border-secondary block w-full p-2.5 "
                                placeholder="Profesi" required>
                        </div>
                        <div class="w-full">
                            <label for="instansi" class="block mb-2 text-sm font-medium ">Instansi</label>
                            <input type="text" name="instansi" id="instansi"
                                class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-secondary  focus:border-secondary block w-full p-2.5 "
                                placeholder="Instansi" required>
                        </div>
                        <div class="w-full">
                            <label for="tanggal" class="block mb-2 text-sm font-medium ">Tanggal Kunjungan</label>
                            <input type="date" name="tanggal_kunjungan" id="tanggal"
                                class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-secondary  focus:border-secondary block w-full p-2.5 "
                                required>
                        </div>
                        <div class="w-full">
                            <label for="waktu" class="block mb-2 text-sm font-medium ">Waktu Kunjungan</label>
                            <input type="time" name="waktu_kunjungan" id="waktu"
                                class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-secondary  focus:border-secondary block w-full p-2.5 "
                                required>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="tujuan" class="block mb-2 text-sm font-medium ">Tujuan</label>
                            <textarea id="tujuan" rows="8" name="tujuan"
                                class="block p-2.5 w-full text-sm  bg-gray-50 rounded-lg border border-gray-300 focus:ring-secondary  focus:border-secondary "
                                placeholder="Silahkan tulis tujuan anda disini"></textarea>
                        </div>
                        <div class="w-full">
                            <label for="bertemu" class="block mb-2 text-sm font-medium ">Bertemu dengan</label>
                            <input type="text" name="nama_tujuan_tamu" id="bertemu"
                                class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-secondary  focus:border-secondary block w-full p-2.5 "
                                placeholder="Bpk/Ibu" required>
                        </div>
                    </div>
                    <button type="submit" id="submit-link"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary rounded-lg focus:ring-4 focus:ring-primary-200  hover:bg-opacity-80">
                        Simpan
                    </button>
                </form>
            </div>

            <script>
                // Fungsi untuk melakukan validasi saat formulir disubmit
                function validateForm() {
                    var name = document.getElementById("name").value;
                    var alamat = document.getElementById("alamat").value;
                    var no_telp = document.getElementById("no_telp").value;
                    var profesi = document.getElementById("profesi").value;
                    var instansi = document.getElementById("instansi").value;
                    var tanggal_kunjungan = document.getElementById("tanggal").value;
                    var waktu_kunjungan = document.getElementById("waktu").value;
                    var tujuan = document.getElementById("tujuan").value;

                    // Periksa apakah semua input telah diisi
                    if (
                        name === "" ||
                        alamat === "" ||
                        no_telp === "" ||
                        profesi === "" ||
                        instansi === "" ||
                        tanggal_kunjungan === "" ||
                        waktu_kunjungan === "" ||
                        tujuan === ""
                    ) {
                        alert("Harap isi semua kolom!");
                        return false;
                    }

                    // Tampilkan pesan konfirmasi
                    var confirmation = confirm("Apakah data yang Anda masukkan sudah benar?");
                    return confirmation;
                }

                // Tambahkan event listener ke formulir
                document.getElementById("submit-link").addEventListener("click", function(e) {
                    if (!validateForm()) {
                        e.preventDefault(); // Mencegah pengiriman formulir jika validasi gagal
                    }
                });
            </script>
        </div>
    </div>

@endsection
