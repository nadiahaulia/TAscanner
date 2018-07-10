<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHasilScanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_scan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('scan_teks');
            $table->string('scan_gambar');
            $table->foreign('id_peserta')->references('id')->on('peserta');
            $table->foreign('id_pengawas')->references('id')->on('pengawas');
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
        Schema::dropIfExists('hasil_scan');
    }
}
