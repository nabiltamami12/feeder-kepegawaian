<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeederDataDosenAjarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeder_data_dosen_ajars', function (Blueprint $table) {
            $table->id();
            $table->string('semester')->nullable();
            $table->string('nidn')->nullable();
            $table->string('nama_dosen')->nullable();
            $table->string('kode_mk')->nullable();
            $table->string('nama_mk')->nullable();
            $table->string('nama_kelas')->nullable();
            $table->integer('rencana_tatap_muka')->nullable();
            $table->integer('tatap_muka_real')->nullable();
            $table->string('kode_jurusan')->nullable();
            $table->string('sks_ajar')->nullable();
            $table->integer('status_error')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('id_aktifitas_mengajar')->nullable();
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
        Schema::dropIfExists('feeder_data_dosen_ajars');
    }
}
