@extends('layouts.mainAkademik')

@section('content')

<!-- Header -->
<header class="header">

</header>

<!-- Page content -->
<section class="page-content page-content__akademik container-fluid" id="akademik_datadosen">
  <div class="row">
    <div class="col-xl-12">
      <div class="card padding--small">

        <div class="card-header p-0 m-0 border-0 rounded-0">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">Data Dosen Pengampu</h2>
            </div>
          </div>

          <hr class="mt">

          <div class="row align-items-center card-header__filter-search">
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <div class="col-2 pr-6">
                  <select class="form-control m-0" id="dataperhalaman">
                    <option>10</option>
                    <option>20</option>
                    <option>30</option>
                  </select>
                </div>
                <div class="col-sm-6 col-7 ml-3 ml-md-0">
                  <label class="dataperhalaman" for="dataperhalaman">Data per Halaman</label>
                </div>
              </div>
            </div>

            <div class="col-md-4 col-12 offset-md-2 offset-0 mt-md-0 mt-2 text-right">
              <label class="sr-only" for="searchdata">Search</label>
              <div class="input-group search-group">
                <input type="search" class="form-control" id="searchdata" placeholder="Pencarian ...">
                <div class="input-group-prepend">
                  <div class="input-group-text search-icon"><img src="/images/search-icon.png" alt=""></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col">NO</th>
                <th scope="col">Dosen</th>
                <th scope="col">Jumlah Matakuliah</th>
                <th scope="col">AKSI</th>
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
<script>
$(document).ready(function() {
  var nomor = 1;
dt = $('#datatable').DataTable({
    "processing": true,
    "ajax": {
      url: `${url_api}/dosenpengampu`,
      type: 'GET',
      data: {},
      headers: {
        "Authorization": window.localStorage.getItem('token')
      },
    },
    pageLength: 10,
    filter: true,
    deferRender: true,
    scrollCollapse: true,
    scroller: true,
    "searching": true,
    "aoColumnDefs": [
      {
        "aTargets": [0],
        "mData": null,
        "mRender": function(data, type, full) {
          res = nomor++;
          return res;
        }
      },{
        "aTargets": [1],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['nama'];
          return res;
        }
      },{
        "aTargets": [2],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['jumlah_matkul'];
          return res;
        }
      },{
        "aTargets": [3],
        "mData": null,
        "mRender": function(data, type, full) {
          var id = data['nomor'];
          var text_hapus = data['jurusan'];
          var btn_update = `<span class="iconify edit-icon" onclick='update_btn(${id})' data-icon="bx:bx-edit-alt" data-inline="true"></span>` 
          res = btn_update;
          return res;
        }
      },
    ],
    "sDom": 'lrtip',
    "lengthChange": false,
    "info": false,
    "language": {
      "paginate": {
        "next": '&gt;',
        "previous": '&lt;'
      },
      "processing": "Loading ..."
    }
  })
  dt.on('order.dt search.dt', function() {
    dt.column(0, {
      search: 'applied',
      order: 'applied'
    }).nodes().each(function(cell, i) {
      cell.innerHTML = i + 1;
    });
  }).draw();

  $('#searchdata').on('keyup', function() {
    dt.search(this.value).draw();
  });
} );
</script>
@endsection