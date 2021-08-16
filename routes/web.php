<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// use Illuminate\Support\Facades\Http;

// $accessToken = 'sss';
// $response = Http::withHeaders([
//     'Accept' => 'application/json',
//     'Authorization' => 'Bearer '.$accessToken,
// ])->get('http://127.0.0.1:8000/admin/master-fakultas');


Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/pmbgenerateva', function () {
    return view('pmbGenerateVA');
})->name('generateVA-PMB');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/master-fakultas', function () {
        return view('admin.master.fakultas');
    });
});

// echo json_encode($response->json());
Route::prefix('mahasiswabaru')->group(function () {
    Route::get('/dashboard', function () {
        return view('mahasiswaBaru.dashboardMaba', [
            "title" => "maba-dashboard"
        ]);
    });
    Route::get('/verifikasidata', function () {
        return view('mahasiswaBaru.verifikasiData', [
            "title" => "maba-mahasiswa"
        ]);
    });
    Route::get('/pembayaranva', function () {
        return view('mahasiswaBaru.generatePembayaranVA', [
            "title" => "maba-mahasiswa"
        ]);
    });
    Route::get('/daftarulang', function () {
        return view('mahasiswaBaru.daftarUlang', [
            "title" => "maba-mahasiswa"
        ]);
    });
});

Route::prefix('mahasiswalama')->group(function () {
    Route::get('/dashboard', function () {
        return view('mahasiswaLama.dashboardMahasiswa', [
            "title" => "mala-dashboard"
        ]);
    });

    Route::get('/pembayaran', function () {
        return view('mahasiswaLama.pembayaran', [
            "title" => "mala-pembayaran"
        ]);
    });

    Route::get('/presensi', function () {
        return view('mahasiswaLama.presensi', [
            "title" => "mala-presensi"
        ]);
    });

    Route::prefix('penilaian')->group(function () {
        Route::get('/nilaisemester', function () {
            return view('mahasiswaLama.nilaisemester', [
                "title" => "mala-penilaian"
            ]);
        });

        Route::get('/khs', function () {
            return view('mahasiswaLama.khs', [
                "title" => "mala-penilaian"
            ]);
        });
    });

    Route::get('/formcuti', function () {
        return view('mahasiswaLama.formcuti', [
            "title" => "mala-formcuti"
        ]);
    });
});

Route::prefix('dosen')->group(function () {
    Route::get('/dashboard', function () {
        return view('dosen.dashboardDosen', [
            "title" => "dosen-dashboard"
        ]);
    });

    Route::get('/presensi', function () {
        return view('dosen.presensiDosen', [
            "title" => "dosen-presensi"
        ]);
    });

    Route::get('/penilaian', function () {
        return view('dosen.inputNilai', [
            "title" => "dosen-penilaian"
        ]);
    });
});


