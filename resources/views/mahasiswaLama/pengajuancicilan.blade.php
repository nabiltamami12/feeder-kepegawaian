@extends('layouts.main')

@section('style')
<style>
  h2.aside_title {
    font-weight: 600;
    font-size: 1.125rem;
    line-height: 1.5em;
    color: #041f2f;
  }

  ::placeholder {
    font-weight: 400;
    font-size: 0.875rem;
    line-height: 1.21em;
    color: #041f2f;
  }

  .customSelect {
    position: relative;
    display: inline-block;
    width: 100%;
  }

  .customSelect-trigger {
    font-size: 14px;
    font-weight: 500;
    line-height: 17px;
    color: #000;
    padding: 0.5rem 0.75rem;
    background-color: #fff;
    position: relative;
    display: block;
    border-radius: 0.25rem;
    cursor: pointer;
    border: 1px solid #999;
  }

  .customSelect-trigger:after {
    content: "";
    background-image: url("https://api.iconify.design/bx/bx-chevron-down.svg?color=%23000");
    background-repeat: no-repeat;
    background-position: center;
    position: absolute;
    display: block;
    pointer-events: none;
    width: 10px;
    height: 10px;
    top: 50%;
    right: 0.75rem;
    transform: translateY(-50%);
  }

  .custom-options {
    position: absolute;
    display: block;
    top: 100%;
    left: 0;
    right: 0;
    border: 1px solid rgba(153, 153, 153, 0.2);
    box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.15);
    box-sizing: border-box;
    background: #fff;
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    border-radius: 0.25rem 0.25rem 0.5rem 0.5rem;
  }

  .customSelect.opened .custom-options {
    position: relative;
    opacity: 1;
    visibility: visible;
    pointer-events: all;
  }

  .custom-option {
    position: relative;
    display: block;
    padding: 0.5rem;
    font-size: 14px;
    font-weight: 400;
    line-height: 17px;
    color: #000;
    cursor: pointer;
  }

  .custom-option:hover {
    background: rgba(40, 163, 235, 0.5);
  }

  .custom-option.selection {
    background: rgba(40, 163, 235, 0.5);
  }

  .selecton {
    border-color: #28a3eb;
  }

  .textarea_notresize {
    resize: none;
  }

  .textarea_notresize:focus {
    border-color: #28a3eb;
  }

  .uploadDokumen {
	cursor: pointer;
    border: 1px solid #C4C4C4;
  }

  .uploadDokumen .iconify {
    font-size: 1.5rem;
    color: #000;
  }

  #custom-btn {
    background-color: transparent;
    border: none;
    outline: none;
  }

  .rounded-top-left {
    border-radius: 0.5rem 0 0 0;
  }

  .nama_dokumen {
    font-size: 1.125rem;
    line-height: 1.22em;
    color: #041f2f;
  }

</style>
@endsection
@section('content')
<!-- Header -->
<header class="header"></header>
<section class="page-content container-fluid">
  <div class="row">
    <div class="col-xl-6">
      <div class="card shadow padding--small">
        <div class="card_header">
          <h2 class="aside_title mb-0">Upload Surat Pengajuan Cicilan</h2>
          <hr class="mt-3 mb-4">
        </div>
        <div class="card_content">
          <div class="uploadDokumen rounded p-3 d-flex justify-content-center align-items-center">
            <form class="align-items-center d-none">
              <i class="iconify mr-1" data-icon="bx:bxs-file-pdf" data-inline="false"></i>
              <input type="file" id="file" hidden onchange="example()" />
              <span id="custom-text" class="d-inline-block nama_dokumen">tidak ada file dipilih</span>
            </form>
            <button type="button" id="custom-btn">
              <i class="iconify text-primary" data-icon="bx:bx-cloud-upload" data-inline="false"></i>
            </button>
          </div>
          <button type="button" class="btn btn-primary mt-4 w-100" id="upload"> <i class="iconify mr-1" data-icon="bx:bx-save"></i> Simpan</button>
        </div>
      </div>
    </div>            
    <div class="col-xl-6">
      <div class="card shadow padding--small">
        <div class="card_header">
          <h2 class="aside_title mb-0">SURAT PERJANJIAN</h2>
          <hr class="mt-3 mb-4">
        </div>
        <div class="card_content">
          <div class="row">
            <div class="col-xl-12">
              <div class="uploadDokumen rounded p-3 d-flex justify-content-center align-items-center">
              <i class="iconify" data-icon="bx:bx-file-blank"></i><span class="mt-1 ml-2">Preview File Perjanjian </span>
              </div>
            </div>
            <div class="col-xl-12">
              <div class="form-group">
                <div class="row">
                  <div class="col-xl-3">
                    <p>Tenor</p>
                  </div>
                  <div class="col-xl-9">
                    <p>: 3 Bulan</p>
                  </div>
                  <div class="col-xl-3">
                    <p>Januari</p>
                  </div>
                  <div class="col-xl-9">
                    <p>: Rp 3.000.000,-</p>
                  </div>
                  <div class="col-xl-3">
                    <p>Februari</p>
                  </div>
                  <div class="col-xl-9">
                    <p>: Rp 3.000.000,-</p>
                  </div>
                  <div class="col-xl-3">
                    <p>Maret</p>
                  </div>
                  <div class="col-xl-9">
                    <p>: Rp 3.000.000,-</p>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <!-- <button type="button" class="btn btn-primary mt-4 w-100" id="upload"> <i class="iconify mr-1" data-icon="bx:bx-save"></i> Simpan</button> -->
        </div>
      </div>
    </div>            
  </div>      
</section>
@endsection

@section('js')
<script>

// Upload SK
const inputFile = document.getElementById("file");
const customBtn = document.getElementById("custom-btn");
const customText = document.getElementById("custom-text");
const formUpload = document.querySelector(".uploadDokumen form");
const formWrapper = document.querySelector('.uploadDokumen');
formWrapper.addEventListener("click", function () {
	inputFile.click();
});
inputFile.addEventListener("change", function () {
if (inputFile.value) {
	let fileName = inputFile.value.match(/[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/)[0];
	customText.innerHTML = fileName;
} else {
	customText.innerHTML = "tidak ada file dipilih";
}
});
function example(){
formUpload.classList.remove("d-none");
formUpload.classList.add("d-flex");
formWrapper.classList.remove("justify-content-center");
formWrapper.classList.add("justify-content-between");
let formWrapper_width = formWrapper.offsetWidth-100;
document.querySelector('.nama_dokumen').style.maxWidth = formWrapper_width + "px"
}
// End upload sk

$(document).ready(function () {
    // getData();
    loading("hide")

    $('#upload').on('click', function() {
        id_mahasiswa = 35170;
        jenis = 'cicilan';

        var file_data = $('#file').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);
        form_data.append('id_mahasiswa', id_mahasiswa);
        form_data.append('jenis', jenis);
        // console.log(file_data);                             
        // console.log(form_data);                             
        $.ajax({
            url: url_api+"/keuangan/pengajuan-cicilan",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'post',
            success: function(res){
                location.reload()
            }
        });
    });
});
function getData(){
    $.ajax({
        url: url_api+"/hariaktifkuliah",
        type: 'get',
        dataType: 'json',
        data: {},
        success: function(res) {
            
        }
    })
}
</script>

@endsection