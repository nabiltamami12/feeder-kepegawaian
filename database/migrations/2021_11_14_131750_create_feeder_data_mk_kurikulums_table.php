<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeederDataMkKurikulumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeder_data_mk_kurikulums', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_mk_kurikulum')->nullable();
            $table->string('kode_mk')->nullable();
            $table->integer('kode_kurikulum')->nullable();
            $table->integer('semester')->nullable();
            $table->integer('status_mk')->nullable();
            $table->string('id_prodi_feeder')->nullable();
            $table->integer('status_upload_mk_kurikulum')->nullable();
            $table->string('keterangan_upload_mk_kurikulum')->nullable();
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
        Schema::dropIfExists('feeder_data_mk_kurikulums');
    }
}
