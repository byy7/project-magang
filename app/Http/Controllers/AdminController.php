<?php

namespace App\Http\Controllers;
use App\Models\uploadfile;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Alert;

class AdminController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('admin.home', compact('user'));
    }

    public function admin(){
        $dataadmin = DB::table('data')->paginate(5);
        return view('admin/home',['admin'=>$dataadmin]);
    }

    public function caridata(Request $request){
        $cari = $request->cari;

        $dataadmin = DB::table('data')
        ->where('nama','like',"%".$cari."%")
        ->orWhere('tanggal_lahir','like',"%".$cari."%")
        ->orWhere('jenis_kelamin','like',"%".$cari."%")
        ->orWhere('email','like',"%".$cari."%")
        ->orWhere('no_hp','like',"%".$cari."%")
        ->orWhere('alamat','like',"%".$cari."%")
        ->orWhere('departemen','like',"%".$cari."%")
        ->orWhere('jabatan','like',"%".$cari."%")
        ->orWhere('gaji','like',"%".$cari."%")
        ->paginate();
        return view('admin/home',['admin'=>$dataadmin]);
    }

    public function inputdata(){
        return view('admin/inputdata');
    }

    public function simpandata(Request $request){
        DB::table('data')->insert([
            'nama'=>$request->nama,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'email'=>$request->email,
            'no_hp'=>$request->no_hp,
            'alamat'=>$request->alamat,
            'departemen'=>$request->departemen,
            'jabatan'=>$request->jabatan,
            'gaji'=>$request->gaji
        ]);

        Alert::success('Sukses!','Data berhasil disimpan');

        return redirect('admin');
    }

    public function editdata($id){
        $dt = DB::table('data')->where('id',$id)->get();
        return view ('admin/edit',['edit'=>$dt]);
    }

    public function updatedata(Request $request){
        DB::table('data')->where('id',$request->id)->update([
            'nama'=>$request->nama,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'email'=>$request->email,
            'no_hp'=>$request->no_hp,
            'alamat'=>$request->alamat,
            'departemen'=>$request->departemen,
            'jabatan'=>$request->jabatan,
            'gaji'=>$request->gaji
        ]);

        Alert::success('Sukses!','Data berhasil diupdate');

        return redirect('admin');
    }

    public function hapus($id){
        DB::table('data')->where('id',$id)->delete();

        Alert::warning('Hapus!','Data berhasil di Hapus');

        return redirect('admin');
    }

    public function datauser(){
        $datauser = DB::table('users')->paginate(10);
        return view('admin/datauser',['users'=>$datauser]);
    }

    public function hapususer($id){
        DB::table('users')->where('id',$id)->delete();

        Alert::warning('Hapus!','Data berhasil di Hapus');

        return redirect('admin/datauser');
    }

    public function inputfile(){
        return view('admin/inputfile');
    }

    public function tampilgambar(){
        $datagambar = uploadfile::latest()->paginate(5);
        // $datagambar = DB::table('uploadfile')->paginate(10);
        return view('admin/datasertifikat',['gambar'=>$datagambar]);
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

            return redirect('admin/datasertifikat');
    }

    public function editfile($id){
        $dt = uploadfile::findorfail($id);
        return view('admin/editfile',['edit'=>$dt]);
    }

    public function update(Request $request, $id){
        $ubah = uploadfile::findorfail($id);
        $awal = $ubah->gambar;

        $dt = [
            'nama' => $request['nama'],
            'gambar' => $awal,
        ];
        $request->gambar->move(public_path().'/datafile', $awal);
        $ubah->update($dt);

        Alert::success('Sukses!','File berhasil diedit');

        return redirect('admin/datasertifikat');
    }

    public function destroy($id){
        $hapus = uploadfile::findorfail($id);

        $file = public_path('/datafile/').$hapus->gambar;
        // Cek jika ada file
        if (file_exists($file)){
            // Maka hapus file yang ada di folder public/datafile
            @unlink($file);
        }

        // Hapus data yang ada di database
        $hapus->delete();

        Alert::warning('Hapus!','Data berhasil di Hapus');
        return back();
    }

    public function cetakdatakaryawan(){
        $datakaryawan = DB::table('data')->get();
        return view('admin/cetakdatakaryawan',['datakaryawan'=>$datakaryawan]);
    }

    public function cetakdatauser(){
        $datauser = DB::table('users')->get();
        return view('admin/cetakdatauser',['datauser'=>$datauser]);
    }

    public function laporanabsensi(){
        $dataabsen = DB::table('absensi')->join('users', 'users.id','=','absensi.user_id')->paginate(10);
        return view('admin/laporan',['laporanabsen'=>$dataabsen]);
    }

    public function cetaklaporanabsensi(){
        $dataabsen = DB::table('absensi')->join('users', 'users.id','=','absensi.user_id')->get();
        return view('admin/cetaklaporanabsensi',['cetakdata'=>$dataabsen]);
    }
}