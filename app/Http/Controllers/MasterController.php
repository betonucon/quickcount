<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kecamatan;
use App\Pengguna;
use App\User;
use App\Kelurahan;
use PDF;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class MasterController extends Controller
{
   public function index(request $request){
       $data=Kecamatan::all();
       return view('master.index',compact('data'));
   }

   public function ubah_password()
    {
      $data=User::where('id',Auth::user()['id'])->first();
        return view('pengaturan',compact('data'));
    }

   public function tambah(request $request){
       return view('pengguna.tambah');
   }

   public function index_kelurahan(request $request,$id){
       $data=Kelurahan::where('kecamatan_id',$id)->get();
       $id=$id;
       return view('master.index_kelurahan',compact('data','id'));
   }

   public function api(){
    error_reporting(0);
   
        $data=Kecamatan::all();
        foreach($data as $no=>$o){
        
            $show[]=array(
                "id" =>$o['id'],
                "name" =>$o['name'],
                "kelurahan" =>jumlah_kelurahan($o['id'])
            );
        }

        echo json_encode($show);
    }
   public function api_kelurahan($id){
    error_reporting(0);
   
        $data=Kelurahan::where('kecamatan_id',$id)->get();
        foreach($data as $no=>$o){
            $tps=Pengguna::where('kelurahan_id',$o['id'])->get();
            foreach($tps as $no=>$t){
                $show[]=array(
                    "id" =>$o['id'],
                    "kelurahan" =>$o['name'],
                    "tps" =>'TPS '.$t['tps'],
                    "alamat" =>$t['alamat']
                );
            }
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
        $cek=Pengguna::where('id',$id)->first();
        $user=User::where('nik',$cek['nik'])->delete();
        $data=Pengguna::where('id',$id)->delete();
        echo'ok';
    }

    public function simpan(request $request){
        error_reporting(0);
        if (trim($request->nik) == '') {$error[] = '- Masukan Nomor KTP';}
        if (trim($request->name) == '') {$error[] = '- Masukan Nama Saksi';}
        if (trim($request->kecamatan_id) == '') {$error[] = '- Pilih kecamatan';}
        if (trim($request->kelurahan_id) == '') {$error[] = '- Pilih keluarahan';}
        if (trim($request->alamat) == '') {$error[] = '- Masukan Alamat lengkap TPS ';}
        if (trim($request->tps) == '') {$error[] = '- Masukan Nomor TPS';}
        if (isset($error)) {echo '<p style="padding:5px;background:#d1ffae"><b>Error</b>: <br />'.implode('<br />', $error).'</p>';} 
        else{
            $cek=Pengguna::where('nik',$request->nik)->where('tps',$request->tps)->count();
            if($cek>0){
                echo '<p style="padding:5px;background:#d1ffae"><b>Error</b>: <br /> Data ini sudah diproses</p>';
            }else{
                    $user=User::create([
                        'name'=>$request->name,
                        'nik'=>$request->nik,
                        'email'=>$request->nik,
                        'password'=>Hash::make($request->nik),
                        'role_id'=>2
                    ]);
                    if($user){
                        $data=Pengguna::create([
                            'kecamatan_id'=>$request->kecamatan_id,
                            'nik'=>$request->nik,
                            'kelurahan_id'=>$request->kelurahan_id,
                            'alamat'=>$request->alamat,
                            'tps'=>$request->tps
                        ]);

                        echo'ok';
                    }
            }
        }
        
    }

    public function simpan_ubah(request $request,$id){
        error_reporting(0);
        if (trim($request->alamat) == '') {$error[] = '- Masukan Alamat lengkap TPS ';}
        if (trim($request->tps) == '') {$error[] = '- Masukan Nomor TPS';}
        if (isset($error)) {echo '<p style="padding:5px;background:#d1ffae"><b>Error</b>: <br />'.implode('<br />', $error).'</p>';} 
        else{
            
                $data=Pengguna::where('id',$id)->update([
                    'alamat'=>$request->alamat,
                    'tps'=>$request->tps
                ]);

                echo'ok';
               
        }
        
    }

    public function simpan_password(request $request){
        error_reporting(0);
        if (trim($request->password_lama) == '') {$error[] = '- Masukan Password Lama ';}
        if (trim($request->password_baru) == '') {$error[] = '- Masukan Password Baru ';}
        if (isset($error)) {echo '<p style="padding:5px;background:#d1ffae"><b>Error</b>: <br />'.implode('<br />', $error).'</p>';} 
        else{
            if(Hash::make($request->password_lama)==Auth::user()['password']){

            }else{
                echo '<p style="padding:5px;background:#d1ffae"><b>Error</b>: <br /> Password Salah</p>';
            }
                // $data=Pengguna::where('id',$id)->update([
                //     'alamat'=>$request->alamat,
                //     'tps'=>$request->tps
                // ]);

                // echo'ok';
               
        }
        
    }
}
