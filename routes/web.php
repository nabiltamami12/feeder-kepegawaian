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
    return view('halamanAwal.login');
})->name('login');

Route::get('/login', function () {
    return view('halamanAwal.login');
})->name('login');

Route::get('/register', function () {
    return view('halamanAwal.register');
})->name('register');

Route::get('/pmbgenerateva', function () {
    return view('halamanAwal.pmbGenerateVA');
})->name('generateVA-PMB');

Route::prefix('mahasiswabaru')->group(function () {
    Route::get('/dashboard', function () {
        return view('mahasiswaBaru.dashboardMaba', [
            "title" => "Dashboard"
        ]);
    });
    Route::get('/verifikasidata', function () {
        return view('mahasiswaBaru.verifikasiData', [
            "title" => "Verifikasi Data"
        ]);
    });
    Route::get('/pembayaranva', function () {
        return view('mahasiswaBaru.generatePembayaranVA', [
            "title" => "Pembayaran VA"
        ]);
    });
    Route::get('/daftarulang', function () {
        return view('mahasiswaBaru.daftarUlang', [
            "title" => "Daftar Ulang"
        ]);
    });
    Route::get('/editdatamahasiswa', function () {
        return view('mahasiswaBaru.editDataMahasiswa', [
            "title" => "Edit Data Mahasiswa"
        ]);
    });
});

