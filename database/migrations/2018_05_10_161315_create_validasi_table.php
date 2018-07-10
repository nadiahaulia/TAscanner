<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValidasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validasi', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('status_nama');
            $table->boolean('status_no_peserta');
            $table->boolean('status_tipe_soal');
            $table->string('hasil_validasi');
            $table->foreign('id_hasil_scan')->references('id')->on('hasil_scan');
            $table->foreign('id_admin')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('validasi');
    }
}
