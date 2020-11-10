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
                <h3 class="box-title">Daftar Kelurahan Kecamatan {{cek_kecamatan($id)}}</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            @foreach($data as $calon)
              <a class="btn btn-app">
                  {{$calon['name']}}<br>{{tps_kelurahan($calon['id'])}} TPS
              </a>
            @endforeach
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
        "ajax": {
            "type": "GET",
            "url": "{{url('kelurahan/api/'.$id)}}",
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
                "title": "Nama Kelurahan ",
                "width":"20%",
                "render": function (data, row, type, meta) {
                    return data.kelurahan;
                }
            },
            {
                "mData": null,
                "title": "TPS",
                "width":"10%",
                "render": function (data, row, type, meta) {
                    return data.tps;
                }
            },
            {
                "mData": null,
                "title": "Lokasi",
                "render": function (data, row, type, meta) {
                    return data.alamat;
                }
            }
            
        ]
    });

});

    function view(a){
        window.location.assign("{{url('kelurahan/')}}/"+a)
    }
    function hapus(a){
        $.ajax({
            type: 'GET',
            url: "{{url('/pengguna/hapus/')}}/"+a,
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
        window.location.assign("{{url('pengguna/ubah/')}}/"+a)
    }
</script>
@endpush
