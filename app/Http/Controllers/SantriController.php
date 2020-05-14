<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Auth;
use DB;
use Hash;
use Validator;
use Carbon\Carbon;
use App\Perijinan;
use PDF;
use Telegram\Bot\Laravel\Facades\Telegram;



class SantriController extends Controller
{
     
        public function index()
        {
            $id = Auth::user()->id;
            $user = User::find($id);
            $profile = Profile::where('id',$user->profile_id)->first();
            return view ('santri.index', compact('user','profile'));
        }
        public function changePassword()
        {
            return view ('santri.change_password');
        }
        public function updatePassword(Request $request)
        {
            // custom validator
                Validator::extend('password', function ($attribute, $value, $parameters, $validator) {
                    return Hash::check($value, \Auth::user()->password);
                });
        
                // message for custom validation
                $messages = [
                    'password' => 'Invalid current password.',
                ];
        
                // validate form
                $validator = Validator::make(request()->all(), [
                    'current_password'      => 'required|password',
                    'password'              => 'required|min:6|confirmed',
                    'password_confirmation' => 'required',
        
                ], $messages);
        
                // if validation fails
                if ($validator->fails()) {
                    return redirect()
                        ->back()
                        ->withErrors($validator->errors());
                }
        
                // update password
                $user = User::find(Auth::id());
        
                $user->password = bcrypt(request('password'));
                $user->save();
        
                return redirect('/santri');
        }
        public function editData($id)
        {
            $province = DB::table('provinces')->get();
            $profiles = Profile::find($id);
            return view('santri/modal_edit',compact('profiles','province'));
        }
        public function putData(Request $request)
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
            $user->level = 'santri';
            $user->updated_at = Carbon::now();
            $user->save();

