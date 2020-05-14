<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
 
use Telegram\Bot\Laravel\Facades\Telegram;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function profil()
    {
        return view('profil');
    }
    public function geografis()
    {
        return view('geografis');
    }
    public function visimisi()
    {
        return view('visimisi');
    }
    public function foto($id)
    {
       $foto = DB::table('perijinans')->where('id',$id)->first();
       
        return view('visimisi');
    }
   

    public function sendMessage()
    {
      
        $activity = Telegram::getUpdates();
        dd($activity);
    }

}
