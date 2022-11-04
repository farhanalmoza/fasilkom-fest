<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\CoverService;
use Illuminate\Http\Request;

class SoloCoverController extends Controller
{
    protected $cover;
    public function __construct() {  $this->cover = app()->make(CoverService::class); }

    public function store(Request $request) {
        return $this->cover->store($request);
    }
    public function getAll() { return $this->cover->getAll(); }

    public function peserta() { return view('committee.art.peserta-solo-cover'); }
}
