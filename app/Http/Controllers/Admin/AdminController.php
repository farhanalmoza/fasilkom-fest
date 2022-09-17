<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }

    public function index() { return view('admin.index'); }

    // informasi umum fasilkom fest
    public function infromasi() { return view('admin.informasi-umum'); }
    // end informasi umum fasilkom fest

    // akun panitia
    public function divisi() { return view('admin.panitia.divisi'); }

    public function daftarPanitia() { return view('admin.panitia.daftar-panitia'); }
    // end akun panitia

    // perlombaan
    public function bidangLomba() { return view('admin.lomba.bidang-lomba'); }
    public function mataLomba() { return view('admin.lomba.mata-lomba'); }
    public function tambahLomba() { return view('admin.lomba.tambah-lomba'); }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editLomba($id)
    {
        return view('admin.lomba.edit-lomba');
    }
    // end perlombaan

    // pengaturan akun
    public function pengaturanAkun() { return view('admin.pengaturan-akun'); }

    public function gantiPassword() { return view('admin.ganti-password'); }
    // end pengaturan akun

    
}
