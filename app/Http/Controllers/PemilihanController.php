<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemilihan;
use App\Kelurahan;
use App\Filesaksi;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class PemilihanController extends Controller
{
   public function index(request $request){
       return view('pemilihan.index');
   }

   public function index_file(request $request){
       return view('pemilihan.index_file');
   }

   public function tambah(request $request){
       return view('pemilihan.tambah');
   }

   public function ubah(request $request,$id){
       if(Auth::user()['role_id']==2){
            $cek=Pemilihan::where('id',$id)->where('tps',pengguna()['tps'])->count();
            $data=Pemilihan::where('id',$id)->where('tps',pengguna()['tps'])->first();
            if($cek>0){
                return view('pemilihan.ubah',compact('data'));
            }else{
                return redirect('pemilihan');
            }
       }

       if(Auth::user()['role_id']==1){
            $data=Pemilihan::where('id',$id)->first();
            
            return view('pemilihan.ubah',compact('data'));
            
       }
       
       
   }

   public function ubah_file(request $request,$id){
       $ide=terjemahkan($id);
       if(Auth::user()['role_id']==2){
            $jum=Filesaksi::where('tps',$ide)->where('tps',pengguna()['tps'])->count();
            $data=Filesaksi::where('tps',$ide)->where('tps',pengguna()['tps'])->first();
            
            return view('pemilihan.ubah_file',compact('data','ide','jum'));
            
       }

       if(Auth::user()['role_id']==1){
            $data=Filesaksi::where('tps',$ide)->first();
            
            return view('pemilihan.ubah_file',compact('data','ide'));
            
       }
       
       
   }

   public function api(){
    error_reporting(0);
   
        $data=Pemilihan::all();
        foreach($data as $no=>$o){
        
            $show[]=array(
                "id" =>$o['id'],
                "nama_calon" =>cek_calon($o['calon_id']),
                "nama_kecamatan" =>cek_kecamatan($o['kecamatan_id']),
                "nama_kelurahan" =>cek_kelurahan($o['kelurahan_id']).'[TPS '.$o['tps'].']',
                "nilai" =>$o['nilai'],
                "users_id" =>Auth::user()['id'],
                "act" =>cek_act($o['tps'],$o['id'])
            );
        }

        echo json_encode($show);
    }
   
    public function api_pemilu(){
    error_reporting(0);
   
        $data=Pemilihan::select('tps')->groupBy('tps')->get();
        $show[]=array(
            "id" =>'0',
            "tps" =>'<b>TOTAL</b>',
            "lokasi" =>'<b>Kota Cilegon</b>',
            "saksi" =>'Saksi Partai',
            "no1" =>'<b>'.cek_hasil_all(1).'</b>',
            "no2" =>'<b>'.cek_hasil_all(2).'</b>',
            "no3" =>'<b>'.cek_hasil_all(3).'</b>',
            "no4" =>'<b>'.cek_hasil_all(4).'</b>',
            "no5" =>'<b>'.cek_hasil_all(0).'</b>',
            "no6" =>'<b>'.cek_hasil_all(11).'</b>',
            "file" =>'<b>File</b>',
            "total" =>'<b>'.(cek_hasil_all(1)+cek_hasil_all(2)+cek_hasil_all(3)+cek_hasil_all(4)+cek_hasil_all(0)+cek_hasil_all(0)).'</b>',
        );
        // foreach($data as $no=>$o){
        
        //     $show[]=array(
        //         "id" =>$o['id'],
        //         "tps" =>'TPS'.$o['tps'],
        //         "no1" =>cek_hasil(1,$o['tps']),
        //         "no2" =>cek_hasil(2,$o['tps']),
        //         "no3" =>cek_hasil(3,$o['tps']),
        //         "no4" =>cek_hasil(4,$o['tps'])
        //     );
        // }

        for($x=1;$x<785;$x++){
                    $show[]=array(
                        "id" =>$x,
                        "tps" =>'TPS'.$x,
                        "lokasi" =>lokasi($x),
                        "saksi" =>saksi($x),
                        "no1" =>cek_hasil(1,$x),
                        "no2" =>cek_hasil(2,$x),
                        "no3" =>cek_hasil(3,$x),
                        "no4" =>cek_hasil(4,$x),
                        "no5" =>cek_hasil(0,$x),
                        "no6" =>cek_hasil(11,$x),
                        "file" =>cek_file($x),
                        "total" =>(cek_hasil(1,$x)+cek_hasil(2,$x)+cek_hasil(3,$x)+cek_hasil(4,$x)+cek_hasil(0,$x)+cek_hasil(11,$x))
                    );
        }

        echo json_encode($show);
    }

    public function cek_kelurahan($id){
        $data=Kelurahan::where('kecamatan_id',$id)->get();
        echo'<option value="">Pilih Kelurahan---</option>';
        foreach($data as $kel){
            echo'<option value="'.$kel['id'].'">'.$kel['name'].'</option>';
        }
    }
    public function hapus($id){
        $data=Pemilihan::where('id',$id)->delete();
        echo'ok';
    }

    public function simpan(request $request){
        error_reporting(0);
        // if (trim($request->kecamatan_id) == '') {$error[] = '- Pilih kecamatan';}
        // if (trim($request->kelurahan_id) == '') {$error[] = '- Pilih keluarahan';}
        // if (trim($request->calon_id) == '') {$error[] = '- Pilih Calon';}
        // if (trim($request->tps) == '') {$error[] = '- Masukan Nomor TPS';}
        // if (trim($request->nilai) == '') {$error[] = '- Masukan jumlah Suara';}
        // if (isset($error)) {echo '<p style="padding:5px;background:#d1ffae"><b>Error</b>: <br />'.implode('<br />', $error).'</p>';} 
        // else{
        //     $cek=Pemilihan::where('kecamatan_id',$request->kecamatan_id)->where('tps',$request->tps)->where('kelurahan_id',$request->kelurahan_id)->where('calon_id',$request->calon_id)->count();
        //     if($cek>0){
        //         echo '<p style="padding:5px;background:#d1ffae"><b>Error</b>: <br /> Data ini sudah diproses</p>';
        //     }else{
        //         $data=Pemilihan::create([
        //             'kecamatan_id'=>$request->kecamatan_id,
        //             'calon_id'=>$request->calon_id,
        //             'kelurahan_id'=>$request->kelurahan_id,
        //             'nilai'=>$request->nilai,
        //             'tps'=>$request->tps,
        //             'tanggal'=>date('Y-m-d')
        //         ]);

        //         echo'ok';
        //         }
        // }
        if (trim($request->calon_id) == '') {$error[] = '- Pilih Calon';}
        if (trim($request->nilai) == '') {$error[] = '- Masukan jumlah Suara';}
        if (isset($error)) {echo '<p style="padding:5px;background:#d1ffae"><b>Error</b>: <br />'.implode('<br />', $error).'</p>';} 
        else{
            $cek=Pemilihan::where('tps',$request->tps)->where('calon_id',$request->calon_id)->count();
            if($cek>0){
                echo '<p style="padding:5px;background:#d1ffae"><b>Error</b>: <br /> Data ini sudah diproses</p>';
            }else{
                $data=Pemilihan::create([
                    'kecamatan_id'=>pengguna()['kecamatan_id'],
                    'calon_id'=>$request->calon_id,
                    'kelurahan_id'=>pengguna()['kelurahan_id'],
                    'nilai'=>$request->nilai,
                    'tps'=>pengguna()['tps'],
                    'tanggal'=>date('Y-m-d')
                ]);

                echo'ok';
                }
        }
        
    }

    public function simpan_ubah(request $request,$id){
        error_reporting(0);
        if (trim($request->nilai) == '') {$error[] = '- Masukan jumlah Suara';}
        if (isset($error)) {echo '<p style="padding:5px;background:#d1ffae"><b>Error</b>: <br />'.implode('<br />', $error).'</p>';} 
        else{
            
                $data=Pemilihan::where('id',$id)->update([
                    'nilai'=>$request->nilai,
                    "users_id" =>Auth::user()['id'],
                    'tanggal'=>date('Y-m-d')
                ]);

                echo'ok';
               
        }
        
    }
    public function simpan_file(request $request,$id){
        error_reporting(0);
        
            $cek=Filesaksi::where('tps',$id)->count();
            if($cek>0){
                if($request->file==''){
                    echo'ok';
                }else{
                    $cek=explode('/',$_FILES['file']['type']);
                    $file_tmp=$_FILES['file']['tmp_name'];
                    $file=explode('.',$_FILES['file']['name']);
                    $filename=$id.'.'.$file[1];
                    $lokasi='_file_upload/';

                    if($cek[0]=='image'){
                        if(move_uploaded_file($file_tmp, $lokasi.$filename)){
                            $data=Filesaksi::where('tps',$id)->update([
                                "file" =>$filename,
                                'tanggal'=>date('Y-m-d')
                            ]);

                            echo'ok';
                        }
                    }else{
                        echo'Error2';
                    }
                }
            }else{
                if (trim($request->file) == '') {$error[] = '- Masukan File Bukti dari TPS';}
                if (isset($error)) {echo '<p style="padding:5px;background:#d1ffae"><b>Error</b>: <br />'.implode('<br />', $error).'</p>';} 
                else{
                    $cek=explode('/',$_FILES['file']['type']);
                    $file_tmp=$_FILES['file']['tmp_name'];
                    $file=explode('.',$_FILES['file']['name']);
                    $filename=$id.'.'.$file[1];
                    $lokasi='_file_upload/';

                    if($cek[0]=='image'){
                        if(move_uploaded_file($file_tmp, $lokasi.$filename)){
                            $data=Filesaksi::create([
                                'tps'=>$id,
                                "nik" =>Auth::user()['nik'],
                                "file" =>$filename,
                                'tanggal'=>date('Y-m-d')
                            ]);

                            echo'ok';
                        }
                    }else{
                        echo'Error2';
                    }
                }
            }
                

                
        
        
    }
}
