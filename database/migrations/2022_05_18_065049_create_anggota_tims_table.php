<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_tims', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tim_id');
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('no_wa');
            $table->boolean('ketua'); //anggota(0) atau ketua(1)
            $table->text('buktiSiswa');
            $table->text('pas_foto');
            $table->text('sertifikat')->nullable();
            $table->boolean('selesai')->default(false);
            $table->timestamps();

            $table->foreign('tim_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota_tims');
    }
}
