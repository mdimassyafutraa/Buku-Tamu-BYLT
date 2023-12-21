@extends('layouts.admin')
@section('title', 'Rekap')
@section('content')

    <div class="md:pl-64 p-5 w-full md:pt-2">
        <div class="pt-10">
            <h1 class="text-xl text-center font-semibold md:text-left pb-5">Rekap Data Tamu</h1>
            <div class="py-4">
                <form action="{{ route('admin.rekap.export') }}" method="post">
                    @csrf
                    <div class="flex flex-wrap justify-start md:justify-center items-center w-full">
                        <div class="w-full md:w-1/3 mb-10">
                            <label for="start_date" class="font-semibold">Mulai Tanggal :</label>
                            <input type="date" id="start_date" name="start_date">
                        </div>
                        <div class="w-full md:w-1/3 mb-10">
                            <label for="end_date" class="font-semibold">Sampai Tanggal:</label>
                            <input type="date" id="end_date" name="end_date">
                        </div>
                        <div class="w-full md:w-1/3 mb-10">
                            <label for="status" class="font-semibold">Status:</label>
                            <select id="status" name="status">
                                <option value="">Semua</option>
                                <option value="Belum Hadir">Belum Hadir</option>
                                <option value="Sudah Hadir">Sudah Hadir</option>
                            </select>
                        </div>
                        <button type="submit"
                            class="p-4 bg-green-600 text-sm rounded-full text-white hover:bg-opacity-80 w-full md:max-w-sm">
                            <i class="fa-solid fa-file-excel"></i>
                            <span class="ml-2">Rekap</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
