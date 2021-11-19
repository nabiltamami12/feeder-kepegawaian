@extends('layouts.main')

@section('content')

<?php
$data = new \App\Services\FeederDiktiApiService('GetMatkulKurikulum');
$data->runWS();
$response = $data->runWS();
use App\Models\feeder\feeder_data_mk_kurikulum;

$data_mk_kurikulum = feeder_data_mk_kurikulum::all();


    dd($response['data']);


if(isset($_POST["konek"]))
{
        set_time_limit(600);

    if (feeder_data_mk_kurikulum::all()->count() >= 1 ){
  foreach ($response['data'] as $key => $value) {

      // "id_kurikulum" => "7082d3d2-8a3b-4d48-9c97-1aee9bc0f5fe"
      // "nama_kurikulum" => "FISIP GANJIL 2019"
      // "id_prodi" => "a9d7728d-1f3a-4977-9478-aba84333eb44"
      // "nama_program_studi" => "S1 Ilmu Administrasi Negara"
      // "id_semester" => "20191"
      // "semester_mulai_berlaku" => "2019/2020 Ganjil"
      // "jumlah_sks_lulus" => "88"
      // "jumlah_sks_wajib" => "88"
      // "jumlah_sks_pilihan" => "0"


        feeder_data_mk_kurikulum::where('id',1)->update([

   'kode_mk_kurikulum' => $key -1,
            'kode_mk' => $value[''],
            'kode_kurikulum' => $value[''],
            'semester' => $value[''],
            'status_mk' => $value[''],
            'id_prodi_feeder' => $value[''],
            'status_upload_mk_kurikulum' => $value[''],
            'keterangan_upload_mk_kurikulum' => $value[''],

        


   
          ]);
      }
    }
    else{
  foreach ($response['data'] as $key => $value) {

         feeder_data_mk_kurikulum::create([
         

   
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
            <th style="text-align:center">Kode MK</th>
            <th style="text-align:center">Nama MK</th>                        
            <th style="text-align:center">Bobot</th>                        
            <th style="text-align:center">Jenis </th>                        
            <th style="text-align:center">Nama Kurikulum</th>
            <th style="text-align:center">Program Studi</th>
            <th style="text-align:center">Semester</th>
            <th style="text-align:center">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>

            @foreach($data_mk_kurikulum as $key => $value)


            <td >{{ $key + 1 }}</td>
            <td  style="text-align:center">{{ $value['nama_kurikulum'] }}</td>
            <td  style="text-align:center">{{ $value['kode_jurusan'] }}</td>
            <td  style="text-align:center">{{ $value['kode_thn_ajaran '] }}</td>
            <td  style="text-align:center">{{ $value['jum_sks'] }}</td>


            @if($value['status'] == 1)
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