Route::prefix('akademik')->group(function () {
    Route::get('/dashboard', function () {
        return view('akademik.dashboardAkademik', [
            "title" => "akademik-dashboard",
            "halamanAktif" => "dashboardakademik"
        ]);
    });

    Route::prefix('master')->group(function (){
        Route::get('/dataperiode', function () {
            return view('akademik.masterData/dataperiode', [
                "title" => "akademik-master",
                "halamanAktif" => "dataperiode"
            ]);
        });
        Route::get('/dataperiode/cu/', function () {
            return view('akademik.masterData/cuperiode', [
                "id" => null,
                "title" => "akademik-master"
            ]);
        });
        Route::get('/dataperiode/cu/{id}', function ($id) {
            return view('akademik.masterData/cuperiode', [
                "id" => $id,
                "title" => "akademik-master"
            ]);
        });

        Route::get('/datahariaktif', function () {
            return view('akademik.masterData/datahariaktif', [
                "title" => "akademik-master"
            ]);
        });

        Route::get('/datamahasiswa', function () {
            return view('akademik.masterData.datamahasiswa', [
                "title" => "akademik-master",
                "halamanAktif" => "datamahasiswa"
            ]);
        });
        Route::get('/datamahasiswa/cu/', function () {
            return view('akademik.masterData/cumahasiswa', [
                "id" => null,
                "title" => "akademik-master"
            ]);
        });
        Route::get('/datamahasiswa/cu/{id}', function ($id) {
            return view('akademik.masterData/cumahasiswa', [
                "id" => $id,
                "title" => "akademik-master"
            ]);
        });

        Route::get('/datadosenpengampu', function () {
            return view('akademik.masterData.datadosenpengampu', [
                "title" => "akademik-master"
            ]);
        });
        Route::get('/datadosenpengampu/cu/', function () {
            return view('akademik.masterData/cudosenpengampu', [
                "id" => null,
                "title" => "akademik-master"
            ]);
        });
        Route::get('/datadosenpengampu/cu/{id}', function ($id) {
            return view('akademik.masterData/cudosenpengampu', [
                "id" => $id,
                "title" => "akademik-master"
            ]);
        });
        
        Route::get('/datamatakuliah', function () {
            return view('akademik.masterData/datamatakuliah', [
                "title" => "akademik-master"
            ]);
        });
        Route::get('/datamatakuliah/cu/', function () {
            return view('akademik.masterData/cumatakuliah', [
                "id" => null,
                "title" => "akademik-master"
            ]);
        });
        Route::get('/datamatakuliah/cu/{id}', function ($id) {
            return view('akademik.masterData/cumatakuliah', [
                "id" => $id,
                "title" => "akademik-master"
            ]);
        });

        Route::get('/datakelas', function () {
            return view('akademik.masterData/datakelas', [
                "title" => "akademik-master",
                "halamanAktif" => "datakelas"
            ]);
        });
        Route::get('/datakelas/cu/', function () {
            return view('akademik.masterData/cukelas', [
                "id" => null,
                "title" => "akademik-master"
            ]);
        });
        Route::get('/datakelas/cu/{id}', function ($id) {
            return view('akademik.masterData/cukelas', [
                "id" => $id,
                "title" => "akademik-master"
            ]);
        });
    
        Route::get('/dataruangan', function () {
            return view('akademik.masterData/dataruangan', [
                "title" => "akademik-master"
            ]);
        });
        Route::get('/dataruangan/cu/', function () {
            return view('akademik.masterData/curuang', [
                "id" => null,
                "title" => "akademik-master"
            ]);
        });
        Route::get('/dataruangan/cu/{id}', function ($id) {
            return view('akademik.masterData/curuang', [
                "id" => $id,
                "title" => "akademik-master"
            ]);
        });

        Route::get('/datajamkuliah', function () {
            return view('akademik.masterData/datajamkuliah', [
                "title" => "akademik-master"
            ]);
        });
        Route::get('/datajamkuliah/cu/', function () {
            return view('akademik.masterData/cujamkuliah', [
                "id" => null,
                "title" => "akademik-master"
            ]);
        });
        Route::get('/datajamkuliah/cu/{id}', function ($id) {
            return view('akademik.masterData/cujamkuliah', [
                "id" => $id,
                "title" => "akademik-master"
            ]);
        });
    
        Route::get('/datajurusan', function () {
            return view('akademik.masterData/datajurusan', [
                "title" => "akademik-master"
            ]);
        });
        Route::get('/datajurusan/cu/', function () {
            return view('akademik.masterData/cujurusan', [
                "id" => null,
                "title" => "akademik-master"
            ]);
        });
        Route::get('/datajurusan/cu/{id}', function ($id) {
            return view('akademik.masterData/cujurusan', [
                "id" => $id,
                "title" => "akademik-master"
            ]);
        });

        Route::get('/datakuliah', function () {
            return view('akademik.masterData/datakuliah', [
                "title" => "akademik-master",
                "halamanAktif" => "datakuliah"
            ]);
        });

        Route::get('/dataprodi', function () {
            return view('akademik.masterData/dataprodi', [
                "title" => "akademik-master"
            ]);
        });
        Route::get('/dataprodi/cu/', function () {
            return view('akademik.masterData/cuprodi', [
                "id" => null,
                "title" => "akademik-master"
            ]);
        });
        Route::get('/dataprodi/cu/{id}', function ($id) {
            return view('akademik.masterData/cuprodi', [
                "id" => $id,
                "title" => "akademik-master"
            ]);
        });

        Route::get('/datarangenilai', function () {
            return view('akademik.masterData/datarangenilai', [
                "title" => "akademik-master"
            ]);
        });
        Route::get('/datarangenilai/cu/', function () {
            return view('akademik.masterData/curangenilai', [
                "id" => null,
                "title" => "akademik-master"
            ]);
        });
        Route::get('/datarangenilai/cu/{id}', function ($id) {
            return view('akademik.masterData/curangenilai', [
                "id" => $id,
                "title" => "akademik-master"
            ]);
        });
    });

    Route::prefix('report')->group(function (){
        Route::get('/cuti', function () {
            return view('akademik.report.reportcuti', [
                "title" => "akademik-report",
                "halamanAktif" => "reportcuti"
            ]);
        });
    
        Route::get('/dropout', function () {
            return view('akademik.report.reportdo', [
                "title" => "akademik-report",
                "halamanAktif" => "reportdropout"
            ]);
        });

        Route::get('/melebihisemester', function () {
            return view('akademik.report.reportmelebihisemester', [
                "title" => "akademik-report",
                "halamanAktif" => "reportmelebihisemester"
            ]);
        });

        Route::get('/lulus', function () {
            return view('akademik.report.reportlulus', [
                "title" => "akademik-report",
                "halamanAktif" => "reportlulus"
            ]);
        });

        Route::get('/judultugasakhir', function () {
            return view('akademik.report.reportjudulta', [
                "title" => "akademik-report",
                "halamanAktif" => "reportjudulta"
            ]);
        });
    });

    Route::prefix('khs')->group(function (){
        Route::get('/khs', function () {
            return view('akademik.khs.khs', [
                "title" => "akademik-khs",
                "halamanAktif" => "khs"
            ]);
        });
        Route::get('/khsmahasiswa', function () {
            return view('akademik.khs.khsmahasiswa', [
                "title" => "akademik-khs",
                "halamanAktif" => "khsmahasiswa"
            ]);
        });
    });

    Route::prefix('kuliah')->group(function (){
        Route::get('/skmahasiswaaktif', function () {
            return view('akademik.kuliah.skmahasiswaaktif', [
                "title" => "akademik-kuliah",
                "halamanAktif" => "skmahasiswaaktif"
            ]);
        });
        Route::get('/nilai', function () {
            return view('akademik.kuliah.nilai', [
                "title" => "akademik-kuliah",
                "halamanAktif" => "nilai"
            ]);
        });
        Route::get('/nilaimahasiswa', function () {
            return view('akademik.kuliah.detailnilaimahasiswa', [
                "title" => "akademik-kuliah",
                "halamanAktif" => "nilaimahasiswa"
            ]);
        });
        Route::get('/pelanggaran', function () {
            return view('akademik.kuliah.pelanggaran', [
                "title" => "akademik-kuliah",
                "halamanAktif" => "pelanggaran"
            ]);
        });
    });
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboardAdmin', [
            "title" => "admin-dashboard"
        ]);
    });
    
    Route::prefix('masterdata')->group(function () {
        Route::get('/datamahasiswa', function () {
            return view('admin.masterData.masterdataMahasiswa', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datamahasiswa/tambahdata', function () {
            return view('admin.formMaster.mahasiswa.tambahdatamahasiswa', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datamahasiswa/updatedata', function () {
            return view('admin.formMaster.mahasiswa.updatedatamahasiswa', [
                "title" => "admin-masterData"
            ]);
        });

        Route::get('/datamatakuliah', function () {
            return view('admin.masterData.masterdataMatakuliah', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datamatakuliah/tambahdata', function () {
            return view('admin.formMaster.matakuliah.tambahdatamatakuliah', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datamatakuliah/updatedata', function () {
            return view('admin.formMaster.matakuliah.updatedatamatakuliah', [
                "title" => "admin-masterData"
            ]);
        });

        Route::get('/datakelas', function () {
            return view('admin.masterData.masterdataKelas', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datakelas/tambahdata', function () {
            return view('admin.formMaster.kelas.tambahdatakelas', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datakelas/updatedata', function () {
            return view('admin.formMaster.kelas.updatedatakelas', [
                "title" => "admin-masterData"
            ]);
        });

        Route::get('/datadosen', function () {
            return view('admin.masterData.masterdataDosen', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datadosen/tambahdata', function () {
            return view('admin.formMaster.dosen.tambahdatadosen', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datadosen/updatedata', function () {
            return view('admin.formMaster.dosen.updatedatadosen', [
                "title" => "admin-masterData"
            ]);
        });

        Route::get('/dataruangan', function () {
            return view('admin.masterData.masterdataRuangan', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/dataruangan/tambahdata', function () {
            return view('admin.formMaster.ruangan.tambahdataruangan', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/dataruangan/updatedata', function () {
            return view('admin.formMaster.ruangan.updatedataruangan', [
                "title" => "admin-masterData"
            ]);
        });

        Route::get('/datajamkuliah', function () {
            return view('admin.masterData.masterdataJamKuliah', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datajamkuliah/tambahdata', function () {
            return view('admin.formMaster.jamKuliah.tambahdatajamkuliah', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datajamkuliah/updatedata', function () {
            return view('admin.formMaster.jamKuliah.updatedatajamkuliah', [
                "title" => "admin-masterData"
            ]);
        });


        Route::get('/datajurusan', function () {
            return view('admin.masterData.masterdataJurusan', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datajurusan/tambahdata', function () {
            return view('admin.formMaster.jurusan.tambahdatajurusan', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datajurusan/updatedata', function () {
            return view('admin.formMaster.jurusan.updatedatajurusan', [
                "title" => "admin-masterData"
            ]);
        });


        Route::get('/datafakultas', function () {
            return view('admin.masterData.masterdataFakultas', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datafakultas/tambahdata', function () {
            return view('admin.formMaster.fakultas.tambahdatafakultas', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datafakultas/updatedata', function () {
            return view('admin.formMaster.fakultas.updatedatafakultas', [
                "title" => "admin-masterData"
            ]);
        });

        Route::get('/dataprodi', function () {
            return view('admin.masterData.masterdataProdi', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/dataprodi/tambahdata', function () {
            return view('admin.formMaster.prodi.tambahdataprodi', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/dataprodi/updatedata', function () {
            return view('admin.formMaster.prodi.updatedataprodi', [
                "title" => "admin-masterData"
            ]);
        });

        Route::get('/datarangenilai', function () {
            return view('admin.masterData.masterdataRangeNilai', [
                "title" => "admin-masterData"
            ]);
        });

        Route::get('/datadosenpengampu', function () {
            return view('admin.masterData.masterdataDosenPengampu', [
                "title" => "admin-masterData"
            ]);
        });
        Route::get('/datadosenpengampu/tambahdata', function () {
            return view('admin.formMaster.dosenPengampu.tambahdatadosenpengampu', [
                "title" => "admin-masterData"
            ]);
        });
        

        Route::get('/dataprogram', function () {
            return view('admin.masterData.masterdataProgram', [
                "title" => "admin-masterData"
            ]);
        });

        Route::get('/hariaktif', function () {
            return view('admin.masterData.masterdataHariAktif', [
                "title" => "admin-masterData"
            ]);
        });
    });

    Route::prefix('kuliah')->group(function () {
        Route::get('/absensi', function () {
            return view('admin.kuliah.absensi', [
                "title" => "admin-kuliah"
            ]);
        });

        Route::get('/nilai', function () {
            return view('admin.kuliah.nilai', [
                "title" => "admin-kuliah"
            ]);
        });

        Route::get('/pelanggaran', function () {
            return view('admin.kuliah.pelanggaran', [
                "title" => "admin-kuliah"
            ]);
        });
    });
});

Route::prefix('keuangan')->group(function () {
    Route::get('/dashboard', function () {
        return view('keuangan.dashboardKeuangan', [
            "title" => "keuangan-dashboard"
        ]);
    });

    Route::get('/spimandiri', function () {
        return view('keuangan.spiMandiri', [
            "title" => "keuangan-dataSPI"
        ]);
    });

    Route::get('/databeasiswa', function () {
        return view('keuangan.dataBeasiswa', [
            "title" => "keuangan-dataBeasiswa"
        ]);
    });

    Route::get('/piutangmahasiswa', function () {
        return view('keuangan.piutangMahasiswa', [
            "title" => "keuangan-piutang"
        ]);
    });
});

Route::get('/component', function () {
    return view('testComponent');
});

Route::get('/loading', function () {
    return view('testloading');
});

Route::get('/loading2', function () {
    return view('testloading2');
});