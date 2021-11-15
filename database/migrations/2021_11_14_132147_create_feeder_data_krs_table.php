<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeederDataKrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeder_data_krs', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->nullable();
            $table->string('nama')->nullable();
            $table->string('kode_mk')->nullable();
            $table->string('nama_mk')->nullable();
            $table->string('nama_kelas')->nullable();
            $table->string('semester')->nullable();
            $table->string('kode_jurusan')->nullable();
            $table->integer('status_error')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('id_krs')->nullable();
            $table->integer('acc_dosen_wali')->nullable();
            $table->integer('acc_keuangan')->nullable();
            $table->date('tgl_acc_dosen_wali')->nullable();
            $table->date('tgl_acc_keuangan')->nullable();
            $table->string('hari')->nullable();
            $table->string('jam')->nullable();
            $table->string('nama_ruang')->nullable();
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
        Schema::dropIfExists('feeder_data_krs');
    }
}
