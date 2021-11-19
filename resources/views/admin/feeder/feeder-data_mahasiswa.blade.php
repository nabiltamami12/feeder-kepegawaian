@extends('layouts.main')

@section('content')

<?php
$data = new \App\Services\FeederDiktiApiService('GetDetailMataKuliah');
$data->runWS();
$response = $data->runWS();

  dd($response['data'] );


foreach ($response['data'] as $key => $value) {

if(isset($_POST["konek"]))
{
        set_time_limit(600);

    if (feeder_data_mk_kurikulum::all()->count() >= 1 ){
  foreach ($response['data'] as $key => $value) {



        feeder_data_mk_kurikulum::where('id',1)->update([

            'nama_pd' => $value[''],
            'jk' => $value[''],
            'nisn' => $value[''],
            'npwp' => $value[''],
            'nik' => $value[''],
            'tmpt_lahir' => $value[''],
            'tgl_lahir' => $value[''],
            'id_agama' => $value[''],
            'id_kk' => $value[''],
            'jln' => $value[''],
            'rt' => $value[''],
            'rw' => $value[''],
            'nama_dusun' => $value[''],
            'desa_kel' => $value[''],
            'id_wilayah' => $value[''],
            'id_jenis_tinggal' => $value[''],
            'id_alat_transportasi' => $value[''],
            'no_telp_rumah' => $value[''],
            'no_hp' => $value[''],
            'email' => $value[''],
            'a_terima_kps' => $value[''],
            'no_kps' => $value[''],
            'stat_pd' => $value[''],
            'nik_ayah' => $value[''],
            'nama_ayah' => $value[''],
            'tgl_lahir_ayah' => $value[''],
            'id_jenjang_pendidikan_ayah' => $value[''],
            'id_kebutuhan_khusus_ayah' => $value[''],
            'id_kebutuhan_khusus_ibu' => $value[''],
            'id_pekerjaan_ayah' => $value[''],
            'id_penghasilan_ayah' => $value[''],
            'nik_ibu' => $value[''],
            'nama_ibu' => $value[''],
            'tgl_lahir_ibu' => $value[''],
            'id_jenjang_pendidikan_ibu' => $value[''],
            'id_pekerjaan_ibu' => $value[''],
            'id_penghasilan_ibu' => $value[''],
            'nik_wali' => $value[''],
            'nama_wali' => $value[''],
            'tgl_lahir_wali' => $value[''],
            'id_jenjang_pendidikan_wali' => $value[''],
            'id_pekerjaan_wali' => $value[''],
            'id_penghasilan_wali' => $value[''],
            'kewarganegaraan' => $value[''],
            'kode_jurusan' => $value[''],
            'id_jenis_daftar' => $value[''],
            'nim' => $value[''],
            'tgl_masuk_sp' => $value[''],
            'mulai_smt' => $value[''],
            'id_pembayaran' => $value[''],
            'id_jalur_masuk' => $value[''],
            'status_error' => $value[''],
            'keteangan' => $value[''],
            'password' => $value[''],
            'biaya_masuk_kuliah' => $value[''],
            'id_reg_mahasiswa' => $value[''],
            'foto_mahasiswa' => $value[''],
            'status_mahasiswa' => $value[''],
            'kode_paket' => $value[''],

        


   
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
            <th style="text-align:center">NIM</th>
            <th style="text-align:center">Nama Mahasiswa</th>
            <th style="text-align:center">Prodi</th>                        
            <th style="text-align:center">Status</th>                        
            <th style="text-align:center">Keterangan</th>                        
            <th style="text-align:center">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>

            @foreach($response['data'] as $key => $value)


            <td >{{ $key + 1 }}</td>
            <td  style="text-align:center">{{ $value['kode_mata_kuliah'] }}</td>
            <td  style="text-align:center">{{ $value['nama_mata_kuliah'] }}</td>
            <td  style="text-align:center">{{ $value['sks_mata_kuliah'] }}</td>


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

            <td  style="text-align:center">{{ $value['nama_program_studi'] }}</td>
        
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