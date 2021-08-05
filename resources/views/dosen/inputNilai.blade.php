@extends('layouts.mainDosen')

@section('content')
<!-- Header -->
<header class="header"></header>

<!-- Page content -->
<section class="page-content container-fluid" id="dosen_inputnilai">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow padding--small">

        <div class="card-header p-0 m-0 border-0">
          <div class="row align-items-center">
            <div class="col-12 col-md-3">
              <h3 class="mb-0 text-center text-md-left font-weight-bold">Nilai Mahasiswa</h3>
            </div>
            <div class="col-12 col-md-9 text-center text-md-right">
              <button type="button" class="btn btn-icon btn-warning mt-3 mt-md-0">
                <span class="btn-inner--icon"><span class="iconify" data-icon="bx:bx-printer"></span></span>
                <span class="btn-inner--text">Cetak Data</span>
              </button>
              <button type="button" class="btn btn-icon btn-secondary mt-3 mt-md-0">
                <span class="btn-inner--icon"><span class="iconify" data-icon="bx:bx-share-alt"></span></span>
                <span class="btn-inner--text">Publish Nilai</span>
              </button>
              <button type="button" class="btn btn-primary mt-3 mt-md-0">
                <span>Simpan</span>
              </button>
            </div>
          </div>
        </div>
        <hr class="my-4">
        <form class="form-select rounded-0">
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="program-studi">Program Studi</label>
              <select class="form-control" id="program-studi">
                <option selected>D3 Teknik Informatika</option>
                <option>Ilmu Kedokteran Gigi Anak</option>
              </select>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="jenjang">Jenjang</label>
              <select class="form-control" id="jenjang">
                <option>Semester 1</option>
                <option selected>Semester 2</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="matakuliah">Mata Kuliah</label>
              <select class="form-control" id="matakuliah">
                <option selected>Rekayasa Perangkat Lunak</option>
                <option>Human Computer Interaction</option>
              </select>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="kelas">Kelas</label>
              <select class="form-control" id="kelas">
                <option selected>MT001</option>
                <option>MT002</option>
              </select>
            </div>
          </div>
        </form>

        <div class="table-responsive">
          <table class="table align-items-center table-flush table-borderless table-hover mt-4">
            <thead class="table-header">
              <tr>
                <th scope="col" class="text-center pl-2 pr-0">No</th>
                <th scope="col" class="text-center px-3">NIM</th>
                <th scope="col" class="pl-1" style="width: 15%">Nama</th>
                <th scope="col" class="text-center px-1">UTS</th>
                <th scope="col" class="text-center px-1">UAS</th>
                <th scope="col" class="text-center px-1">Tugas</th>
                <th scope="col" class="text-center px-1">Kuis</th>
                <th scope="col" class="text-center px-1">Praktek</th>
                <th scope="col" class="text-center px-1">Up</th>
                <th scope="col" class="text-center px-1">Kehadiran</th>
                <th scope="col" class="text-center px-1">Akumulasi</th>
                <th scope="col" class="text-center px-2">Keterangan</th>
              </tr>
            </thead>

            <tbody class="table-body">
              <tr>
                <td class="text-center pl-2 pr-0">1</td>
                <td class="text-center px-3">345245345</td>
                <td class="font-weight-bold text-capitalize pl-1">Jessica Wijaya</td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uts" value="75">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uas">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="tugas">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kuis">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="praktek">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="up">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kehadiran">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="akumulasi">
                  </div>
                </td>
                <td class="text-center px-2">Keterangan</td>
              </tr>

              <tr>
                <td class="text-center pl-2 pr-0">2</td>
                <td class="text-center px-3">345245345</td>
                <td class="font-weight-bold text-capitalize pl-1">Jessica Wijaya</td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uts" value="75">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uas">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="tugas">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kuis">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="praktek">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="up">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kehadiran">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="akumulasi">
                  </div>
                </td>
                <td class="text-center px-2">Keterangan</td>
              </tr>

              <tr>
                <td class="text-center pl-2 pr-0">3</td>
                <td class="text-center px-3">345245345</td>
                <td class="font-weight-bold text-capitalize pl-1">Jessica Wijaya</td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uts" value="75">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uas">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="tugas">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kuis">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="praktek">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="up">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kehadiran">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="akumulasi">
                  </div>
                </td>
                <td class="text-center px-2">Keterangan</td>
              </tr>

              <tr>
                <td class="text-center pl-2 pr-0">4</td>
                <td class="text-center px-3">345245345</td>
                <td class="font-weight-bold text-capitalize pl-1">Jessica Wijaya</td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uts" value="75">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uas">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="tugas">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kuis">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="praktek">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="up">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kehadiran">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="akumulasi">
                  </div>
                </td>
                <td class="text-center px-2">Keterangan</td>
              </tr>

              <tr>
                <td class="text-center pl-2 pr-0">5</td>
                <td class="text-center px-3">345245345</td>
                <td class="font-weight-bold text-capitalize pl-1">Jessica Wijaya</td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uts" value="75">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="uas">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="tugas">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kuis">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="praktek">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="up">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="kehadiran">
                  </div>
                </td>
                <td class="text-center px-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="akumulasi">
                  </div>
                </td>
                <td class="text-center px-2">Keterangan</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection