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
              <h3 class="box-title">Form Data Saksi</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
           
            <div class="box-body">
                <div id="notifikasi"></div>
                <form method="post"  id="mysimpan_data"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">No KTP</label>
                        <input type="number" class="form-control" name="nik" id="exampleInputPassword1" placeholder="Nomor KTP">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama</label>
                        <input type="text" class="form-control" name="name" id="exampleInputPassword1" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kecamatan</label>
                        <select class="form-control"  name="kecamatan_id" onchange="cek_kelurahan(this.value)" placeholder="Enter email">
                            <option value="">Pilih Kecamatan---</option>
                            @foreach(kecamatan_get() as $kec)
                                <option value="{{$kec['id']}}">{{$kec['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kelurahan</label>
                        <select class="form-control"  name="kelurahan_id" id="kelurahan" placeholder="Enter email">
                            <option value="">Pilih Kelurahan---</option>
                           
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">TPS</label>
                        <input type="number" class="form-control" name="tps" id="exampleInputPassword1" placeholder="Nomor TPS">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Alamat Lengkap</label>
                        <textarea rows="4" class="form-control" name="alamat" id="exampleInputPassword1" placeholder="Alamat lengkap"></textarea>
                    </div>
                    
                </form>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary" onclick="simpan_data()">Submit</button>
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
        
        
    });

    function cek_kelurahan(a){
        $.ajax({
            type: 'GET',
            url: "{{url('/pemilihan/kelurahan/')}}/"+a,
            data: "id="+a,
            beforeSend: function(){
                $('#modalloading').modal({backdrop: 'static', keyboard: false});
                
            },
            success: function(msg){
               
                $('#modalloading').modal('hide');
                $('#kelurahan').html(msg);
                
            }
        });
    }
    function simpan_data(){
        var form=document.getElementById('mysimpan_data');
        
            $.ajax({
                type: 'POST',
                url: "{{url('/pengguna/simpan/')}}",
                data: new FormData(form),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                    $('#modalloading').modal({backdrop: 'static', keyboard: false});
                    
                },
                success: function(msg){
                    
                    if(msg=='ok'){
                        window.location.assign("{{url('pengguna')}}")
                    }else{
                        $('#modalloading').modal('hide');
                        $('#notifikasi').html(msg);
                    }
                    
                    
                }
            });

    }
</script>
@endpush
