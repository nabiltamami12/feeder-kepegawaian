<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeederDataMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeder_data_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pd')->nullable();
            $table->string('jk')->nullable();
            $table->string('nisn')->nullable();
            $table->integer('npwp')->nullable();
            $table->integer('nik')->nullable();
            $table->integer('tmpt_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->integer('id_agama')->nullable();
            $table->integer('id_kk')->nullable();
            $table->string('jln')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('nama_dusun')->nullable();
            $table->string('desa_kel')->nullable();
            $table->string('id_wilayah')->nullable();
            $table->string('id_jenis_tinggal')->nullable();
            $table->string('id_alat_transportasi')->nullable();
            $table->string('no_telp_rumah')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->string('a_terima_kps')->nullable();
            $table->string('no_kps')->nullable();
            $table->string('stat_pd')->nullable();
            $table->string('nik_ayah')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->date('tgl_lahir_ayah')->nullable();
            $table->string('id_jenjang_pendidikan_ayah')->nullable();
            $table->integer('id_kebutuhan_khusus_ayah')->nullable();
            $table->integer('id_kebutuhan_khusus_ibu')->nullable();
            $table->string('id_pekerjaan_ayah')->nullable();
            $table->string('id_penghasilan_ayah')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->date('tgl_lahir_ibu')->nullable();
            $table->string('id_jenjang_pendidikan_ibu')->nullable();
            $table->string('id_pekerjaan_ibu')->nullable();
            $table->string('id_penghasilan_ibu')->nullable();
            $table->string('nik_wali')->nullable();
            $table->string('nama_wali')->nullable();
            $table->date('tgl_lahir_wali')->nullable();
            $table->string('id_jenjang_pendidikan_wali')->nullable();
            $table->string('id_pekerjaan_wali')->nullable();
            $table->string('id_penghasilan_wali')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('kode_jurusan')->nullable();
            $table->integer('id_jenis_daftar')->nullable();
            $table->string('nim')->nullable();
            $table->date('tgl_masuk_sp')->nullable();
            $table->string('mulai_smt')->nullable();
            $table->string('id_pembayaran')->nullable();
            $table->string('id_jalur_masuk')->nullable();
            $table->integer('status_error')->nullable();
            $table->string('keteangan')->nullable();
            $table->string('password')->nullable();
            $table->string('biaya_masuk_kuliah')->nullable();
            $table->string('id_reg_mahasiswa')->nullable();
            $table->string('foto_mahasiswa')->nullable();
            $table->string('status_mahasiswa')->nullable();
            $table->string('kode_paket')->nullable();

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
        Schema::dropIfExists('feeder_data_mahasiswas');
    }
}
