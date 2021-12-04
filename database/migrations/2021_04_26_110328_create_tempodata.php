<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempodata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempodata', function (Blueprint $table) {
            $table->id();
            $table->string('email',255)->nullable();
            $table->string('nama',255)->nullable();
            $table->string('alamat',200)->nullable();
            $table->string('kodepos',10)->nullable();
            $table->string('kota',255)->nullable();
            $table->string('negara',255)->nullable();
            $table->string('provinsi',255)->nullable();
            $table->integer('nohp',)->nullable();
            $table->date('tgllahir')->nullable();
            $table->enum('status',['konfirmasi','belum konfirmasi'])->nullable();
            $table->enum('kategori',['Pelajar', 'Mahasiswa / Umum'])->nullable();
            $table->enum('klasifikasi',['Ride','Run'])->nullable();
            $table->enum('ukuran',['S','M','L','XL'])->nullable();
            $table->enum('pembayaran', ['BCA', 'OVO', 'Dana']);
            $table->string('totalpembayaran',30)->nullable();
            $table->string('buktipembayaran',255)->nullable();
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
        Schema::dropIfExists('tempodata');
    }
}
