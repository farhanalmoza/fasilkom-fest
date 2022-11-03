<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\SportService;
use Illuminate\Http\Request;

class SportController extends Controller
{
    protected $sport;
    public function __construct() {  $this->sport = app()->make(SportService::class); }

    public function store(Request $request) {
        return $this->sport->store($request);
    }
    public function getAll($category_id) { return $this->sport->getAll($category_id); }

    public function index() { return view('committee.sport.index'); }

    public function pesertaFutsal() { return view('committee.sport.peserta-futsal'); }
    public function pesertaBasketPutra() { return view('committee.sport.peserta-basket-putra'); }
    public function pesertaBasketPutri() { return view('committee.sport.peserta-basket-putri'); }

    public function gantiPassword() { return view('committee.sport.ganti-password'); }
}
