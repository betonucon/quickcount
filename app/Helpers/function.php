<?php

function buatkode($b) {
    $awalnya = array("1","2","3","4","5","6","7","8","9","0");
    $gantinya =   array("W@","a","r","D","s","x","C","z","q","H");
    $hasilnya = str_replace($awalnya, $gantinya, $b);
    return $hasilnya;
 }
 
 function terjemahkan($t) {
    $kodenya =   array("W@","a","r","D","s","x","C","z","q","H");
    $terjemahanya = array("1","2","3","4","5","6","7","8","9","0");
    $hasilterjemahan = str_replace($kodenya, $terjemahanya, $t);
    return $hasilterjemahan;
 }

 function urlnya(){
     $data='';

     return $data;
 }

function kecamatan(){
    
        $data=array_column(App\Kecamatan::all()->toArray(), 'name');
        return $data;
    
}

function pengguna(){
    
        $data=App\Pengguna::where('nik',Auth::user()['nik'])->first();
        return $data;
    
}

function jumlah_kelurahan($id){
    $data=App\Kelurahan::where('kecamatan_id',$id)->count();
    return $data;
}

function cek_hasil($id,$tps){
    $data=App\Pemilihan::where('tps',$tps)->where('calon_id',$id)->sum('nilai');
    return $data.' Suara';
}
function cek_hasil_all($id){
    $data=App\Pemilihan::where('calon_id',$id)->sum('nilai');
    return $data.' Suara';
}
function tps_kelurahan($id){
    $data=App\Pengguna::where('kelurahan_id',$id)->count();
    return $data;
}
function tps($id){
    $data=App\Pengguna::where('kecamatan_id',$id)->count();
    return $data;
}

function cek_act($tps,$id){
    if(Auth::user()['role_id']==2){
        if($tps==pengguna()['tps']){
            $data='<span class="btn btn-success btn-xs" onclick="ubah('.$id.')"><i class="fa fa-pencil"></i></span>_<span class="btn btn-danger btn-xs" onclick="hapus('.$id.')"><i class="fa fa-remove"></i></span>';
        }else{
            $data='<span class="btn btn-default btn-xs>off</span>';
        }
    }else{
        $data='<span class="btn btn-success btn-xs" onclick="ubah('.$id.')"><i class="fa fa-pencil"></i></span>_<span class="btn btn-danger btn-xs" onclick="hapus('.$id.')"><i class="fa fa-remove"></i></span>';
    }
    return $data;
}

function judul(){
    $data="Quick Count Pemilihan Wali Kota Cilegon";

    return $data;
}

function menu_utama(){
    $data=url('home');

    return $data;
}

function kecamatan_get(){
    $data=App\Kecamatan::all();

    return $data;
}
function calon(){
    $data=App\Calon::orderBy('urut','Asc')->get();

    return $data;
}

function sub_total($cal){
    $cek=App\Pemilihan::where('calon_id',$cal)->count();
    if($cek>0){
        $data=App\Pemilihan::where('calon_id',$cal)->sum('nilai');
    }else{
        $data=0;
    }
    

    return $data;
}

function total($cal,$kec){
    $cek=App\Pemilihan::where('calon_id',$cal)->where('kecamatan_id',$kec)->count();
    if($cek>0){
        $data=App\Pemilihan::where('calon_id',$cal)->where('kecamatan_id',$kec)->sum('nilai');
    }else{
        $data=0;
    }
    

    return $data;
}

function seluruh(){
    $cek=App\Pemilihan::count();
    if($cek>0){
        $data=App\Pemilihan::sum('nilai');
    }else{
        $data=0;
    }
    

    return $data;
}

function rekapan($cal){
    $cek=App\Pemilihan::where('calon_id',$cal)->count();
    if($cek>0){
        $data=App\Pemilihan::where('calon_id',$cal)->sum('nilai');
    }else{
        $data=0;
    }
    $sel=100/seluruh();
    // $tots=round(($data/seluruh())*100);
    // $tots=substr(($data*$sel),0,5);
    $tots=round(($data*$sel),2);
    return $tots;
}

function cek_kecamatan($id){
    $data=App\Kecamatan::where('id',$id)->first();

    return $data['name'];
}
function cek_kelurahan($id){
    $data=App\Kelurahan::where('id',$id)->first();

    return $data['name'];
}

function cek_calon($id){
    if($id==0){
        $cek='<i>Tidak Sah</i>';
    }else{
        $data=App\Calon::where('id',$id)->first();
        $cek=$data['name'];
    }
    

    return $cek;
}

function cek_user($id){
    $data=App\User::where('nik',$id)->first();

    return $data['name'];
}

function saksi($id){
    $data=App\Pengguna::where('tps',$id)->first();

    return cek_user($data['nik']);
}

function cek_file($id){
    $cek=App\Filesaksi::where('tps',$id)->count();
    if($cek>0){
        $data=App\Filesaksi::where('tps',$id)->first();
        if(pengguna()==$id){
            $file='<span class="btn btn-xs btn-success" onclick="ubah_file(`'.buatkode($id).'`)"><i class="fa fa-clone"></i></span>';
        }else{
            $file='<span class="btn btn-xs btn-success" onclick="lihat_file(`'.$data['file'].'`)"><i class="fa fa-clone"></i></span>';
        }
        
    }else{
        if(pengguna()==$id){
            $file='<span class="btn btn-xs btn-default" onclick="ubah_file(`'.buatkode($id).'`)" ><i class="fa fa-clone"></i></span>';
        }else{
            $file='<span class="btn btn-xs btn-default" ><i class="fa fa-clone text-yellow"></i></span>';
        }
        
    }
    

    return $file;
}

function lokasi($id){
    $data=App\Pengguna::where('tps',$id)->first();
    $lok='KEC:'.cek_kecamatan($data['kecamatan_id']).'/KEL:'.cek_kelurahan($data['kelurahan_id']);

    return $lok;
}

function paslon($id){
    if($id==1){
        $data=url('icon/paslon1.png');
    }
    if($id==2){
        $data=url('icon/paslon2.png');
    }
    if($id==3){
        $data=url('icon/paslon3.png');
    }
    if($id==4){
        $data=url('icon/paslon4.png');
    }
    if($id==0){
        $data=url('icon/paslon0.png');
    }

    return $data;
}
?>