<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLombaOlimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lomba_olims', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tim_id');
            $table->text('bukti_bayar');
            $table->integer('poin')->nullable();
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
        Schema::dropIfExists('lomba_olims');
    }
}
