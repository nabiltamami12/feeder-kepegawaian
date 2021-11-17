@extends('layouts.main')

@section('content')

<?php
$data = new \App\Services\FeederDiktiApiService('GetProdi');
$data->runWS();
$response = $data->runWS();

use App\Models\feeder\feeder_jurusan;

$data_jurusan = feeder_jurusan::all();



    // dd($response['data'][0] );
  if (feeder_jurusan::all()->count() >= 1 ){
foreach ($response['data'] as $key => $value) {

      feeder_jurusan::where('id',1)->update([
       'kode_jurusan' => $response['data'][$key]['kode_program_studi'],
        'nama_jurusan' => $response['data'][$key]['nama_program_studi'],
        // 'kode_fakultas', 
        'program' => $response['data'][$key]['nama_jenjang_pendidikan'],
        // 'kaprodi',
        // 'akreditasi',
        // 'sk_ban__pt',
        // 'tgl_akhir_sk',
        // 'nip_kaprodi',
        'id_prodi' => $response['data'][$key]['id_prodi'],
        'status_prodi' => $response['data'][$key]['status'],
        // 'model_perwalian',
 
        ]);
    }
  }
  else{
foreach ($response['data'] as $key => $value) {

       feeder_jurusan::create([
       'kode_jurusan' => $response['data'][$key]['kode_program_studi'],
        'nama_jurusan' => $response['data'][$key]['nama_program_studi'],
        // 'kode_fakultas', 
        'program' => $response['data'][$key]['nama_jenjang_pendidikan'],
        // 'kaprodi',
        // 'akreditasi',
        // 'sk_ban__pt',
        // 'tgl_akhir_sk',
        // 'nip_kaprodi',
        'id_prodi' => $response['data'][$key]['id_prodi'],
        'status_prodi' => $response['data'][$key]['status'],
        // 'model_perwalian',
 
        ]);
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
    CATATAN : JIKA TERDAPAT JURUSAN YANG BELUM MEMILIKI ID JURUSAN DAN STATUS JURUSAN KLIK AMBIL DATA DARI FEEDER.
        <div class="card-header p-0 m-0 border-0">
          <div class=" row align-items-center">
            <div class="col">
         

           </div>
           <div class="col text-right">

             

           </div>
         </div>

         <hr class="mt">
       </div>

       <div class="box-body table-responsive">     
        <table class="table table-striped table-responsive table-bordered">
          <thead >
            <tr>
              <th style="text-align:center">No</th>
              <th style="text-align:center">Kode</th>
              <th style="text-align:center">Nama Jurusan</th>
              <th style="text-align:center">Status Jurusan</th>                       
              <th style="text-align:center">Program</th>                        
              <th style="text-align:center">Id Jurusan Di Feeder</th>
            </tr>
          </thead>
          <tbody>
<tr>

            @foreach($data_jurusan as $key => $value)


            <td  style="text-align:center">{{ $key + 1 }}</td>
            <td  style="text-align:center">{{ $value['kode_jurusan'] }}</td>
            <td  style="text-align:center">{{ $value['nama_jurusan'] }}</td>
            <td  style="text-align:center">{{ $value['status_prodi'] }}</td>
            <td  style="text-align:center">{{ $value['program'] }}</td>
            <td  style="text-align:center">{{ $value['id_prodi'] }}</td>



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