Route::prefix('akademik')->group(function () {
    Route::get('/dashboard', function () {
        return view('akademik.dashboardAkademik', [
            "title" => "akademik-dashboard",
        ]);
    });

    Route::prefix('master')->group(function () {
        Route::get('/dataperiode', function () {
            return view('akademik.masterData/dataperiode', [
                "title" => "akademik-master",
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
        Route::get('/datakelas/dosen/{id}', function ($id) {
            return view('akademik.masterData/cukelasdosen', [
                "id" => $id,
                "title" => "akademik-master"
            ]);
        });

        Route::get('/datadosen', function () {
            return view('akademik.masterData/datadosen', [
                "title" => "akademik-master",
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
        Route::get('/settingkuliah', function () {
            return view('akademik.masterData/fe_settingKuliah', [
                "title" => "akademik-master"
            ]);
        });
    });


    Route::prefix('kuliah')->group(function () {
        Route::get('/penilaian', function () {
            return view('dosen.inputNilai', [
                "title" => "dosen-penilaian"
            ]);
        });

        Route::get('/cetak-evaluasi-nilai', function () {
            return view('cetak.evaluasinilai', [
                "title" => "dosen-penilaian"
            ]);
        });
        Route::get('/cetak-absensi-kelas', function () {
            return view('cetak.cetakabsensikelas', [
                "title" => "dosen-penilaian"
            ]);
        });

        Route::get('/rekap-nilai', function () {
            return view('akademik.kuliah/datarekapnilai', [
                "title" => "rekap-nilai"
            ]);
        });

        Route::get('/absensi/dashboard-mahasiswa', function () {
            return view('mahasiswaLama.dashboardMahasiswa', [
                "title" => "absensi-mahasiswa"
            ]);
        });

        Route::get('/absensi/mahasiswa/rekap', function () {
            return view('mahasiswaLama.presensi', [
                "title" => "rekap-absensi-mahasiswa"
            ]);
        });

        Route::get('/absensi/dashboard-dosen', function () {
            return view('dosen.dashboardDosen', [
                "title" => "absensi-dosen"
            ]);
        });

        Route::get('/absensi/kelas-dosen/{id_kuliah}/{pertemuan}', function ($id_kuliah, $pertemuan) {
            return view('dosen.presensiDosen', [
                "id_kuliah" => $id_kuliah,
                "pertemuan" => $pertemuan,
                "title" => "absensi-dosen"
            ]);
        });

        Route::get('/absensi/rekap', function () {
            return view('akademik.kuliah.rekapabsensimahasiswa', [
                "title" => "rekap-absensi-mahasiswa"
            ]);
        });
        Route::get('/absensi/rekap/detail/{id}/{kelas}/{matkul}', function ($id,$kelas,$matkul) {
            return view('akademik.kuliah.detailrekapabsensi', [
                "id" => $id,
                "kelas" => $kelas,
                "matkul" => $matkul,
                "title" => "rekap-absensi-mahasiswa"
            ]);
        });
        Route::get('/absensi/rekap-mahasiswa/{kelas}/{matkul}', function ($kelas,$matkul) {
            return view('akademik.kuliah.rekapabsensikelasmahasiswa', [
                "kelas" => $kelas,
                "matkul" => $matkul,
                "title" => "rekap-absensi-mahasiswa"
            ]);
        });
    });

    Route::prefix('keuangan')->group(function () {
        Route::get('/tarif', function () {
            return view('keuangan.tarif_UKT_SPI', [
                "title" => "keuangan-tarif",
            ]);
        });
        Route::get('/tarif/cu/', function () {
            return view('keuangan.cutarifspi', [
                "id" => null,
                "title" => "keuangan-tarif"
            ]);
        });
        Route::get('/tarif/cu/{id}', function ($id) {
            return view('keuangan.cutarifspi', [
                "id" => $id,
                "title" => "keuangan-tarif"
            ]);
        });

        Route::get('/spi', function () {
            return view('keuangan.spiMandiri', [
                "title" => "keuangan-rekapitulasi",
            ]);
        });

        Route::get('/spi/detail/{id}/{nama}', function ($id, $nama) {
            return view('keuangan.detailSPI', [
                "id" => $id,
                'nama' => $nama,
                "title" => "keuangan-rekapitulasi",
            ]);
        });
    });

    Route::prefix('pmb')->group(function () {
        Route::get('/datapendaftar', function () {
            return view('admin.pmb.datapendaftar', [
                "title" => "pmb-pendaftar",
            ]);
        });
        Route::get('/pengajuan/cicilan', function () {
            return view('mahasiswaLama.pengajuancicilan', [
                "title" => "pmb-pendaftar",
            ]);
        });
    });
    
    Route::prefix('report')->group(function () {
        Route::get('/cuti', function () {
            return view('akademik.report.reportcuti', [
                "title" => "akademik-report",
            ]);
        });

        Route::get('/dropout', function () {
            return view('akademik.report.reportdo', [
                "title" => "akademik-report",
            ]);
        });

        Route::get('/melebihisemester', function () {
            return view('akademik.report.reportmelebihisemester', [
                "title" => "akademik-report",
            ]);
        });

        Route::get('/lulus', function () {
            return view('akademik.report.reportlulus', [
                "title" => "akademik-report",
            ]);
        });

        Route::get('/judultugasakhir', function () {
            return view('akademik.report.reportjudulta', [
                "title" => "akademik-report",
            ]);
        });
    });

    Route::prefix('khs')->group(function () {
        Route::get('/khs', function () {
            return view('akademik.khs.khs', [
                "title" => "akademik-khs",
            ]);
        });
        Route::get('/khsmahasiswa', function () {
            return view('akademik.khs.khsmahasiswa', [
                "title" => "akademik-khs",
            ]);
        });
    });

    Route::prefix('kuliah')->group(function () {
        Route::get('/skmahasiswaaktif', function () {
            return view('akademik.kuliah.skmahasiswaaktif', [
                "title" => "akademik-kuliah",
            ]);
        });
        Route::get('/nilai', function () {
            return view('akademik.kuliah.nilai', [
                "title" => "akademik-kuliah",
            ]);
        });
        Route::get('/nilaimahasiswa', function () {
            return view('akademik.kuliah.detailnilaimahasiswa', [
                "title" => "akademik-kuliah",
            ]);
        });
        Route::get('/pelanggaran', function () {
            return view('akademik.kuliah.pelanggaran', [
                "title" => "akademik-kuliah",
            ]);
        });
        Route::get('/absensi/rekap-mahasiswa', function () {
            return view('akademik.kuliah.rekapAbsensiMahasiswa', [
                "title" => "akademik-kuliah",
            ]);
        });
    });
});

Route::prefix('keuangan')->group(function () {
    Route::get('/dashboard', function () {
        return view('keuangan.dashboardKeuangan', [
            "title" => "keuangan-dashboard",
        ]);
    });

    Route::get('/tarif', function () {
        return view('keuangan.tarif_UKT_SPI', [
            "title" => "keuangan-tarif",
        ]);
    });
    Route::get('/tarif/UKTSPI', function () {
        return view('keuangan.settingTarif_UKT_SPI', [
            "title" => "keuangan-tarif",
        ]);
    });

    Route::prefix('rekapitulasi')->group(function () {
        Route::get('/datapendaftar', function () {
            return view('keuangan.dataPendaftar', [
                "title" => "keuangan-rekapitulasi",
            ]);
        });

        Route::get('/spi', function () {
            return view('keuangan.spiMandiri', [
                "title" => "keuangan-rekapitulasi",
            ]);
        });

        Route::get('/spi/detail', function () {
            return view('keuangan.detailSPI', [
                "title" => "keuangan-rekapitulasi",
            ]);
        });

        Route::get('/piutangmahasiswa', function () {
            return view('keuangan.piutangMahasiswa', [
                "title" => "keuangan-rekapitulasi",
            ]);
        });

        Route::get('/penyisihanpiutang', function () {
            return view('keuangan.penyisihanPiutang', [
                "title" => "keuangan-rekapitulasi",
            ]);
        });

        Route::get('/inputdatapembayaran', function () {
            return view('keuangan.inputDataPembayaran', [
                "title" => "keuangan-rekapitulasi",
            ]);
        });

        Route::get('/riwayatpembayaran', function () {
            return view('keuangan.riwayatPembayaran', [
                "title" => "keuangan-rekapitulasi",
            ]);
        });
    });

    Route::prefix('buktipembayaran')->group(function () {
        Route::get('/email', function () {
            return view('keuangan.buktiPembayaran.email', [
                "title" => "keuangan-buktipembayaran",
            ]);
        });

        Route::get('/kwitansi', function () {
            return view('keuangan.buktiPembayaran.kwitansi', [
                "title" => "keuangan-buktipembayaran",
            ]);
        });
    });
});

require_once(__DIR__.'/web_slicing.php');