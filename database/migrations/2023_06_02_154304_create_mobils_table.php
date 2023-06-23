<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mobil');
            $table->string('cc');
            $table->string('nomor-polisi');
            $table->string('warna');
            $table->string('tahun_mobil');
            $table->string('foto')->nullable();
            $table->integer('merk_id')->references('id')->on('merks');
            $table->integer('tipe_mobil_id')->references('id')->on('tipemobils');
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
        Schema::dropIfExists('mobils');
    }
}