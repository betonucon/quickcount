@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{judul()}}
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{menu_utama()}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{judul()}}</li>
    </ol>
</section>

    <!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    
    <div class="row">
        
        <div class="col-md-12" >
          
          <div class="box box-primary">
            <div class="box-header with-border">
              <span class="btn btn-success btn-sm" onclick="tambah()">Tambahkan Data</span>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            @foreach(calon() as $calon)
              <a class="btn btn-app">
                  {{$calon['singkatan']}}<br>{{rekapan($calon['id'])}}%
              </a>
            @endforeach
              <a class="btn btn-app">
                  Tidak Sah<br>{{rekapan(0)}}%
              </a>
              <a class="btn btn-app">
                  Blanko<br>{{rekapan(00)}}%
              </a>
            <div class="box-body">
                <table id="tabel_id" class="table table-bordered table-striped">
                </table>
            </div>
           
          </div>
          
          
        </div>

  </div>
    <!-- /.row -->

</section>
<div class="modal modal-fullscreen fade" id="modalloading" >
    <div class="modal-dialog" style="margin-top: 15%;">
        <div class="modal-content" style="background: transparent;">
            
            <div class="modal-body" style="text-align:center">
                <img src="{{url('icon/loading.gif')}}" width="20%">
            </div>
            
        </div>
    </div>
</div>
@endsection

@push('ajax')
<script>
$(document).ready(function() {
    
    var table = $('#tabel_id').DataTable({
        responsive: true,
        scrollY: "450px",
        scrollCollapse: true,
        paging   : false,
        info   : false,
        "ajax": {
            "type": "GET",
            "url": "{{url('pemilihan/api/')}}",
            "timeout": 120000,
            "dataSrc": function (json) {
                if(json != null){
                    return json
                } else {
                    return "No Data";
                }
            }
        },
        "sAjaxDataProp": "",
        "width": "100%",
        "order": [[ 0, "asc" ]],
        "aoColumns": [
            {
                "mData": null,
                "width":"5%",
                "title": "No",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                "mData": null,
                "title": "Nama Calon ",
                "render": function (data, row, type, meta) {
                    return data.nama_calon;
                }
            },
            {
                "mData": null,
                "title": "Nama Kecamatan",
                "render": function (data, row, type, meta) {
                    return data.nama_kecamatan;
                }
            },
            {
                "mData": null,
                "title": "Nama Kelurahan",
                "render": function (data, row, type, meta) {
                    return data.nama_kelurahan;
                }
            },
            {
                "mData": null,
                "title": "Jumlah Suara",
                "render": function (data, row, type, meta) {
                    return data.nilai;
                }
            },
            
            {
                "mData": null,
                "title": "Rek",
                "width":"8%",
                "render": function (data, row, type, meta) {
                    
                    return data.act;
                }
            }
            
        ]
    });

});

    function tambah(){
        window.location.assign("{{url('pemilihan/tambah/')}}")
    }
    function hapus(a){
        $.ajax({
            type: 'GET',
            url: "{{url('/pemilihan/hapus/')}}/"+a,
            data: "id="+a,
            beforeSend: function(){
                $('#modalloading').modal({backdrop: 'static', keyboard: false});
                
            },
            success: function(msg){
               location.reload();
                
                
            }
        });
    }
    function ubah(a){
        window.location.assign("{{url('pemilihan/ubah/')}}/"+a)
    }
</script>
@endpush
