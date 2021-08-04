@extends('layouts.mainProdi')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content page-content__prodi container-fluid" id="prodi_nilaimahasiswa">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">

        <div class="card-header p-0 m-0 border-0 rounded-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-6">
              <h2 class="mb-0 text-center text-md-left">Data Mahasiswa</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right mt-3 mt-md-0">
              <button type="button" class="btn--blue">
                <span class="iconify" data-icon="bx:bxs-plus-circle" data-inline="true"></span>
                Tambah
              </button>
              <button type="button" class="btn--blue mx-1 mx-md-3">
                <span class="iconify" data-icon="bx:bx-download" data-inline="true"></span>
                Import
              </button>
              <button type="button" class="btn--blue">
                <span class="iconify" data-icon="bx:bx-upload" data-inline="true"></span>
                Eksport
              </button>
            </div>
          </div>

          <hr class="mt">

          <form class="form-select rounded-0">
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="program-studi">Program Studi</label>
                <select class="form-control" id="program-studi">
                  <option>Ilmu Kedokteran Gigi Anak</option>
                  <option>Ilmu Kedokteran Gigi Anak</option>
                </select>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <label for="tahun">Tahun</label>
                <select class="form-control" id="tahun">
                  <option>2020</option>
                  <option>2021</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="semester">Semester</label>
                <select class="form-control" id="semester">
                  <option>Semua</option>
                  <option>Semester 1</option>
                </select>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <label for="jenjang">Jenjang</label>
                <select class="form-control" id="jenjang">
                  <option>Semua</option>
                  <option>Jenjang 1</option>
                </select>
              </div>
            </div>
          </form>

          <div class="row align-items-center padding--small py-0 filterSearch-data">
            <div class="col-sm-6 col-12">
              <div class="form-group row">
                <select class="form-control" id="dataperhalaman">
                  <option>10</option>
                  <option>20</option>
                  <option>30</option>
                </select>
                <label class="label-datashowperpage ml-3" for="dataperhalaman">Data per Halaman</label>
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
          <table class="table align-items-center table-flush table-borderless table-hover">
            <thead class="table-header">
              <tr>
                <th scope="col" class="border-0 text-center px-2">NIM</th>
                <th scope="col" class="border-0" style="width: 25%">nama</th>
                <th scope="col" class="border-0" style="width: 25%">Mata kuliah</th>
                <th scope="col" class="border-0">Kategori</th>
                <th scope="col" class="border-0 text-center">Nilai</th>
                <th scope="col" class="border-0 text-center">Aksi</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center px-2">351321090</td>
                <td class="text-capitalize">fatimah azzahra</td>
                <td class="font--bold text-capitalize">Bahasa Inggris</td>
                <td>tugas harian</td>
                <td class="text-center">98</td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt" data-inline="true"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">351321090</td>
                <td class="text-capitalize">fatimah azzahra</td>
                <td class="font--bold text-capitalize">Bahasa Indonesia</td>
                <td>quiz</td>
                <td class="text-center">67</td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt" data-inline="true"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">351321090</td>
                <td class="text-capitalize">fatimah azzahra</td>
                <td class="font--bold text-capitalize">Pengantar perkuliahan I</td>
                <td>tugas harian</td>
                <td class="text-center">78</td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt" data-inline="true"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">351321090</td>
                <td class="text-capitalize">fatimah azzahra</td>
                <td class="font--bold text-capitalize">Pengantar perkuliahan II</td>
                <td>tugas harian</td>
                <td class="text-center">88</td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt" data-inline="true"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">351321090</td>
                <td class="text-capitalize">fatimah azzahra</td>
                <td class="font--bold text-capitalize">Matematika Dasar</td>
                <td>tugas harian</td>
                <td class="text-center">84</td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt" data-inline="true"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">351321090</td>
                <td class="text-capitalize">fatimah azzahra</td>
                <td class="font--bold text-capitalize">Matematika Lanjutan</td>
                <td>tugas harian</td>
                <td class="text-center">85</td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt" data-inline="true"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">351321090</td>
                <td class="text-capitalize">fatimah azzahra</td>
                <td class="font--bold text-capitalize">ilmu gigi I</td>
                <td>tugas harian</td>
                <td class="text-center">80</td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt" data-inline="true"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">351321090</td>
                <td class="text-capitalize">fatimah azzahra</td>
                <td class="font--bold text-capitalize">ilmu gigi II</td>
                <td>quiz</td>
                <td class="text-center">91</td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt" data-inline="true"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
                </td>
              </tr>

              <tr>
                <td class="text-center px-2">351321090</td>
                <td class="text-capitalize">fatimah azzahra</td>
                <td class="font--bold text-capitalize">ilmu gigi III</td>
                <td>quiz</td>
                <td class="text-center">74</td>
                <td class="text-center">
                  <span class="iconify edit-icon" data-icon="bx:bx-edit-alt" data-inline="true"></span>
                  <span class="iconify delete-icon" data-icon="bx:bx-trash" data-inline="true"></span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="row justify-content-between align-items-center table-information">
          <h3>Menampilkan 1 sampai 9 dari 9 total data</h3>
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
@endsection