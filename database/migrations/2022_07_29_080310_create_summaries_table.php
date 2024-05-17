<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('soal_id');
            $table->foreignId('tim_id');
            $table->foreignId('option_id')->nullable();
            $table->boolean('answer_status')->nullable();
            $table->timestamps();

            $table->foreign('tim_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('soal_id')->references('id')->on('soals')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('option_id')->references('id')->on('options')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('summaries');
    }
}
