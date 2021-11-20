@extends('layouts.main')

@section('content')

<?php
use App\Models\feeder\config_feeder;
$token_id = config_feeder::first();
use App\Models\feeder\feeder_data_kelas;
use App\Models\feeder\feeder_data_dosen_ajar;
$data_kelas = feeder_data_kelas::all();
// $data = new \App\Services\FeederDiktiApiService("GetProfilPT");




  // dd($token);
  // dd($response['data'] );
  // "id_aktivitas_mengajar" => "001c8f4d-d468-4af4-a793-7e113a5f1c5f"
  //   "id_registrasi_dosen" => "806408d2-a2c1-42af-a0d3-316b1308b30a"
  //   "id_dosen" => "d558ecde-84ae-4a0f-8a86-4f52b5f66274"
  //   "nidn" => "0710126901"
  //   "nama_dosen" => "RIO SUDIRMAN"
  //   "id_kelas_kuliah" => "61ab1c1f-755f-4919-acae-813fb24c84b8"
  //   "nama_kelas_kuliah" => "02"
  //   "id_substansi" => null
  //   "sks_substansi_total" => "3.00"
  //   "rencana_minggu_pertemuan" => "14"
  //   "realisasi_minggu_pertemuan" => "14"
  //   "id_jenis_evaluasi" => "1"
  //   "nama_jenis_evaluasi" => "Evaluasi Akademik"
  //   "id_prodi" => "e48035e4-b3b4-489b-a01e-5f7ca23d5869"
  //   "id_semester" => "20141"

$data_dosen = feeder_data_dosen_ajar::all();
      
if(isset($_POST["konek"]))
{
  $data = new \App\Services\FeederDiktiApiService('GetDosenPengajarKelasKuliah');
$token = $data->getToken();
   config_feeder::where('id',$token_id->id)->update([
            'token' => $token['data']['token'],
        ]);
$data->runWS();
$response = $data->runWS();
        set_time_limit(600);

    if (feeder_data_dosen_ajar::all()->count() >= 1 ){

  foreach ($response['data'] as $key => $value) {
  foreach ($data_kelas as $key_kelas => $value_kelas) {

  if ($value['id_prodi'] == $value_kelas['kode_jurusan']) {
   
  

        feeder_data_dosen_ajar::where('id',$key)->update([

            'semester' => $value['id_semester'],
            'nidn' => $value['nidn'],
            'nama_dosen' => $value['nama_dosen'],
            'kode_mk' => $value_kelas['kode_mk'],
            'nama_mk' => $value_kelas['nama_mk'],
            'nama_kelas' => $value_kelas['nama_kelas'],
            'rencana_tatap_muka' => '0',
            'tatap_muka_real' => '0',
            'kode_jurusan' => $value_kelas['kode_jurusan'],
            'sks_ajar' => $value['sks_substansi_total'],
            'status_error' => '0',
            'keterangan' => '0',
            'id_aktifitas_mengajar' => $value['id_aktivitas_mengajar'],
          ]);


        
        }
       }
      }
    }
    else{
  foreach ($response['data'] as $key => $value) {

  foreach ($data_kelas as $key_kelas => $value_kelas) {

  if ($value['id_prodi'] == $value_kelas['kode_jurusan']) {
   
  

        feeder_data_dosen_ajar::create([

            'semester' => $value['id_semester'],
            'nidn' => $value['nidn'],
            'nama_dosen' => $value['nama_dosen'],
            'kode_mk' => $value_kelas['kode_mk'],
            'nama_mk' => $value_kelas['nama_mk'],
            'nama_kelas' => $value_kelas['nama_kelas'],
            'rencana_tatap_muka' => '0',
            'tatap_muka_real' => '0',
            'kode_jurusan' => $value_kelas['kode_jurusan'],
            'sks_ajar' => $value['sks_substansi_total'],
            'status_error' => '0',
            'keterangan' => '0',
            'id_aktifitas_mengajar' => $value['id_aktivitas_mengajar'],
          ]);
 
       }
      }
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
            <th style="text-align:center">SKS MK</th>
            <th style="text-align:center">Kelas</th>
            <th style="text-align:center">Jurusan</th>
            <th style="text-align:center">THN Ajar</th>
            <th style="text-align:center">Nama Dosen</th>
            <th style="text-align:center">SKS Dosen</th>
            <th style="text-align:center">Status</th>

          </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            ?>
          <tr>
          
            @foreach($data_dosen as $key => $value)
            @if($value->data_mk_kurikulum !=null)          
            @if( $value->data_mk_kurikulum->kurikulum->kode_thn_ajaran == '20201')

            <td >{{ $no }}</td>
            <td  style="text-align:center">{{ $value['nama_mk'] }}</td>
            @if($value->data_mk !=null)
            <td  style="text-align:center">{{ $value->data_mk->bobot_mk }}</td>
            @else
            <td></td>
            @endif
            <td  style="text-align:center">{{ $value['nama_kelas'] }}</td>
            @if($value->data_mk !=null)          
            <td  style="text-align:center">{{ $value->data_mk->prodi_mk }}</td>
            @else
            <td></td>
            @endif
            @if($value->data_mk_kurikulum !=null)          
            <td  style="text-align:center"> {{$value->data_mk_kurikulum->kurikulum->kode_thn_ajaran}} </td>
            @else
            <td>{{$value->data_mk_kurikulum}}</td>
            @endif
            <td  style="text-align:center">{{ $value['nama_dosen'] }}</td>
            <td  style="text-align:center">{{ $value['sks_ajar'] }}</td>      
            <td> - </td>



          </tr>
          @else
          @endif
          @else
          @endif
          <?php
          $no++;
          ?>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</section>
<!-- <script>
  $(document).ready(function() {
    var nomor = 1;
    dt_url = `${url_api}/jurusan`;
    dt_opt = {
      "columnDefs": [{
        "aTargets": [0],
        "mData": null,
        "mRender": function(data, type, full) {
          res = nomor++;
          return res;
        }
      }, {
        "aTargets": [1],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['jurusan'];
          return res;
        }
      }, {
        "aTargets": [2],
        "mData": null,
        "mRender": function(data, type, full) {
          var kajur = (data['kajur']==null)?"-":data['kajur'];
          var gelar = (data['gelar']==null)?"":", "+data['gelar'];
          res = kajur+gelar;
          return res;
        }
      }, {
        "aTargets": [3],
        "mData": null,
        "mRender": function(data, type, full) {
          var id = data['nomor'];
          var text_hapus = data['jurusan'];
          var btn_update = `<i class="iconify edit-icon text-primary" onclick='update_btn(${id})' data-icon="bx:bx-edit-alt" ></i>`
          var btn_delete = `<i class="iconify delete-icon text-primary" data-icon="bx:bx-trash"  onclick='delete_btn(${id},"jurusan","jurusan","${text_hapus}")'></i>`;
          res = btn_update + " " + btn_delete;
          return res;
        }
      }, ]
    }
  });
</script> -->
@endsection