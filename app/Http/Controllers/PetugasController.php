<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{
    function index(){
        $judul ="selamat datang di petugas";

        $petugas = DB::table('petugas')->get();
        return view('petugas',['TextJudul' =>  $judul, 'petugas' => $petugas]);
    }

    function tampil_petugas(){
        $judul = "selamat datang ditambah petugas petugas";

        return view('isi-petugas',['TextJudul' =>  $judul,]);
    }
    function proses_tambah_petugas(Request $request){
        $request->validate([
            'nama' => 'required|min:5'
        ]);
        $nama = $request -> nama;
        $username = $request -> username;
        $password = $request -> password;
        $telp = $request -> telp;
        $level = $request -> level;

        DB::table('petugas')->insert([
            
            'nama_petugas' => $nama,
            'username' => $username,
            'password' => $password,
            'telp' => $telp,
          
        ]);

        return redirect('/petugas');
    }
}