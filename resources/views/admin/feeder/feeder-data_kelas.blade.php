@extends('layouts.main')

@section('content')

<?php
use App\Models\feeder\feeder_data_kelas;
$data_kelas = feeder_data_kelas::all();

if(isset($_POST["konek"]))
{

$data = new \App\Services\FeederDiktiApiService('GetDetailKelasKuliah');
$data->runWS();
$response = $data->runWS();



  // dd($response['data']);

   // "id_kelas_kuliah" => "08cc6b7f-ec0b-439b-9222-42dfc81f3513"
   //  "id_prodi" => "dc58b908-37d4-46bb-8eed-255dfbf2806f"
   //  "nama_program_studi" => "S1 Manajemen"
   //  "id_semester" => "20131"
   //  "nama_semester" => "2013/2014 Ganjil"
   //  "id_matkul" => "2ac5b9af-b6c5-4aff-af51-d59c59f56aca"
   //  "kode_mata_kuliah" => "EKMA116"
   //  "nama_mata_kuliah" => "BANK LEMBAGA KEUANGAN"
   //  "nama_kelas_kuliah" => "03"
   //  "bahasan" => null
   //  "lingkup" => null
   //  "mode" => null
   //  "tanggal_mulai_efektif" => null
   //  "tanggal_akhir_efektif" => null
   //  "sks_mata_kuliah" => "3.00"
   //  "sks_tatap_muka" => "3.00"
   //  "sks_praktek" => "0.00"
   //  "sks_praktek_lapangan" => "0.00"
   //  "sks_simulasi" => "0.00"
   //  "apa_untuk_pditt" => "0"
   //  "kapasitas" => null
   //  "tanggal_tutup_daftar" => null
   //  "prodi_penyelenggara" => null
   //  "perguruan_tinggi_penyelenggara" => null



      

        set_time_limit(600);

    if (feeder_data_kelas::all()->count() >= 1 ){
  foreach ($response['data'] as $key => $value) {

  

        feeder_data_kelas::where('id',$key)->update([

            'id_semester' => $value['id_semester'],
            'kode_mk' => $value['kode_mata_kuliah'],
            'nama_mk' => $value['nama_mata_kuliah'],
            'nama_kelas' => $value['nama_kelas_kuliah'],
            'kode_jurusan' => $value['id_prodi'],
            'id_kelas_feeder' => $value['id_kelas_kuliah'],
            'kode_ruang' => '1',
            'jam' => '-',
            'hari' => '-',
            'id_master_kurikulum' => '0',
            'status_error' => '0',
            'keterangan' => '-',
            'bahasan_case' => '-',
            'tgl_mulai_kelas' => '-',
            'tgl_selesai_kelas' => '-',
            'keterangan_upload_kelas' => '',
            'sks_mata_kuliah' => $value['sks_mata_kuliah'],


   
          ]);
      }
    }
    else{
  foreach ($response['data'] as $key => $value) {

         feeder_data_kelas::create([
         
            'id_semester' => $value['id_semester'],
            'kode_mk' => $value['kode_mata_kuliah'],
            'nama_mk' => $value['nama_mata_kuliah'],
            'nama_kelas' => $value['nama_kelas_kuliah'],
            'kode_jurusan' => $value['id_prodi'],
            'id_kelas_feeder' => $value['id_kelas_kuliah'],
            'kode_ruang' => '1',
            'jam' => '-',
            'hari' => '-',
            'id_master_kurikulum' => '0',
            'status_error' => '0',
            'keterangan' => '-',
            'bahasan_case' => '-',
            'tgl_mulai_kelas' => '-',
            'tgl_selesai_kelas' => '-',
            'keterangan_upload_kelas' => '',
            'sks_mata_kuliah' => $value['sks_mata_kuliah'],
   
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
  <form role="form" action="" method="POST">
                @csrf
                  <button type="submit" name="konek" class="btn btn-sm btn-flat btn-default"><i class="fa fa-cloud-download"></i> DOWNLOAD FEEDER</button>
              </form>
         </div>
       </div>

       <hr class="mt">
     </div>

     <div class="box-body table-responsive">     
      <table class="table table-striped table-responsive table-bordered">
        <thead >
          <tr>
            <th style="text-align:center">No</th>
            <th style="text-align:center">Nama MK</th>
            <th style="text-align:center">SKS</th>
            <th style="text-align:center">KLS</th>
            <th style="text-align:center">Jurusan</th>
            <th style="text-align:center">THN Ajaran</th>
            <th style="text-align:center">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
                @if (feeder_data_kelas::all()->count() > 0)

            @foreach($data_kelas as $key => $value)


            <td >{{ $key + 1 }}</td>
            <td  style="text-align:center">{{ $value['nama_mk'] }}</td>
            <td  style="text-align:center">{{ $value['sks_mata_kuliah'] }}</td>
            <td  style="text-align:center">{{ $value['nama_kelas'] }}</td>
            @if($value->jurusan != null)

            <td  style="text-align:center"> {{$value->jurusan->nama_jurusan}} </td>
            <td  style="text-align:center"> {{$value->jurusan->nama_jurusan}} </td>

            @else

            <td  style="text-align:center"></td>

            @endif

            @if($value['id_kelas_feeder'] != null)

            <td  style="text-align:center">SUDAH ADA</td>

            @else

            <td  style="text-align:center">BELUM ADA</td>

            @endif



          </tr>

          @endforeach
  @else
  @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</section>

@endsection