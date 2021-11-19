@extends('layouts.main')

@section('content')

<?php
$data = new \App\Services\FeederDiktiApiService('GetDetailKelasKuliah');
$data->runWS();
$response = $data->runWS();

        set_time_limit(1200);


  dd($response['data']);



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

@endsection