@extends('layouts.main')

@section('content')

<?php
use App\Models\feeder\config_feeder;
$token_id = config_feeder::first();

// $data = new \App\Services\FeederDiktiApiService("GetProfilPT");

$data = new \App\Services\FeederDiktiApiService('GetDosenPengajarKelasKuliah');
$token = $data->getToken();
   config_feeder::where('id',$token_id->id)->update([
            'token' => $token['data']['token'],
 
        ]);
$data->runWS();
$response = $data->runWS();

  // dd($token);
  dd($response['data'] );
  "id_aktivitas_mengajar" => "001c8f4d-d468-4af4-a793-7e113a5f1c5f"
    "id_registrasi_dosen" => "806408d2-a2c1-42af-a0d3-316b1308b30a"
    "id_dosen" => "d558ecde-84ae-4a0f-8a86-4f52b5f66274"
    "nidn" => "0710126901"
    "nama_dosen" => "RIO SUDIRMAN"
    "id_kelas_kuliah" => "61ab1c1f-755f-4919-acae-813fb24c84b8"
    "nama_kelas_kuliah" => "02"
    "id_substansi" => null
    "sks_substansi_total" => "3.00"
    "rencana_minggu_pertemuan" => "14"
    "realisasi_minggu_pertemuan" => "14"
    "id_jenis_evaluasi" => "1"
    "nama_jenis_evaluasi" => "Evaluasi Akademik"
    "id_prodi" => "e48035e4-b3b4-489b-a01e-5f7ca23d5869"
    "id_semester" => "20141"

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