@extends('layouts.main')

@section('content')

<?php

$data = new \App\Services\FeederDiktiApiService("GetProfilPT");
$data->runWS();
$response = $data->runWS();



foreach($response['data'] as $key => $value) {
    # dd($response);

       # return view('admin.feeder.index',['data'=> $value]);
}
?>

<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="card padding--small">

        <div class="card-header p-0 m-0 border-0">
          <div class=" row align-items-center">
            <div class="col">
                <?php
            foreach ($response['data'] as $key => $value) {
  
              $token = $value['id_perguruan_tinggi'];

            if($token == "")
            {
              echo '
              <div class="callout callout-danger">
              <h4>STATUS FEEDER : BELUM TERKONEKSI</h4>
              </div>
              ';
            }
            else
            {
              echo '
              <div class="callout callout-success">
              <h4>STATUS FEEDER : TERKONEKSI</h4>
              </div>
              ';
            }
          }
            ?>  
            </div>
            <div class="col text-right">

             <!--          <button type="button" onclick="add_btn()" class="btn btn-primary "><i class="iconify-inline mr-1" data-icon='bx:bx-plus-circle'></i>Tambah</button> -->

           </div>
         </div>

         <hr class="mt">
       </div>

       <div class="table-responsive">
        <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
          <thead class="table-header">


            <tr>
             <div class="box box-primary">

              <form role="form" action="" method="POST">
                @foreach($response['data'] as $key => $value)    
                <div class="box-body">

                  <div class="form-group">
                    <label>ID Perguruan Tinggi</label>
                    <input type="text" name="id" value="<?php echo $value['id_perguruan_tinggi']; ?>" class="form-control" readonly autofocus>
                  </div>
                  <div class="form-group">
                    <label>Username Feeder</label>
                    <input type="text" name="username" value="<?php echo  env('feeder_username'); ?>" class="form-control" autofocus required>
                  </div>
                  <div class="form-group">
                    <label>Password Feeder</label>
                    <input type="text" name="password" value="<?php echo env('feeder_password'); ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>URL Feeder</label>
                    <input type="text" name="url" value="<?php echo substr(env('feeder_url'),7,12) ; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>PORT</label>
                    <input type="text" name="port" value="8082" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Kode Perguruan Tinggi</label>
                    <input type="text" name="kodept" value="<?php echo $value['kode_perguruan_tinggi'] ; ?>" class="form-control" required>
                  </div>
                </div>
                @endforeach

                <div class="box-footer pt-5 ml-4">
                  <button type="submit" name="konek" class="btn btn-danger"><i class="fa fa-retweet"></i> UPDATE KONEKSI</button>
                </div>
              </form>
            </div>
          </section>
        </div>
      </tr>
    </thead>
    <tbody>

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