            return redirect('/santri');
        }
        public function perijinan()
        {
            $user_id = Auth::user()->id;
            $mapel = DB::table('mapel')->get();
            $perijinan = Perijinan::where('user_id',$user_id)->orderBy('id','desc')->get();
            return view('santri/menu_perijinan',compact('perijinan','mapel'));
        }
        public function Createperijinan(Request $request)
        {
            $user = User::find($request->id);
            $activity = Telegram::getUpdates();
            switch ($request->type) {
            case "ijin_madin":
                DB::table('perijinans')->insert([
                    'user_id' => $request->id,
                    'type' => $request->type,
                    'mulai_ijin' => $request->tanggal,
                    'mapel' => $request->mapel,
                    'alasan' => $request->alasan,
                    'status' => 'menunggu'
                ]);

                 $text = "Santri Bernama ".$user->name." Mengajukan ".$request->type." Pada Tanggal ".Carbon::now()." Silahkan pengurus untuk konfirmasi di sistem ";
         
                Telegram::sendMessage([
                    'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
                    'parse_mode' => 'HTML',
                    'text' => $text
                ]);
                return redirect('/santri/perijinan')->with('status', 'Ijin Madin Berhasil dibuat!');
            case "ijin_pulang":
                DB::table('perijinans')->insert([
                    'user_id' => $request->id,
                    'type' => $request->type,
                    'mulai_ijin' => $request->tanggal_ijin,
                    'akhir_ijin' => $request->tanggal_kembali,
                    'alamat' => $request->alamat,
                    'no_hp' => $request->no_hp,
                    'status' => 'menunggu'
                ]);
                  $text = "Santri Bernama ".$user->name." Mengajukan ".$request->type." Pada Tanggal ".Carbon::now()." Silahkan pengurus untuk konfirmasi di sistem ";
         
                Telegram::sendMessage([
                    'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
                    'parse_mode' => 'HTML',
                    'text' => $text
                ]);
                return redirect('/santri/perijinan')->with('status', 'Ijin Pulang Berhasil dibuat');
            case "ijin_kegiatan":
               $file = $request->file('upload');
               $tujuan_upload = 'perijinan';
               $original_name= $file->getClientOriginalName();
               $original_extension =$file->getClientOriginalExtension();
               $data= strtotime('now');
               $fullname= $original_name."_".$data.".".$original_extension;
               $file->move($tujuan_upload,$fullname);
               DB::table('perijinans')->insert([
                    'user_id' => $request->id,
                    'type' => $request->type,
                    'mulai_ijin' => $request->tanggal_ijin,
                    'akhir_ijin' => $request->tanggal_kembali,
                    'alasan' => $request->alasan,
                    'gambar' => $fullname,
                    'status' => 'menunggu'
                ]);
                 $text = "Santri Bernama ".$user->name." Mengajukan ".$request->type." Pada Tanggal ".Carbon::now()." Silahkan pengurus untuk konfirmasi di sistem ";
         
                Telegram::sendMessage([
                    'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
                    'parse_mode' => 'HTML',
                    'text' => $text
                ]);
                return redirect('/santri/perijinan')->with('status', 'Ijin Kegiatan Berhasil dibuat');
            case "ijin_pulangmalam":
                DB::table('perijinans')->insert([
                    'user_id' => $request->id,
                    'type' => $request->type,
                    'mulai_ijin' => $request->tanggal,
                    'mapel' => $request->time,
                    'alasan' => $request->alasan,
                    'status' => 'menunggu'
                ]);
                  $text = "Santri Bernama ".$user->name." Mengajukan ".$request->type." Pada Tanggal ".Carbon::now()." Silahkan pengurus untuk konfirmasi di sistem ";
         
                Telegram::sendMessage([
                    'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
                    'parse_mode' => 'HTML',
                    'text' => $text
                ]);
                 return redirect('/santri/perijinan')->with('status', 'Ijin Kegiatan Berhasil dibuat');
                break;
        }
            
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
                    'user_id' => $request->user_id,
                    'type' => $request->type,
                    'mulai_ijin' => $request->tanggal,
                    'mapel' => $request->mapel,
                    'alasan' => $request->alasan,
                    'status' => 'menunggu'
                ]);
                return redirect('/santri/perijinan')->with('status', 'Ijin Madin Berhasil diedit');
                break;
            case "ijin_pulang":

                    DB::table('perijinans')->where('id',$request->perijinan_id)->update([
                        'user_id' => $request->user_id,
                        'type' => $request->type,
                        'mulai_ijin' => $request->tanggal_ijin,
                        'akhir_ijin' => $request->tanggal_kembali,
                        'alamat' => $request->alamat,
                        'no_hp' => $request->no_hp,
                        'status' => 'menunggu'
                    ]);
                    return redirect('/santri/perijinan')->with('status', 'Ijin Pulang Berhasil diedit');
                break;
            case "ijin_kegiatan":
                // dd($request->all());
                if(isset($request->upload)){
                   $file = $request->file('upload');
                   $tujuan_upload = 'perijinan';
                   $original_name= $file->getClientOriginalName();
                   $original_extension =$file->getClientOriginalExtension();
                   $data= strtotime('now');
                   $fullname= $original_name."_".$data.".".$original_extension;
                   $file->move($tujuan_upload,$fullname);
                   DB::table('perijinans')->where('id',$request->perijinan_id)->update([
                    'user_id' => $request->user_id,
                    'type' => $request->type,
                    'mulai_ijin' => $request->tanggal_ijin,
                    'akhir_ijin' => $request->tanggal_kembali,
                    'alasan' => $request->alasan,
                    'gambar' => $fullname,
                    'status' => 'menunggu'
                ]);
                return redirect('/santri/perijinan')->with('status', 'Ijin Kegiatan Berhasil diupdate');
                }else{
                     DB::table('perijinans')->where('id',$request->perijinan_id)->update([
                    'user_id' => $request->user_id,
                    'type' => $request->type,
                    'mulai_ijin' => $request->tanggal_ijin,
                    'akhir_ijin' => $request->tanggal_kembali,
                    'alasan' => $request->alasan,
                    'status' => 'menunggu'
                ]);
                return redirect('/santri/perijinan')->with('status', 'Ijin Kegiatan Berhasil diupdate');
                }
                break;
            case "ijin_pulangmalam":
                 DB::table('perijinans')->where('id',$request->perijinan_id)->update([
                    'mulai_ijin' => $request->tanggal,
                    'mapel' => $request->time,
                    'alasan' => $request->alasan,
                    'status' => 'menunggu'
                ]);
                return redirect('/santri/perijinan')->with('status', 'Ijin Pulang Malam Berhasil diupdate');
        }

        }
        public function deletePerijinan($id)
        {
            $perijinan = Perijinan::find($id);
            $perijinan->delete();
            return redirect('/santri/perijinan')->with('delete', 'Ijin telah di Hapus');
        }
        public function cetakPerijinan($id)
        {
            $perijinan = Perijinan::find($id);
            $user = User::find($perijinan->user_id);
            $profil = Profile::find($user->profile_id);
            // dd($profil);
            
            $pdf = PDF::loadview('perijinan_pdf',compact('perijinan','user','profil'));
            return $pdf->download('laporan-perijinan-pdf-'.$user->name);
        }
        
}
