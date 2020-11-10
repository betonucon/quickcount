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
              <h3 class="box-title">Ubah Password</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
           
            <div class="box-body">
                <div id="notifikasi"></div>
                <form method="post"  id="mysimpan_data" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">NIK</label>
                        <input type="text" class="form-control" disabled id="exampleInputPassword1" value="{{$data['nik']}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama</label>
                        <input type="text" class="form-control" disabled id="exampleInputPassword1" value="{{$data['name']}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password Lama</label>
                        <input type="password" class="form-control" name="password_lama" id="exampleInputPassword1" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password Baru</label>
                        <input type="password" class="form-control" name="password_baru" id="exampleInputPassword1" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirmasi Password</label>
                        <input type="password" class="form-control" name="password_confir" id="exampleInputPassword1" value="">
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

    function simpan_data(){
        var form=document.getElementById('mysimpan_data');
        
            $.ajax({
                type: 'POST',
                url: "{{url('/pengaturan/simpan_password/')}}",
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
