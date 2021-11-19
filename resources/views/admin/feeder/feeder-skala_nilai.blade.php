@extends('layouts.main')

@section('content')

<?php
$data = new \App\Services\FeederDiktiApiService('GetListSkalaNilaiProdi');
$data->runWS();
$response = $data->runWS();



use App\Models\feeder\feeder_skala_nilai;

$data_skala_nilai = feeder_skala_nilai::with('jurusan')->get();


    // dd($data_skala_nilai->jurusan->nama_jurusan);


if(isset($_POST["konek"]))
{
    if (feeder_skala_nilai::all()->count() >= 1 ){
  foreach ($response['data'] as $key => $value) {

        feeder_skala_nilai::where('id',1)->update([
          'nilai_huruf' => $value['nilai_huruf'],
            'nilai_indeks' => $value['nilai_indeks'],
            'bobot_nilai_min' => $value['bobot_minimum'],
            'bobot_nilai_maks' => $value['bobot_maksimum'],
           'tgl_mulai_efektif' => $value['tanggal_mulai_efektif'],
           'tgl_akhir_efektif' => $value['tanggal_akhir_efektif'],
            'kode_jurusan' => $value['id_prodi'],
            'id_bobot_nilai' => $value['id_bobot_nilai'],
   
          ]);
      }
    }
    else{
  foreach ($response['data'] as $key => $value) {

         feeder_skala_nilai::create([
          'nilai_huruf' => $value['nilai_huruf'],
            'nilai_indeks' => $value['nilai_indeks'],
            'bobot_nilai_min' => $value['bobot_minimum'],
            'bobot_nilai_maks' => $value['bobot_maksimum'],
           'tgl_mulai_efektif' => $value['tanggal_mulai_efektif'],
           'tgl_akhir_efektif' => $value['tanggal_akhir_efektif'],
            'kode_jurusan' => $value['id_prodi'],
            'id_bobot_nilai' => $value['id_bobot_nilai'],
   
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
     DOWNLOAD DAN UPLOAD DATA SKALA NILAI KE FEEDER
           <hr class="mt">
    
        <div class="card-header p-0 m-0 border-0">
          <div class=" row align-items-center">
           <div class="col text-right">
              <form role="form" action="" method="POST">
                @csrf
                  <button type="submit" name="konek" class="btn btn-sm btn-flat btn-default"><i class="fa fa-cloud-download"></i> DOWNLOAD FEEDER</button>
              </form>
           </div>
         </div>
       </div>

       <div class="box-body table-responsive">     
        <table class="table table-striped table-responsive table-bordered">
          <thead >
            <tr>
              <th style="text-align:center">No</th>
              <th style="text-align:center">Program Studi</th>
              <th style="text-align:center">Nilai Huruf</th>
              <th style="text-align:center">Nilai Huruf</th>                 
              <th style="text-align:center">Bobot Minimum</th>                        
              <th style="text-align:center">Bobot Maximum</th>                        
              <th style="text-align:center">Tgl Mulai</th>
              <th style="text-align:center">Tgl Akhir</th>
              <th style="text-align:center">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>

            @foreach($data_skala_nilai as $key => $value)
              <td >{{ $key + 1 }}</td>
              <td >{{ $value->jurusan }}</td> 
              <td  style="text-align:center">{{ $value->nilai_huruf }}</td>
              <td  style="text-align:center">{{ $value->nilai_indeks }}</td>
              <td  style="text-align:center">{{ $value->bobot_nilai_min }}</td>
              <td  style="text-align:center">{{ $value->bobot_nilai_maks }}</td>
              <td  style="text-align:center">{{ $value->tgl_mulai_efektif }}</td>
              <td  style="text-align:center">{{ $value->tgl_akhir_efektif }}</td>
              @php
              $exp = date('today');
          @endphp

              @if($value->tgl_mulai_efektif == $exp)
              <td  style="text-align:center">Sudah Ada</td>
            @else
            <td  style="text-align:center">Sudah Ada</td>
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