<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetugasTUTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petugasTU', function (Blueprint $table) {
            $table->bigIncrements('idTU');
            $table->unsignedBigInteger('idSiswa');
            $table->foreign('idSiswa')->references('idSiswa')->on('siswa')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nip', 50)->nullable();
            $table->string('namaTU', 50);
            $table->enum('jk', ['L', 'P']);
			$table->string('alamat', 50);
            $table->string('telp', 15)->nullable();
            $table->string('status', 50);
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
        Schema::dropIfExists('petugasTU');
    }
}
