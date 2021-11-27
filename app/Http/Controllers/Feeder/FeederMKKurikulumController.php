<?php

namespace App\Http\Controllers\feeder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class FeederMKKurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = DB::table('feeder_mk_kurikulums')
           // ->join('politeknik_jurusan', 'politeknik_jurusan.id', '=', 'matakuliah.program_studi')
           // ->join('matakuliah_jenis', 'matakuliah_jenis.nomor', '=', 'matakuliah.matakuliah_jenis')
        ->select('feeder_mk_kurikulums.*')
        ->get();
        // dd($data);
         return view('admin.feeder.feeder-data_mk_kurikulum', [
                "title" => "admin-feeder",
                "data" => $data
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data = new \App\Services\FeederDiktiApiService('GetMatkulKurikulum');
        $data->runWS();
        $response = $data->runWS();
dd($response['data'][0]);
foreach ($response['data'] as $key => $value) {

// $kd_program_studi = $value->kode_program_studi;
// dd($value['kode_program_studi']);

if (DB::table('feeder_mk_kurikulums')->where('kode_kurikulum','=', $value['id_kurikulum'])
    ->exists()) {
    DB::table('feeder_mk_kurikulums')
    ->where('kode_kurikulum', $value['id_kurikulum'])
    ->update([
          'kode_mk_kurikulum' => $key + 1,
            'kode_mk' => $value['kode_mata_kuliah'],
            'kode_kurikulum' => $value['id_kurikulum'],
            'semester' => $value['semester'],
            'nama_kurikulum' => $value['nama_kurikulum'],
            'bobot_mk' => $value['sks_mata_kuliah'],
            'jenis_mata_kuliah' => $value['nama_mata_kuliah'],
            'status_mk' => $value['apakah_wajib'],
            'id_prodi_feeder' => $value['id_prodi'],
            'nama_program_studi' => $value['nama_program_studi'],
            'status_upload_mk_kurikulum' => 0,
            'keterangan_upload_mk_kurikulum' => 'BELUM UPLOAD',
 ]);
}

    else{

    DB::table('feeder_mk_kurikulums')
    ->insert([
        'kode_mk_kurikulum' => $key + 1,
            'kode_mk' => $value['kode_mata_kuliah'],
            'kode_kurikulum' => $value['id_kurikulum'],
            'semester' => $value['semester'],
            'nama_kurikulum' => $value['nama_kurikulum'],
            'bobot_mk' => $value['sks_mata_kuliah'],
            'jenis_mata_kuliah' => $value['nama_mata_kuliah'],
            'status_mk' => $value['apakah_wajib'],
            'id_prodi_feeder' => $value['id_prodi'],
            'nama_program_studi' => $value['nama_program_studi'],
            'status_upload_mk_kurikulum' => 0,
            'keterangan_upload_mk_kurikulum' => 'BELUM UPLOAD',
 ]);

    }

}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
