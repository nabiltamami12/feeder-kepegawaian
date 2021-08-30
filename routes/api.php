<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API as Ctr;
use Illuminate\Support\Facades\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Misc
Route::post('v1/register', [Ctr\AuthController::class, 'register']);
Route::post('v1/login', [Ctr\AuthController::class, 'login']);
Route::get('warning', [Ctr\AuthController::class, 'warning'])->name('warning');



Route::prefix('v1')->group(function () {
    // Global data
    Route::get('/globaldata/', [Ctr\GlobalController::class, 'index']);
    Route::get('/globaldata/{id}', [Ctr\GlobalController::class, 'index']);
    // Program
    Route::get('/program', [Ctr\ProgramController::class, 'index']);
    // Program
    // Matakuliah jenis
    Route::get('/matkul_jenis', [Ctr\MatakuliahJenisController::class, 'index']);
    // Range Nilai
    Route::get('/rangenilai', [Ctr\RangeNilaiController::class, 'index']);
    Route::get('/rangenilai/{id}', [Ctr\RangeNilaiController::class, 'show']);
    Route::post('/rangenilai', [Ctr\RangeNilaiController::class, 'store']);
    Route::put('/rangenilai/{id}', [Ctr\RangeNilaiController::class, 'update']);
    Route::delete('/rangenilai/{id}', [Ctr\RangeNilaiController::class, 'destroy']);
    // Jurusan
    Route::get('/jurusan', [Ctr\JurusanController::class, 'index']);
    Route::get('/jurusan/{id}', [Ctr\JurusanController::class, 'show']);
    Route::post('/jurusan', [Ctr\JurusanController::class, 'store']);
    Route::put('/jurusan/{id}', [Ctr\JurusanController::class, 'update']);
    Route::delete('/jurusan/{id}', [Ctr\JurusanController::class, 'destroy']);
    // Kelas
    Route::get('/kelas', [Ctr\KelasController::class, 'index']);
    Route::get('/kelas/dosen/{id}', [Ctr\KelasController::class, 'dosen']);
    Route::get('/kelas/{id}', [Ctr\KelasController::class, 'show']);
    Route::post('/kelas', [Ctr\KelasController::class, 'store']);
    Route::put('/kelas/{id}', [Ctr\KelasController::class, 'update']);
    Route::delete('/kelas/{id}', [Ctr\KelasController::class, 'destroy']);

    //Jamkuliah
    Route::get('/jamkuliah/', '\App\Http\Controllers\API\JamkuliahController@index');
    Route::get('/jamkuliah/{id}', '\App\Http\Controllers\API\JamkuliahController@show');
    Route::post('/jamkuliah', '\App\Http\Controllers\API\JamkuliahController@store');
    Route::put('/jamkuliah/{id}', '\App\Http\Controllers\API\JamkuliahController@update');
    Route::delete('/jamkuliah/{id}', '\App\Http\Controllers\API\JamkuliahController@destroy');

    //prodi
    Route::get('/prodi', '\App\Http\Controllers\API\ProdiController@index');
    Route::get('/prodi/{id}', '\App\Http\Controllers\API\ProdiController@show');
    Route::post('/prodi', '\App\Http\Controllers\API\ProdiController@store');
    Route::put('/prodi/{id}', '\App\Http\Controllers\API\ProdiController@update');
    Route::delete('/prodi/{id}', '\App\Http\Controllers\API\ProdiController@destroy');

    //ruangan
    Route::get('/ruangan', '\App\Http\Controllers\API\RuanganController@index');
    Route::get('/ruangan/{id}', '\App\Http\Controllers\API\RuanganController@show');
    Route::post('/ruangan', '\App\Http\Controllers\API\RuanganController@store');
    Route::put('/ruangan/{id}', '\App\Http\Controllers\API\RuanganController@update');
    Route::delete('/ruangan/{id}', '\App\Http\Controllers\API\RuanganController@destroy');

    // Dosen
    Route::get('/dosen', [Ctr\DosenController::class, 'index']);
    Route::get('/dosen/{id}', [Ctr\DosenController::class, 'show']);
    Route::post('/dosen', [Ctr\DosenController::class, 'store']);
    Route::put('/dosen/{id}', [Ctr\DosenController::class, 'update']);
    Route::delete('dosen/{id}', [Ctr\DosenController::class, 'destroy']);
    Route::get('dosen/filter/{id}/{semester}', [Ctr\DosenController::class, 'filter']);


    //matakuliah
    Route::get('/matakuliah/', '\App\Http\Controllers\API\MatakuliahController@index');
    Route::get('/matakuliah/{id}', '\App\Http\Controllers\API\MatakuliahController@show');
    Route::post('/matakuliah', '\App\Http\Controllers\API\MatakuliahController@store');
    Route::put('/matakuliah/{id}', '\App\Http\Controllers\API\MatakuliahController@update');
    Route::delete('/matakuliah/{id}', '\App\Http\Controllers\API\MatakuliahController@destroy');

    // Dosen Matkul
    Route::get('/dosenmk', [Ctr\DosenMatkulController::class, 'index']);
    Route::get('/dosenmk/{id}', [Ctr\DosenMatkulController::class, 'show']);
    Route::post('/dosenmk', [Ctr\DosenMatkulController::class, 'store']);
    Route::put('/dosenmk/{id}', [Ctr\DosenMatkulController::class, 'update']);
    Route::delete('dosenmk/{id}', [Ctr\DosenMatkulController::class, 'destroy']);

    //periode
    Route::get('/periode/', '\App\Http\Controllers\API\PeriodeController@index');
    Route::put('/periode/change_status/{id}', '\App\Http\Controllers\API\PeriodeController@change_status');
    Route::put('/periode/change_semester/{id}/{semester}', '\App\Http\Controllers\API\PeriodeController@change_semester');
    Route::get('/periode/{id}', '\App\Http\Controllers\API\PeriodeController@show');
    Route::post('/periode', '\App\Http\Controllers\API\PeriodeController@store');
    Route::put('/periode/{id}', '\App\Http\Controllers\API\PeriodeController@update');
    Route::delete('/periode/{id}', '\App\Http\Controllers\API\PeriodeController@destroy');

    //hariakitfkuliah
    Route::get('/hariaktifkuliah/', '\App\Http\Controllers\API\HariaktifkuliahController@index');
    Route::get('/hariaktifkuliah/{id}&{tahun}', '\App\Http\Controllers\API\HariaktifkuliahController@show');
    Route::post('/hariaktifkuliah', '\App\Http\Controllers\API\HariaktifkuliahController@store');
    Route::post('/hariaktifkuliah/upload', '\App\Http\Controllers\API\HariaktifkuliahController@upload');


    // Mahasiswa
    Route::get('/mahasiswa', [Ctr\MahasiswaController::class, 'index']);
    Route::get('/mahasiswa/{id}', [Ctr\MahasiswaController::class, 'show']);
    Route::post('/mahasiswa', [Ctr\MahasiswaController::class, 'store']);
    Route::put('/mahasiswa/{id}', [Ctr\MahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/{id}', [Ctr\MahasiswaController::class, 'destroy']);


    // Dosen Pengampu
    Route::get('/dosenpengampu', [Ctr\DosenPengampuController::class, 'index']);
    Route::get('/dosenpengampu/{id}', [Ctr\DosenPengampuController::class, 'show']);
    Route::post('/dosenpengampu', [Ctr\DosenPengampuController::class, 'store']);
    Route::put('/dosenpengampu/{id}', [Ctr\DosenPengampuController::class, 'update']);
    Route::delete('dosenpengampu/{id}', [Ctr\DosenPengampuController::class, 'destroy']);

    //INPUTNILAIDOSEN
    Route::get('/inputnilai/', '\App\Http\Controllers\API\InputNilaiController@index');
    Route::get('/inputnilai/rekap', '\App\Http\Controllers\API\InputNilaiController@rekap');
    Route::get('/inputnilai/{tahun}&{mk}&{kls}&{prodi}', '\App\Http\Controllers\API\InputNilaiController@show');
    Route::post('/inputnilai', '\App\Http\Controllers\API\InputNilaiController@store');
    Route::put('/inputnilai/publish', '\App\Http\Controllers\API\InputNilaiController@publish');
    Route::delete('/inputnilai/{id}', '\App\Http\Controllers\API\InputNilaiController@destroy');

    // ABSENSI
    Route::get('/absensi', [Ctr\AbsensiController::class, 'index']);
    Route::get('/absensi/{id}', [Ctr\AbsensiController::class, 'show']);
    Route::get('/absensi/home/{id}', [Ctr\AbsensiController::class, 'one']);
    Route::get('/rekap/{id}', [Ctr\AbsensiController::class, 'rekap']);
    Route::post('/absensi', [Ctr\AbsensiController::class, 'store']);
    Route::put('/absensi/{id}', [Ctr\AbsensiController::class, 'update']);
    Route::delete('/absensi/{id}', [Ctr\AbsensiController::class, 'destroy']);

    //daftar matkul dosen pengampu
    Route::get('/daftar/{id}', '\App\Http\Controllers\API\DaftarMatkulController@show');
    Route::post('/daftar', '\App\Http\Controllers\API\DaftarMatkulController@store');
    Route::put('/daftar/{id}', '\App\Http\Controllers\API\DaftarMatkulController@update');
    Route::delete('/daftar/{id}', '\App\Http\Controllers\API\DaftarMatkulController@destroy');

    //FILE UPLOAD HARI AKTIF 
    Route::get('/filehari/{nama}', '\App\Http\Controllers\API\HariAktifController@show');
    Route::post('/filehari', '\App\Http\Controllers\API\HariAktifController@store');
    Route::put('/filehari/{nama}', '\App\Http\Controllers\API\HariAktifController@update');
    Route::delete('/filehari/{nama}', '\App\Http\Controllers\API\HariAktifController@destroy');

    //Jalur Pmb
    Route::get('/jalurpmb/{id}', '\App\Http\Controllers\API\JalurpmbController@show');
    Route::post('/jalurpmb', '\App\Http\Controllers\API\JalurpmbController@store');
    Route::put('/jalurpmb/{pmb}', '\App\Http\Controllers\API\JalurpmbController@update');
    Route::delete('/jalurpmb/{id}', '\App\Http\Controllers\API\JalurpmbController@destroy');

    //JURUSAN PILIHAN
    Route::get('/jurusanpilihan/{id}', '\App\Http\Controllers\API\JurusanpilihanController@show');
    Route::get('/jurusanpilihan', '\App\Http\Controllers\API\JurusanpilihanController@index');
    Route::post('/jurusanpilihan', '\App\Http\Controllers\API\JurusanpilihanController@store');
    Route::put('/jurusanpilihan/{id}', '\App\Http\Controllers\API\JurusanpilihanController@update');
    Route::delete('/jurusanpilihan/{id}', '\App\Http\Controllers\API\JurusanpilihanController@destroy');

    // Rekap Tarif UKT
    Route::get('/keuangan/rekap_ukt', [Ctr\UktController::class, 'index']);
    Route::post('/keuangan/rekap_ukt', [Ctr\UktController::class, 'store']);
    Route::get('/keuangan/rekap_ukt/{id}', [Ctr\UktController::class, 'show']);
    Route::put('/keuangan/rekap_ukt/{id}', [Ctr\UktController::class, 'update']);
    Route::delete('/keuangan/rekap_ukt/{id}', [Ctr\UktController::class, 'destroy']);


    // SPI Mandiri
    Route::post('/keuangan/spi/import', [Ctr\SpiController::class, 'import']);
    Route::get('/keuangan/spi/export', [Ctr\SpiController::class, 'export']);
    Route::get('/keuangan/spi', [Ctr\SpiController::class, 'index']);
    Route::get('/keuangan/spi/{id}', [Ctr\SpiController::class, 'show']);




    
});
Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});