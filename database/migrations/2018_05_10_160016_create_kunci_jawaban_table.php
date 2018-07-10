<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKunciJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kunci_jawaban', function (Blueprint $table) {
            $table->increments('id');
            $table->char('kunci_jawaban', 100);
            $table->foreign('id_tipe_soal')->references('id')->on('tipe_soal');
            $table->foreign('id_bidang')->references('id')->on('bidang');
            $table->foreign('id_tahun')->references('id')->on('tahun');
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
        Schema::dropIfExists('kunci_jawaban');
    }
}
