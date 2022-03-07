<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Alert;
use App\Models\absensi;
use App\Models\uploadfile;
use DateTimeZone;
use DateTime;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('user.home', compact('user'));
    }

    public function absenmasuk(){
        $dataabsen = DB::table('absensi')->get();
        return view('user.absenmasuk',['absen'=>$dataabsen]);
    }

    public function dataabsenmasuk(Request $request){
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now',new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');

        $absensi = absensi::where([
            ['user_id','=',auth()->user()->id],
            ['tgl','=',$tanggal],
        ])->first();
        
        if ($absensi){
            // dd("sudah ada");
            Alert::warning('Gagal!','Data sudah ada');
            return redirect('user/absenmasuk');
        }else{
            absensi::create([
                'user_id' => auth()->user()->id,
                'tgl' => $tanggal,
                'jammasuk' =>$localtime,
            ]);
            Alert::success('Sukses!','Absen masuk berhasil');
            return redirect('user/absenmasuk');
        }
    }

    public function absenkeluar(){
        $dataabsen = DB::table('absensi')->get();
        return view('user.absenkeluar',['absen'=>$dataabsen]);
    }

    public function dataabsenkeluar(){
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now',new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');

        $absensi = absensi::where([
            ['user_id','=',auth()->user()->id],
            ['tgl','=',$tanggal],
        ])->first();

        $dt=[
            'jamkeluar' => $localtime,
            'jamkerja' => date(strtotime($localtime) - strtotime($absensi->jammasuk))
        ];

        if ($absensi->jamkeluar == ""){
            $absensi->update($dt);
            Alert::success('Sukses!','Absen masuk berhasil');
            return redirect('user/absenkeluar');
        }else{
            Alert::warning('Gagal!','Data sudah ada');
            return redirect('user/absenkeluar');
        }
    }

    public function inputfile(){
        return view('user.inputfile');
    }

    public function store(Request $request){
        $nm = $request->gambar;
        $namafile = time().rand(100,999).".".$nm->getClientOriginalExtension();

            $dtupload = new uploadfile;
            $dtupload->nama = $request->nama;
            $dtupload->gambar = $namafile;

            $nm->move(public_path().'/datafile', $namafile);
            $dtupload->save();

            Alert::success('Sukses!','File berhasil disimpan');

            return redirect('user/inputfile');
    }
}
