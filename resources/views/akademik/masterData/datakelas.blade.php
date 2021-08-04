@extends('layouts.mainAkademik')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__akademik container-fluid" id="akademik_datakelas">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">
        <div class="card-header p-0 m-0 border-0 rounded-0">

          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">Data Kelas</h2>
            </div>
            <div class="col text-right">
              <button type="button" class="btn--blue add-btn">
                <span class="iconify mr-2" onclick="add_btn()" data-icon="bx:bxs-plus-circle" data-inline="true"></span>
                Tambah
              </button>
            </div>
          </div>

          <hr class="mt">

          <div class="row align-items-center mt-0 padding--small py-0 filterSearch-data">
            <div class="col-sm-6 col-12">
              <div class="form-group row mb-0">
                <select class="form-control" id="dataperhalaman">
                  <option>10</option>
                  <option>20</option>
                  <option>30</option>
                </select>
                <label class="label-datashowperpage mb-0 ml-3" for="dataperhalaman">Data per Halaman</label>
              </div>
            </div>

            <div class="col-md-4 col-12 offset-md-2 offset-0 mt-md-0 mt-2 p-0 text-right">
              <label class="sr-only" for="searchdata">Search</label>
              <div class="input-group">
                <input type="search" class="form-control" id="searchdata" placeholder="Pencarian ...">
                <div class="input-group-prepend">
                  <div class="input-group-text search-icon">
                    <span class="iconify" data-icon="fluent:search-32-regular" data-inline="true"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="table-responsive">
          <table id="datatable" class="table align-items-center table-borderless table-flush table-hover">

            <thead class="table-header">
              <tr>
                <th scope="col" class="border-0 text-center p-2">No</th>
                <th scope="col" class="border-0">Prodi</th>
                <th scope="col" class="border-0">Nama</th>
                <th scope="col" class="border-0 text-center">Kode</th>
                <th scope="col" class="border-0 text-center">Wali Kelas</th>
                <th scope="col" class="border-0 text-center">Aksi</th>
              </tr>
            </thead>
            <!-- <tbody> -->

            <!-- <tbody class="table-body">
              <tr>
                <td class="text-center p-2">
                  1
                </td>
                <td>
                  Hukum
                </td>
                <td class="font--bold text-capitalize">
                  Pengantar hukum I
                </td>
                <td class="text-center">
                  HK001
                </td>
                <td class="text-center">
                  24
                </td>
                <td class="text-center">
                  kelas besar
                </td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt" data-inline="true"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center p-2">
                  2
                </td>
                <td>
                  Hukum
                </td>
                <td class="font--bold text-capitalize">
                  Pengantar hukum I
                </td>
                <td class="text-center">
                  HK002
                </td>
                <td class="text-center">
                  40
                </td>
                <td class="text-center">
                  kelas besar
                </td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt" data-inline="true"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center p-2">
                  3
                </td>
                <td>
                  Hukum
                </td>
                <td class="font--bold text-capitalize">
                  Pengantar hukum I
                </td>
                <td class="text-center">
                  HK003
                </td>
                <td class="text-center">
                  45
                </td>
                <td class="text-center">
                  kelas besar
                </td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt" data-inline="true"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center p-2">
                  4
                </td>
                <td>
                  Hukum
                </td>
                <td class="font--bold text-capitalize">
                  Pengantar hukum I
                </td>
                <td class="text-center">
                  HK004
                </td>
                <td class="text-center">
                  25
                </td>
                <td class="text-center">
                  kelas besar
                </td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt" data-inline="true"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center p-2">
                  5
                </td>
                <td>
                  Hukum
                </td>
                <td class="font--bold text-capitalize">
                  Pengantar hukum I
                </td>
                <td class="text-center">
                  HK005
                </td>
                <td class="text-center">
                  35
                </td>
                <td class="text-center">
                  kelas besar
                </td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt" data-inline="true"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center p-2">
                  6
                </td>
                <td>
                  Hukum
                </td>
                <td class="font--bold text-capitalize">
                  Pengantar hukum I
                </td>
                <td class="text-center">
                  HK006
                </td>
                <td class="text-center">
                  40
                </td>
                <td class="text-center">
                  kelas besar
                </td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt" data-inline="true"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center p-2">
                  7
                </td>
                <td>
                  Hukum
                </td>
                <td class="font--bold text-capitalize">
                  Pengantar hukum I
                </td>
                <td class="text-center">
                  HK007
                </td>
                <td class="text-center">
                  50
                </td>
                <td class="text-center">
                  kelas besar
                </td>
                <td class="text-center">
                </td> -->
              <!-- </tr>
            </tbody> -->
          </table>
        </div>

        <div class="row justify-content-between align-items-center table-information">
          <h3>Menampilkan 1 sampai 7 dari 7 total data</h3>
          <nav aria-label="pagination table">
            <ul class="pagination">
              <li class="page-item disabled" aria-label="Previous">
                <a class="page-link" href="#" tabindex="-1">
                  Previous
                </a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#">1<span class="sr-only">(current)</span></a>
              </li>
              <li class="page-item disabled" aria-label="Next">
                <a class="page-link" href="#">
                  Next
                </a>
              </li>
            </ul>
          </nav>
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
      url: `${url_api}/kelas`,
      type: 'GET',
      data: {},
      headers: {
        "Authorization": window.localStorage.getItem('token')
      },
    },
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
          res = data['nama_program']+" "+data['nama_jurusan'];
          return res;
        }
      },{
        "aTargets": [2],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['kelas']+" "+data['pararel'];
          return res;
        }
      },{
        "aTargets": [3],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['kode'];
          return res;
        }
      },{
        "aTargets": [4],
        "mData": null,
        "mRender": function(data, type, full) {
          res = data['wali_kelas'];
          return res;
        }
      },{
        "aTargets": [5],
        "mData": null,
        "mRender": function(data, type, full) {
          var id = data['nomor'];
          var text_hapus = data['kode'];
          var btn_update = `<span class="iconify edit-icon" onclick='update_btn(${id})' data-icon="bx:bx-edit-alt" data-inline="true"></span>` 
          var btn_delete = `<span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true" onclick='delete_btn(${id},"kelas","kelas","${text_hapus}")'></span>`; 
          res = btn_update+" "+btn_delete;
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