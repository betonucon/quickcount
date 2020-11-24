@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        QuickCount Calon Walikota Serang
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

    <!-- Main content -->
<section class="content">
    
    <div class="row" id="tampil">
        
    </div>
    <div class="row">    
        <div class="col-md-12">
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Daftar TPS</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                  <table id="tabel_id" class="table table-bordered table-striped">
                  </table>
              </div>
              
            </div>
          </div>
        



    </div>
    <!-- /.row -->

</section>
@endsection

@push('ajax')
<script>
$(document).ready(function(){
  
   
  var $container = $("#tampil");
      $container.load("rss-feed-data.php");
      var refreshId = setInterval(function()
      {
            $container.load("{{url('chart')}}");
      }, 3500);

});

$(document).ready(function() {
    
    var table = $('#tabel_id').DataTable({
        responsive: true,
        scrollY: "450px",
        scrollCollapse: true,
        ordering   : false,
        paging   : false,
        info   : false,
        "ajax": {
            "type": "GET",
            "url": "{{url('pemilihan/api_pemilu/')}}",
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
                "title": "TPS ",
                "width":"10%",
                "render": function (data, row, type, meta) {
                    return data.tps;
                }
            },
            {
                "mData": null,
                "title": "Lokasi ",
                "render": function (data, row, type, meta) {
                    return data.lokasi;
                }
            },
            {
                "mData": null,
                "title": "MULIA",
                "width":"10%",
                "render": function (data, row, type, meta) {
                    return data.no2;
                }
            },
            {
                "mData": null,
                "title": "PAS",
                "width":"10%",
                "render": function (data, row, type, meta) {
                    return data.no1;
                }
            },
            
            
            {
                "mData": null,
                "title": "Iye-Awab",
                "width":"10%",
                "render": function (data, row, type, meta) {
                    return data.no4;
                }
            },
            {
                "mData": null,
                "title": "HAJI",
                "width":"10%",
                "render": function (data, row, type, meta) {
                    return data.no3;
                }
            },
            {
                "mData": null,
                "title": "Tidak Sah",
                "width":"10%",
                "render": function (data, row, type, meta) {
                    return data.no5;
                }
            },
            {
                "mData": null,
                "title": "Blanko",
                "width":"10%",
                "render": function (data, row, type, meta) {
                    return data.no6;
                }
            },
            {
                "mData": null,
                "title": "Tot Suara",
                "width":"15%",
                "render": function (data, row, type, meta) {
                    return data.total;
                }
            }
            
        ]
    });

});
</script>
@endpush
