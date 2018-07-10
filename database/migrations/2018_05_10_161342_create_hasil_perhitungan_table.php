<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHasilPerhitunganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_perhitungan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jmlh_salah');
            $table->integer('jmlh_benar');
            $table->integer('jmlh_kosong');
            $table->integer('total_score');
            $table->foreign('id_peserta')->references('id')->on('peserta');
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
        Schema::dropIfExists('hasil_perhitungan');
    }
}
