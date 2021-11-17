<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeederJurusansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeder_jurusans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jurusan')->nullable();
            $table->string('nama_jurusan')->nullable();
            $table->string('kode_fakultas')->nullable();
            $table->string('program')->nullable();
            $table->string('kaprodi')->nullable();
            $table->string('akreditasi')->nullable();
            $table->text('sk_ban_pt')->nullable();
            $table->string('tgl_akhir_sk')->nullable();
            $table->string('nip_kaprodi')->nullable();
            $table->string('id_prodi')->nullable();
            $table->string('status_prodi')->nullable();

            $table->tinyInteger('mode_perwalian')->nullable();
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
        Schema::dropIfExists('feeder_jurusans');
    }
}
