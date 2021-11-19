<?php

namespace App\Models\feeder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feeder_data_mk_kurikulum extends Model
{
    use HasFactory;
      protected $fillable = [
            'kode_mk_kurikulum',
            'kode_mk',
            'kode_kurikulum',
            'semester',
            'status_mk',
            'id_prodi_feeder',
            'status_upload_mk_kurikulum',
            'keterangan_upload_mk_kurikulum',
        ];

    public function kurikulum() {
        return $this->belongsTo(feeder_data_kurikulum::class, 'kode_kurikulum', 'id_kurikulum');
    }
    public function prodi() {
        return $this->belongsTo(feeder_data_mata_kuliah::class, 'id_prodi_feeder', 'id_mk');
    }
}
