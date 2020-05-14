<?php

namespace App\Http\Controllers;
use Session;
use App\Profile;
use App\User;
use App\Perijinan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Imports\SantriImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
 

    public function index()
    {
        $profiles = Profile::where('deleted_at', null)->paginate(15);
        $admin = User::where('level','admin')->count();
        $santri = User::where('level','santri')->count();
        $pengurus = User::where('level','pengurus')->count();
        $mapel = DB::table('mapel')->get();
        $perijinan = Perijinan::count();
        $pending = Perijinan::where('status','menunggu')->count();
        $setuju = Perijinan::where('status','setuju')->count();
        $tolak = Perijinan::where('status','tolak')->count();
        return view ('admin.admin',compact('profiles','admin','santri','pengurus','perijinan','pending','tolak','setuju','mapel'));
    }
    public function DaftarSantri(Request $request)
    {
        $province = DB::table('provinces')->get();
        $profiles = Profile::where('deleted_at', null)->paginate(15);

        return view ('admin.santri',compact('profiles','province'));
    }
    public function getKabupaten(Request $request)
    {
        $provinsi = DB::table('provinces')->where('name',$request->prov_id)->first();
        $kabupaten = DB::table('kabupaten')->where('province_id',$provinsi->id)->get();
        return response()->json([
            'status' => 'success',
            'data' => $kabupaten
        ]);

    }
    public function PostSantri(Request $request)
    {
    

        $profil = new Profile;
        $profil->nis = $request->nis;
        $profil->fullname = $request->fullname;
        // menyimpan gambar
            $file = $request->file('foto');
            $nama_file = $request->fullname.".".$file->getClientOriginalExtension();
            $tujuan_upload = 'foto';
            $file->move($tujuan_upload,$nama_file);
        $profil->foto = $nama_file;
        $profil->jenis_kelamin = $request->jenis_kelamin;
        $profil->alamat = $request->alamat;
        $profil->provinsi = $request->provinsi;
        $profil->kabupaten = $request->kabupaten;
        $profil->save();

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make(123123);
        $user->level = $request->level;
        $user->profile_id = $profil->id;
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        $user->save();

        return redirect('admin/daftar-santri');
    }
    public function ShowSantri(Request $request,$id)
    {
        $province = DB::table('provinces')->get();
        $profiles = Profile::find($request->id);
        return view('admin/modal/edit_santri',compact('profiles','province'));
    }
    public function PutSantri(Request $request)
    {
        $profil = Profile::find($request->id);
        if($request->file('foto') == "")
    	{
    		$nama_file=$profil->foto;
    	}
    	else
    	{
            $file = $request->file('foto');
            $nama_file = $request->fullname.".".$file->getClientOriginalExtension();
            $tujuan_upload = 'foto';
            $file->move($tujuan_upload,$nama_file);
        }
        $profil->nis = $request->nis;
        $profil->fullname = $request->fullname;
        $profil->foto = $nama_file;
        $profil->jenis_kelamin = $request->jenis_kelamin;
        $profil->alamat = $request->alamat;
        $profil->provinsi = $request->provinsi;
        $profil->kabupaten = $request->kabupaten;
        $profil->updated_at = Carbon::now();
        $profil->save();

        $user = User::where('profile_id',$request->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->updated_at = Carbon::now();
        $user->save();

        return redirect('admin/daftar-santri');
    }
    public function DeleteSantri($id)
    {
       
    $user = User::where('profile_id', $id)->first();
    $user->deleted_at = Carbon::now();
    $user->save();

    $profil = Profile::find($id);
    $profil->deleted_at = Carbon::now();
    $profil->save();
        return redirect('admin/daftar-santri');
    }
    public function addMapel(Request $request)
    {
        DB::table('mapel')->insert([
            'nama' => $request->mapel,
            'deskripsi' => $request->deskripsi
        ]);
        return redirect('/admin/')->with('status', 'Mapel Berhasil di buat');
    }
   
    public function DeleteMapel($id)
    {
       DB::table('mapel')->where('id',$id)->delete();
        return redirect('/admin/')->with('delete', 'Mapel Berhasil di hapus');
    }
    public function Reset($id)
    {
       $user = User::find($id);
       $user->password =  bcrypt('123123');
       $user->save();
       return redirect('admin/daftar-santri');
    }
    public function ImportSantri(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        // menangkap file excel
        $file = $request->file('file');
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
        // upload ke folder file_siswa di dalam folder public
        $file->move('data_santri',$nama_file);

        // import data
         
        Excel::import(new SantriImport, public_path('/data_santri/'.$nama_file));
 
        // notifikasi dengan session
        Session::flash('sukses','Data Siswa Berhasil Diimport!');
        // alihkan halaman kembali
        return redirect('/admin/daftar-santri');
 
    }

}
