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
}
