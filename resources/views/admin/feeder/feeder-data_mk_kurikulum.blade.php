@extends('layouts.main')

@section('content')

<?php
$data = new \App\Services\FeederDiktiApiService('GetMatkulKurikulum');
$data->runWS();
$response = $data->runWS();
use App\Models\feeder\feeder_data_mk_kurikulum;

$data_mk_kurikulum = feeder_data_mk_kurikulum::all();


    // dd($response['data']);


if(isset($_POST["konek"]))
{
        set_time_limit(600);

    if (feeder_data_mk_kurikulum::all()->count() >= 1 ){
  foreach ($response['data'] as $key => $value) {



        feeder_data_mk_kurikulum::where('id',1)->update([

            'kode_mk_kurikulum' => $key + 1,
            'kode_mk' => $value['kode_mata_kuliah'],
            'kode_kurikulum' => $value['id_kurikulum'],
            'semester' => $value['semester'],
            'status_mk' => $value['apakah_wajib'],
            'id_prodi_feeder' => $value['id_prodi'],
            'status_upload_mk_kurikulum' => 1,
            'keterangan_upload_mk_kurikulum' => 'SUKSES UPLOAD',

        


   
          ]);
      }
    }
    else{
  foreach ($response['data'] as $key => $value) {

         feeder_data_mk_kurikulum::create([
         
            'kode_mk_kurikulum' => $key + 1,
            'kode_mk' => $value['kode_mata_kuliah'],
            'kode_kurikulum' => $value['id_kurikulum'],
            'semester' => $value['semester'],
            'status_mk' => $value['apakah_wajib'],
            'id_prodi_feeder' => $value['id_prodi'],
            'status_upload_mk_kurikulum' => 1,
            'keterangan_upload_mk_kurikulum' => 'SUKSES UPLOAD',
   
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
            <td  style="text-align:center">{{ $value['kode_mk'] }}</td>
            <td  style="text-align:center">{{ $value->prodi }}</td>
     
            @if($value->kurikulum != null)
            <td  style="text-align:center">{{ $value->kurikulum->bobot_mk }}</td>
            <td  style="text-align:center">{{ $value->kurikulum->jenis_mata_kuliah }}</td>
            <td  style="text-align:center">{{ $value->kurikulum->nama_kurikulum }}</td>
             @else
            <td></td>
            @endif
            @if($value->prodi != null)
            <td  style="text-align:center">{{ $value->prodi->program }} {{ $value->prodi->nama_jurusan }}</td>
            @else
            <td></td>
            @endif
            <td  style="text-align:center">{{ $value['semester'] }}</td>
            <td  style="text-align:center">{{ $value['keterangan_upload_mk_kurikulum'] }}</td>
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