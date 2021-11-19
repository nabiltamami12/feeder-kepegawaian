@extends('layouts.main')

@section('content')

<?php
$data = new \App\Services\FeederDiktiApiService('GetDetailKelasKuliah');
$data->runWS();
$response = $data->runWS();

        set_time_limit(1200);


  dd($response['data']);
  
   "id_kelas_kuliah" => "08cc6b7f-ec0b-439b-9222-42dfc81f3513"
    "id_prodi" => "dc58b908-37d4-46bb-8eed-255dfbf2806f"
    "nama_program_studi" => "S1 Manajemen"
    "id_semester" => "20131"
    "nama_semester" => "2013/2014 Ganjil"
    "id_matkul" => "2ac5b9af-b6c5-4aff-af51-d59c59f56aca"
    "kode_mata_kuliah" => "EKMA116"
    "nama_mata_kuliah" => "BANK LEMBAGA KEUANGAN"
    "nama_kelas_kuliah" => "03"
    "bahasan" => null
    "lingkup" => null
    "mode" => null
    "tanggal_mulai_efektif" => null
    "tanggal_akhir_efektif" => null
    "sks_mata_kuliah" => "3.00"
    "sks_tatap_muka" => "3.00"
    "sks_praktek" => "0.00"
    "sks_praktek_lapangan" => "0.00"
    "sks_simulasi" => "0.00"
    "apa_untuk_pditt" => "0"
    "kapasitas" => null
    "tanggal_tutup_daftar" => null
    "prodi_penyelenggara" => null
    "perguruan_tinggi_penyelenggara" => null


$data_data_dosen = feeder_data_dosen::all();





      
if(isset($_POST["konek"]))
{
        set_time_limit(600);

    if (feeder_data_dosen::all()->count() >= 1 ){
  foreach ($response['data'] as $key => $value) {

  

        feeder_data_dosen::where('id',1)->update([

            'semester' => $value['id_semester'],
            'nidn' => $value['nidn'],
            'nama_dosen' => $value['nama_dosen'],
            'kode_mk' => $value[''],
            'nama_mk' => $value[''],
            'nama_kelas' => $value[''],
            'rencana_tatap_muka' => $value[''],
            'tatap_muka_real' => $value[''],
            'kode_jurusan' => $value[''],
            'sks_ajar' => $value[''],
            'status_error' => $value[''],
            'keterangan' => $value[''],
            'id_aktifitas_mengajar' => $value[''],,

        


   
          ]);
      }
    }
    else{
  foreach ($response['data'] as $key => $value) {

         feeder_data_dosen::create([
         
            'nip' => $value['nidn'],
            'nidn' => $value['nidn'],
            'nama_dosen' => $value['nama_dosen'],
            'kelamin' => $value['jenis_kelamin'],
            'agama' => $value['nama_agama'],
            'tmpt_lahir' => '',
            'tgl_lahir' => $value['tanggal_lahir'],
            'id_status_dosen' => $value['id_status_aktif'],
            'email' => '',
            'telp' => '',
            'alamat' => '',
            'foto_dosen' => 'default.jpg',
            'id_dosen_feeder' => $value['id_dosen'],
   
          ]);
            }
        
     
  }
}
?>

<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card padding--small">
       DOWNLOAD DAN UPLOAD DATA MATA KULIAH KE FEEDER
       <div class="card-header p-0 m-0 border-0">
        <div class=" row align-items-center">
          <div class="col">


          </div>
          <div class="col text-right">

           <!--          <button type="button" onclick="add_btn()" class="btn btn-primary "><i class="iconify-inline mr-1" data-icon='bx:bx-plus-circle'></i>Tambah</button> -->

         </div>
       </div>

       <hr class="mt">
     </div>

     <div class="box-body table-responsive">     
      <table class="table table-striped table-responsive table-bordered">
        <thead >
          <tr>
            <th style="text-align:center">No</th>
            <th style="text-align:center">NIP</th>
            <th style="text-align:center">NIDN</th>
            <th style="text-align:center">Nama Dosen</th>
            <th style="text-align:center">Telp</th>
            <th style="text-align:center">Status</th>
            <th style="text-align:center">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>

            @foreach($response['data'] as $key => $value)


            <td >{{ $key + 1 }}</td>
            <td  style="text-align:center">{{ $value['nip'] }}</td>
            <td  style="text-align:center">{{ $value['nidn'] }}</td>
            <td  style="text-align:center">{{ $value['nama_dosen'] }}</td>
            <td  style="text-align:center"> - </td>
            <td  style="text-align:center">{{ $value['nama_status_aktif'] }}</td>

        
            @if($value['id_dosen'] != null)

            <td  style="text-align:center">SUDAH ADA</td>

            @else

            <td  style="text-align:center">BELUM ADA</td>

            @endif



          </tr>

          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</section>

@endsection