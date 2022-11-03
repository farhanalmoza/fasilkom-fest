<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\MlService;
use Illuminate\Http\Request;

class MlController extends Controller
{
    protected $ml;
    public function __construct() {  $this->ml = app()->make(MlService::class); }

    public function store(Request $request) {
        return $this->ml->store($request);
    }
    public function getAll() { return $this->ml->getAll(); }
    public function show($id) { return $this->ml->get($id); }

    public function index() { return view('committee.esport.index'); }
    public function pesertaMobileLegend() { return view('committee.esport.peserta-mobile-legend'); }
    public function detailMobileLegend($id) { return view('committee.esport.detail-ml', ['id' => $id]); }
    public function gantiPassword() { return view('committee.esport.ganti-password'); }
}
