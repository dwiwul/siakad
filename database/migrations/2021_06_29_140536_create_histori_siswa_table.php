<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historiSiswa', function (Blueprint $table) {
            $table->bigIncrements('idHistori');
            $table->unsignedBigInteger('idSiswa');
            $table->foreign('idSiswa')->references('idSiswa')->on('siswa')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('idKelas');
            $table->foreign('idKelas')->references('idKelas')->on('kelas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('tahun');
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
        Schema::dropIfExists('historiSiswa');
    }
}
