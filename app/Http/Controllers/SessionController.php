<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    //
    public function index(){
        echo '<ul>';
        echo '<li><a href=/buatSession>Buat Session</a></li>';
        echo '<li><a href=/aksesSession>Akses Session</a></li>';
        echo '<li><a href=/hapusSession>Hapus Session</a></li>';
        echo '<li><a href=/flashSession>Flash Session</a></li>';
        echo '</ul>';
    }

    public function buatSession(){
        // session(['hakAkses' => 'admin']);
        session(['hakAkses' => 'admin','nama' => + 'antonym']);

        return "session sudah di byaran";


    }

    public function aksesSession( Request $request ){


        if (session()->has('hakAkses'))
         {
             echo "Session 'hakAkses' terdeteksi: ". session('hakAkses');
         }

        $IsiSesion = $request->session()->get('kota', 'jakarta');
        echo  "isi sesion adalah $IsiSesion";

        // Menggunakan helper function
        echo session('hakAkses');
        echo session('nama');
        echo '<hr>';

        // Dari Request object
        echo $request->session()->get('hakAkses');
        echo $request->session()->get('nama');

        echo '<hr>';

        // Menggunakan facade Session
        echo Session::get('hakAkses');
        echo Session::get('nama');
    }

    public function hapusSession(Request $request){

        // // Menghapus 1 session menggunakan helper function
        // session()->forget('hakAkses');
        // // Menghapus 1 session menggunakan Request object
        //  $request->session()->forget('hakAkses');
        //  // Menghapus 1 session menggunakan facade Session
        //  Session::forget('hakAkses');
        //  echo "Session hakAkses sudah dihapus";

         // Menghapus semua session menggunakan helper function
        session()->flush();
        // Menghapus semua session menggunakan Request object
         $request->session()->flush();
         // Menghapus semua session menggunakan facade Session
         Session::flush();
         echo "Semua session sudah dihapus";
    }

    public function flashSession(){

    }
}

