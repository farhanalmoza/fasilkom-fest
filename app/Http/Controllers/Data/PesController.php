<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\PesService;
use Illuminate\Http\Request;

class PesController extends Controller
{
    protected $pes;
    public function __construct() {  $this->pes = app()->make(PesService::class); }

    public function store(Request $request) {
        return $this->pes->store($request);
    }
    public function getAll() { return $this->pes->getAll(); }

    public function pesertaPes() { return view('committee.esport.peserta-pes'); }
}
