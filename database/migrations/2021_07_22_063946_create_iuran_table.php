<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIuranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iuran', function (Blueprint $table) {
            $table->bigIncrements('idIuran');
            $table->unsignedBigInteger('idSemester');
            $table->foreign('idSemester')->references('idSemester')->on('semester')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('idSiswa');
            $table->foreign('idSiswa')->references('idSiswa')->on('siswa')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('idKelas');
            $table->foreign('idKelas')->references('idKelas')->on('kelas')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tgl');
            $table->string('jenisBayar');
            $table->integer('jumlahBayar');
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
        Schema::dropIfExists('iuran');
    }
}
