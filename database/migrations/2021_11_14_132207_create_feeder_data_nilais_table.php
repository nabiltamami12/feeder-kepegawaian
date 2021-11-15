<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeederDataNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeder_data_nilais', function (Blueprint $table) {
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
            $table->string('nilai_huruf')->nullable();
            $table->string('nilai_index')->nullable();
            $table->string('nilai_angka')->nullable();
            $table->string('tugas')->nullable();
            $table->string('uts')->nullable();
            $table->string('uas')->nullable();
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
        Schema::dropIfExists('feeder_data_nilais');
    }
}
