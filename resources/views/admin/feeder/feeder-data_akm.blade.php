@extends('layouts.main')

@section('content')

<?php
$data = new \App\Services\FeederDiktiApiService('GetListPerkuliahanMahasiswa');
$data->runWS();
$response = $data->runWS();
use App\Models\feeder\feeder_data_akm;

$data_data_dosen = feeder_data_akm::all();

  // dd($response['data'][0] );

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

      
// if(isset($_POST["konek"]))
// {
        set_time_limit(600);

    if (feeder_data_akm::all()->count() >= 1 ){
  foreach ($response['data'] as $key => $value) {

  

        feeder_data_akm::where('id',1)->update([

          'semester' => $value['id_semester'],
            'nim' => $value['nim'],
            'nama' => $value['nama_mahasiswa'],
            'ips' => $value['ips'],
            'ipk' => $value['ipk'],
            'sks_smt' => $value['sks_semester'],
            'sks_total' => $value['sks_total'],
            'kode_jurusan' => $value['id_prodi'],
            'status_kuliah' => $value['id_status_mahasiswa'],
            'status_error' => '0',
            'valid' => '0',
            'keterangan' => '',

        


   
          ]);
      }
    }
    else{
  foreach ($response['data'] as $key => $value) {

         feeder_data_akm::create([
         
            'semester' => $value['id_semester'],
            'nim' => $value['nim'],
            'nama' => $value['nama_mahasiswa'],
            'ips' => $value['ips'],
            'ipk' => $value['ipk'],
            'sks_smt' => $value['sks_semester'],
            'sks_total' => $value['sks_total'],
            'kode_jurusan' => $value['id_prodi'],
            'status_kuliah' => $value['id_status_mahasiswa'],
            'status_error' => '0',
            'valid' => '0',
            'keterangan' => '',

   
          ]);
            }
        
     
  }
// }
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
            <th style="text-align:center">NIM</th>
            <th style="text-align:center">NAMA MAHASISWA</th>
            <th style="text-align:center">JURUSAN</th>
            <th style="text-align:center">SEMESTER</th>
            <th style="text-align:center">STS AKM</th>
            <th style="text-align:center">STS</th>
            <th style="text-align:center">IPS</th>
            <th style="text-align:center">IPK</th>
            <th style="text-align:center">STATUS</th>
            <th style="text-align:center">KETERANGAN</th>
          </tr>
        </thead>
        <tbody>
          <tr>


NO. NIM NAMA MAHASISWA  JURUSAN SEMESTER  STS AKM STS IPS IPK STATUS  KETERANGAN            @foreach($data_data_dosen as $key => $value)


            <td >{{ $key + 1 }}</td>
            <td  style="text-align:center">{{ $value['nim'] }}</td>
            <td  style="text-align:center">{{ $value['nama'] }}</td>
            <td  style="text-align:center"> - </td>
            <td  style="text-align:center"> - </td>
            <td  style="text-align:center"> - </td>
            <td  style="text-align:center"> - </td>
            <td  style="text-align:center"> {{ $value['ips'] }} </td>
            <td  style="text-align:center"> {{ $value['ipk'] }} </td>
            <td  style="text-align:center"> {{ $value['status_kuliah'] }} </td>
            <td  style="text-align:center"> SUKSES </td>

          

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