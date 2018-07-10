<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePilihTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilih', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pilihan_ke');
            $table->integer('peringkat');
            $table->string('keterangan');
            $table->foreign('peserta')->references('id')->on('peserta');
            $table->foreign('id_prodi')->references('id')->on('prodi');
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
        Schema::dropIfExists('pilih');
    }
}
