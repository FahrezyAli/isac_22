<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnVerifiedToLombas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lomba_uis', function (Blueprint $table) {
            $table->boolean('verified')->nullable();
        });
        Schema::table('lomba_olims', function (Blueprint $table) {
            $table->boolean('verified')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lomba_uis', function (Blueprint $table) {
            $table->dropColumn('verified');
        });

        Schema::table('lomba_olims', function (Blueprint $table) {
            $table->dropColumn('verified');
        });
    }
}
