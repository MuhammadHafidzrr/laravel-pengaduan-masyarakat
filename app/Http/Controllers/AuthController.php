<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   

    function tampil_register()
    {
        // $judul = "selamat datang ";
        // $pengaduan = DB::table('masyarakat')->get();

        return view('/register');
    }

    function register(Request $request)
    {
        $nik = $request -> nik;
        $nama = $request -> nama;
        $username = $request -> username;
        $password = $request -> password;
        $telepon = $request -> telepon;

        DB::table('masyarakat')->insert([
            'nik' => $nik,
            'nama' => $nama,
            'username' => $username,
            'password' => Hash::make($request->password),
            'telepon' => $telepon
        ]);

        return redirect('/login');
    }

    function login()
    {
        // $judul = "selamat datang ";
        // $pengaduan = DB::table('masyarakat')->get();

        return view('/login');
    }
}