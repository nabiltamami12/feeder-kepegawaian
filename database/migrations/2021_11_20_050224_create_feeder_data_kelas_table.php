<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeederDataKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeder_data_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('id_semester')->nullable();
            $table->string('kode_mk')->nullable();
            $table->string('nama_mk')->nullable();
            $table->string('nama_kelas')->nullable();
            $table->string('kode_jurusan')->nullable();
            $table->string('id_kelas_feeder')->nullable();
            $table->string('kode_ruang')->nullable();
            $table->string('jam')->nullable();
            $table->string('hari')->nullable();
            $table->string('id_master_kurikulum')->nullable();
            $table->integer('status_error')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('bahasan_case')->nullable();
            $table->string('tgl_mulai_kelas')->nullable();
            $table->string('tgl_selesai_kelas')->nullable();
            $table->string('keterangan_upload_kelas')->nullable();
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
        Schema::dropIfExists('feeder_data_kelas');
    }
}
