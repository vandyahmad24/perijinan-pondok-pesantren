<?php

namespace App\Http\Controllers;

use App\Perijinan;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Profile;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class PengurusController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $profile = Profile::where('id',$user->profile_id)->first();
        return view ('pengurus.index',compact('user','profile'));
    }
    public function editData($id)
    {
        $province = DB::table('provinces')->get();
        $profiles = Profile::find($id);
        return view('pengurus/modal_edit',compact('profiles','province'));
    }
    public function postData(Request $request)
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
        $user->level = 'pengurus';
        $user->updated_at = Carbon::now();
        $user->save();

        return redirect('/pengurus');
    }
    public function perijinan()
    {
        $mapel = DB::table('mapel')->get();
        $perijinans = Perijinan::orderBy('id','desc')->get();
        $madin = Perijinan::where('type','ijin_madin')->get();
        $kegiatan = Perijinan::where('type','ijin_kegiatan')->get();
        $pulang = Perijinan::where('type','ijin_pulang')->get();
        $pulangmalam = Perijinan::where('type','ijin_pulangmalam')->get();
        return view('pengurus/perijinan',compact('perijinans','mapel','madin','kegiatan','pulang','pulangmalam'));
    }
    public function deletePerijinan($id)
    {
       $perijinan = Perijinan::find($id);
       $perijinan->delete();
       return redirect('/pengurus/perijinan');
    }
    public function editPerijinan(Request $request)
    {
        $perijinan = Perijinan::find($request->id);
        return response()->json($perijinan);
     
    }
    public function putPerijinan(Request $request)
    {
           
          switch ($request->type) {
            case "ijin_madin":
                DB::table('perijinans')->where('id',$request->perijinan_id)->update([
                    'status' => $request->status,
                    'catatan' => $request->catatan
                ]);
                return redirect('/pengurus/perijinan')->with('status', 'Ijin Madin Berhasil dibuat!');
            case "ijin_pulang":
                DB::table('perijinans')->where('id',$request->perijinan_id)->update([
                     'status' => $request->status,
                    'catatan' => $request->catatan
                ]);
                return redirect('/pengurus/perijinan')->with('status', 'Ijin Pulang Berhasil dibuat');
            case "ijin_kegiatan":
               DB::table('perijinans')->where('id',$request->perijinan_id)->update([
                    'status' => $request->status,
                    'catatan' => $request->catatan
                ]);
                return redirect('/pengurus/perijinan')->with('status', 'Ijin Kegiatan Berhasil dibuat');
            case "ijin_pulangmalam":
                DB::table('perijinans')->where('id',$request->perijinan_id)->update([
                     'status' => $request->status,
                    'catatan' => $request->catatan
                ]);
                 return redirect('/pengurus/perijinan')->with('status', 'Ijin Kegiatan Berhasil dibuat');
                break;
            }

    }
    public function sendWa($id)
    {
        $perijinan = Perijinan::find($id);
        $newNumber = preg_replace('/^0?/', '62', $perijinan->no_hp);
        return redirect()->to("https://api.whatsapp.com/send?phone=".$newNumber."&text=");
      
      
    }
}
