@extends('layouts.main')

@section('content')

<?php

use App\Models\feeder\config_feeder;



$data = new \App\Services\FeederDiktiApiService("GetProfilPT");
$data->runWS();
$response = $data->runWS();
$token = $data->getToken();
$data_config = config_feeder::all();

    # dd( $response['data'][0]);


$token = $token['data']['token'];
$id = $response['data'][0]['id_perguruan_tinggi'];

    # dd($token['data']['token']);

if(isset($_POST["konek"]))
{

              $username =  $_POST["username"];
              $password = $_POST["password"];
              $url = $_POST["url"];
              $port =  $_POST["port"];

  if (config_feeder::all()->count() > 0 ){

      config_feeder::where('id',1)->update([
            'username' => $_POST["username"],
            'password' => $_POST["password"],
            'url' => $_POST["url"],
            'port' => $_POST["port"],
            'kode_pt' => $_POST["kodept"],
            'id_pt' => $_POST["id"],
            'token' => $token['data']['token'],
 
        ]);

  }
    
  else{
        
        foreach($response['data']  as $key => $value)   {

           config_feeder::create([
                'username' => $username,
                'password' => $password,
                'url' => $url,
                'port' => $port,
                'kode_pt' => $value["kode_perguruan_tinggi"],
                'id_pt' => $value["id_perguruan_tinggi"],
                'token' => $token,
         
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
              @csrf
                @if (config_feeder::all()->count() > 0)
              
                @foreach($data_config as $key => $value) 
                <div class="box-body">

                  <div class="form-group">
                    <label>ID Perguruan Tinggi</label>
                    <input type="text" name="id" value="<?php echo $value['id_pt']; ?>" class="form-control" readonly autofocus>
                  </div>
                  <div class="form-group">
                    <label>Username Feeder</label>
                    <input type="text" name="username" value="<?php echo  $value['username']; ?>" class="form-control" autofocus required>
                  </div>
                  <div class="form-group">
                    <label>Password Feeder</label>
                    <input type="text" name="password" value="<?php echo $value['password']; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>URL Feeder</label>
                    <input type="text" name="url" value="<?php echo $value['url']; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>PORT</label>
                    <input type="text" name="port" value="<?php echo $value['port'] ; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Kode Perguruan Tinggi</label>
                    <input type="text" name="kodept" value="<?php echo $value['kode_pt'] ; ?>" class="form-control" required>
                  </div>
                </div>
               
                @endforeach
                @else
                <div class="box-body">
                  <div class="form-group">
                    <label>ID Perguruan Tinggi</label>
                    <input type="text" name="id" value="<?php echo $id; ?>" class="form-control" readonly autofocus>
                  </div>
                  <div class="form-group">
                    <label>Username Feeder</label>
                    <input type="text" name="username" value="" class="form-control" autofocus required>
                  </div>
                  <div class="form-group">
                    <label>Password Feeder</label>
                    <input type="text" name="password" value="" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>URL Feeder</label>
                    <input type="text" name="url" value="" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>PORT</label>
                    <input type="text" name="port" value="" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Kode Perguruan Tinggi</label>
                    <input type="text" name="kodept" value="" class="form-control" required>
                  </div>
                </div>
                @endif
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