<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTamuTable extends Migration
{
    public function up()
    {
        Schema::create('tamu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('qr_code');
            $table->string('name');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('profesi');
            $table->string('instansi');
            $table->date('tanggal_kunjungan');
            $table->time('waktu_kunjungan');
            $table->text('tujuan');
            $table->string('nama_tujuan_tamu');
            $table->enum('status', ['Belum Hadir', 'Sudah Hadir'])->default('Belum Hadir');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tamu');
    }
}
