<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollecteddata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collecteddata', function (Blueprint $table) {
            $table->id();
            $table->string('email',255)->nullable();
            $table->string('nama',255)->nullable();
            $table->string('alamat',200)->nullable();
            $table->string('kodepos',10)->nullable();
            $table->string('kota',255)->nullable();
            $table->string('negara',255)->nullable();
            $table->string('provinsi',255)->nullable();
            $table->enum('kategori',['Pelajar', 'Mahasiswa / Umum'])->nullable();
            $table->enum('klasifikasi',['Ride','Run'])->nullable();
            $table->string('hasil',255)->nullable();
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
        Schema::dropIfExists('collecteddata');
    }
}
