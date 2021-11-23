@extends('layouts.main')

@section('content')

<?php
$data = new \App\Services\FeederDiktiApiService('GetListPerkuliahanMahasiswa');
$data->runWS();
$response = $data->runWS();
use App\Models\feeder\feeder_data_dosen;

$data_data_dosen = feeder_data_dosen::all();

  dd($response['data'][0] );

    // "id_registrasi_mahasiswa" => "10f3bbd8-cfb9-4acf-a8d3-885460841b87"
    // "nim" => "31144762"
    // "nama_mahasiswa" => "ZAKY FADHLIAN AZHAR"
    // "id_prodi" => "dc58b908-37d4-46bb-8eed-255dfbf2806f"
    // "nama_program_studi" => "S1 Manajemen"
    // "angkatan" => "2014"
    // "id_periode_masuk" => "20141"
    // "id_semester" => "20202"
    // "nama_semester" => "2020/2021 Genap"
    // "id_status_mahasiswa" => "N"
    // "nama_status_mahasiswa" => "Non-Aktif                           "
    // "ips" => "0"
    // "ipk" => "0"
    // "sks_semester" => "0"
    // "sks_total" => "0"
    // "biaya_kuliah_smt" => "0.00"

      
if(isset($_POST["konek"]))
{
        set_time_limit(600);

    if (feeder_data_dosen::all()->count() >= 1 ){
  foreach ($response['data'] as $key => $value) {

  

        feeder_data_dosen::where('id',1)->update([

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

            @foreach($data_data_dosen as $key => $value)


            <td >{{ $key + 1 }}</td>
            <td  style="text-align:center">{{ $value['nip'] }}</td>
            <td  style="text-align:center">{{ $value['nidn'] }}</td>
            <td  style="text-align:center">{{ $value['nama_dosen'] }}</td>
            <td  style="text-align:center"> - </td>

          @if($value['id_status_dosen'] == 1)

            <td  style="text-align:center">AKTIF</td>
       
            @else

            <td  style="text-align:center"></td>

            @endif

            @if($value['id_dosen_feeder'] != null)

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