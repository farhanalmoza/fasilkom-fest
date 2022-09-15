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

    public function index()
    {
        return view('admin.index');
    }

    public function infromasi()
    {
        return view('admin.informasi-umum');
    }

    public function pengaturanAkun()
    {
        return view('admin.pengaturan-akun');
    }

    public function gantiPassword()
    {
        return view('admin.ganti-password');
    }

    public function divisi()
    {
        return view('admin.panitia.divisi');
    }

    public function daftarPanitia()
    {
        return view('admin.panitia.daftar-panitia');
    }
}
