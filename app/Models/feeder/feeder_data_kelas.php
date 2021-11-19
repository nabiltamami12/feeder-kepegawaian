<?php

namespace App\Models\feeder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feeder_data_kelas extends Model
{
    use HasFactory;

  protected $fillable = [
          	'id_semester',
            'kode_mk',
            'nama_mk',
            'nama_kelas',
            'kode_jurusan',
            'id_kelas_feeder',
            'kode_ruang',
            'jam',
            'hari',
            'id_master_kurikulum',
            'status_error',
            'keterangan',
            'bahasan_case',
            'tgl_mulai_kelas',
            'tgl_selesai_kelas',
            'keterangan_upload_kelas',
        ];
}
