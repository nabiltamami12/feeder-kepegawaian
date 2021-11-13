 Route::prefix('feeder')->group(function () {

      Route::get('/feeder', function () {
            return view('admin.feeder.feeder-koneksi', [
                "title" => "admin-feeder"
            ]);
        });
      Route::get('/feeder-jurusan', function () {
            return view('admin.feeder.feeder-jurusan', [
                "title" => "admin-feeder"
            ]);
        });
      Route::get('/feeder-skala_nilai', function () {
            return view('admin.feeder.feeder-skala_nilai', [
                "title" => "admin-feeder"
            ]);
        });
      Route::get('/feeder-data_mata_kuliah', function () {
            return view('admin.feeder.feeder-data_mata_kuliah', [
                "title" => "admin-feeder"
            ]);
        });
      Route::get('/feeder-data_kurikulum', function () {
            return view('admin.feeder.feeder-data_kurikulum', [
                "title" => "admin-feeder"
            ]);
        });
      Route::get('/feeder-data_mk_kurikulum', function () {
            return view('admin.feeder.feeder-data_mk_kurikulum', [
                "title" => "admin-feeder"
            ]);
        });
      Route::get('/feeder-data_mahasiswa', function () {
            return view('admin.feeder.feeder-data_mahasiswa', [
                "title" => "admin-feeder"
            ]);
        });
      Route::get('/feeder-data_dosen', function () {
            return view('admin.feeder.feeder-data_dosen', [
                "title" => "admin-feeder"
            ]);
        });
      Route::get('/feeder-data_kelas', function () {
            return view('admin.feeder.feeder-data_kelas', [
                "title" => "admin-feeder"
            ]);
        });
      Route::get('/feeder-data_dosen_ajar', function () {
            return view('admin.feeder.feeder-data_dosen_ajar', [
                "title" => "admin-feeder"
            ]);
        });
      Route::get('/feeder-data_krs', function () {
            return view('admin.feeder.feeder-data_krs', [
                "title" => "admin-feeder"
            ]);
        });
      Route::get('/feeder-data_nilai', function () {
            return view('admin.feeder.feeder-data_nilai', [
                "title" => "admin-feeder"
            ]);
        });
      Route::get('/feeder-data_akm', function () {
            return view('admin.feeder.feeder-data_akm', [
                "title" => "admin-feeder"
            ]);
        });
    });