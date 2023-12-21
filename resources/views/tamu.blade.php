@extends('layouts.app')
@section('title', 'Form Input Tamu')
@section('content')

    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16 shadow-lg">
        <h2 class="mb-4 text-xl font-bold">Silahkan isi data tamu</h2>
        <form action="" method="POST">
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
                    <label for="nama_tujuan_tamu" class="block mb-2 text-sm font-medium ">Bertemu dengan</label>
                    <input type="text" name="nama_tujuan_tamu" id="nama_tujuan_tamu"
                        class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-secondary  focus:border-secondary block w-full p-2.5 "
                        placeholder="Bpk/Ibu..." required>
                </div>
            </div>
            <button type="submit" id="submit-link"
                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary rounded-lg focus:ring-4 focus:ring-primary-200  hover:bg-opacity-80">
                Simpan
            </button>
        </form>
    </div>

    <script>
        function validateForm() {
            var name = document.getElementById("name").value;
            var alamat = document.getElementById("alamat").value;
            var no_telp = document.getElementById("no_telp").value;
            var profesi = document.getElementById("profesi").value;
            var instansi = document.getElementById("instansi").value;
            var tanggal_kunjungan = document.getElementById("tanggal").value;
            var waktu_kunjungan = document.getElementById("waktu").value;
            var tujuan = document.getElementById("tujuan").value;
            var tujuan = document.getElementById("nama_tujuan_tamu").value;

            if (
                name === "" ||
                alamat === "" ||
                no_telp === "" ||
                profesi === "" ||
                instansi === "" ||
                tanggal_kunjungan === "" ||
                waktu_kunjungan === "" ||
                tujuan === ""
                nama_tujuan_tamu === ""
            ) {
                alert("Harap isi semua kolom!");
                return false;
            }

            var confirmation = confirm("Apakah data yang Anda masukkan sudah benar?");
            return confirmation;
        }

        document.getElementById("submit-link").addEventListener("click", function(e) {
            if (!validateForm()) {
                e.preventDefault();
            }
        });
    </script>
@endsection
