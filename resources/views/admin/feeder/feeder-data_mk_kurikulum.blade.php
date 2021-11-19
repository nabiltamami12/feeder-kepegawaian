@extends('layouts.main')

@section('content')

<?php
$data = new \App\Services\FeederDiktiApiService('GetDetailMataKuliah');
$data->runWS();
$response = $data->runWS();
use App\Models\feeder\feeder_data_mata_kuliah;

$data_mata_kuliah = feeder_data_mata_kuliah::all();


    // dd($response['data']);


if(isset($_POST["konek"]))
{
        set_time_limit(600);

    if (feeder_data_mata_kuliah::all()->count() >= 1 ){
  foreach ($response['data'] as $key => $value) {



        feeder_data_mata_kuliah::where('id',1)->update([

          'nama_mk'=> $value['nama_mata_kuliah'],
          'jenis_mata_kuliah'=> $value['id_jenis_mata_kuliah'],
          'bobot_mk'=> $value['sks_mata_kuliah'],
          'bobot_tatap_muka'=> $value['sks_tatap_muka'],
          'bobot_pratikum'=> $value['sks_praktek'],
          'bobot_praktek_lapangan'=> $value['sks_praktek_lapangan'],
          'bobot_simulasi'=> $value['sks_simulasi'],
          'id_mk'=> $value['id_matkul'],
          'kode_mk'=> $value['kode_mata_kuliah'],
          'prodi_mk'=> $value['nama_program_studi'],
   
          ]);
      }
    }
    else{
  foreach ($response['data'] as $key => $value) {

         feeder_data_mata_kuliah::create([
                'nama_mk'=> $value['nama_mata_kuliah'],
          'jenis_mata_kuliah'=> $value['id_jenis_mata_kuliah'],
          'bobot_mk'=> $value['sks_mata_kuliah'],
          'bobot_tatap_muka'=> $value['sks_tatap_muka'],
          'bobot_pratikum'=> $value['sks_praktek'],
          'bobot_praktek_lapangan'=> $value['sks_praktek_lapangan'],
          'bobot_simulasi'=> $value['sks_simulasi'],
          'id_mk'=> $value['id_matkul'],
          'kode_mk'=> $value['kode_mata_kuliah'],
          'prodi_mk'=> $value['nama_program_studi'],
   
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
            <th style="text-align:center">Kode</th>
            <th style="text-align:center">Nama Mata Kuliah</th>
            <th style="text-align:center">Bobot MK</th>                        
            <th style="text-align:center">Jenis MK</th>                        
            <th style="text-align:center">Prodi MK</th>                        
            <th style="text-align:center">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>

            @foreach($data_mata_kuliah as $key => $value)


            <td >{{ $key + 1 }}</td>
            <td  style="text-align:center">{{ $value['kode_mk'] }}</td>
            <td  style="text-align:center">{{ $value['nama_mk'] }}</td>
            <td  style="text-align:center">{{ $value['bobot_mk'] }}</td>


            @if($value['id_jenis_mata_kuliah'] == "A")
            <td  style="text-align:center">WAJIB PROGRAM STUDI</td>

            @elseif($value['id_jenis_mata_kuliah'] == "B")

            <td  style="text-align:center">PILIHAN</td>

            @elseif($value['id_jenis_mata_kuliah'] == "C")

            <td  style="text-align:center">PEMINATAN</td>

            @elseif($value['id_jenis_mata_kuliah'] == "S")

            <td  style="text-align:center">TUGAS AKHIR/SKRIPSI/TESIS/DISERTASI</td>

            @else

            <td  style="text-align:center">WAJIB NASIONAL</td>

            @endif

            <td  style="text-align:center">{{ $value['prodi_mk'] }}</td>
        
            @if($value['id_matkul'] != null)

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