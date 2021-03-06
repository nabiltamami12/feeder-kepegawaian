<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuliah extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "kuliah";
    protected $primaryKey = 'nomor';
    protected $fillable = [
        
    ];

    public function rKelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas', 'nomor');
    }

    public function rMatkul()
    {
        return $this->belongsTo(Matakuliah::class, 'matakuliah', 'nomor');
    }
}
