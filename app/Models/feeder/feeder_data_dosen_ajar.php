<?php

namespace App\Models\feeder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feeder_data_dosen_ajar extends Model
{
    use HasFactory;
      protected $fillable = [
            'semester',
            'nidn',
            'nama_dosen',
            'kode_mk',
            'nama_mk',
            'nama_kelas',
            'rencana_tatap_muka',
            'tatap_muka_real',
            'kode_jurusan',
            'sks_ajar',
            'status_error',
            'keterangan',
            'id_aktifitas_mengajar',
        ];
    public function data_mk_kurikulum() {
        return $this->belongsTo(feeder_data_mk_kurikulum::class, 'kode_mk', 'kode_mk');
    }
    public function data_mk() {
        return $this->belongsTo(feeder_data_mata_kuliah::class, 'nama_mk', 'nama_mk');
    }
}
