<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\PhotographyService;
use Illuminate\Http\Request;

class PhotographyController extends Controller
{
    protected $photography;
    public function __construct() {  $this->photography = app()->make(PhotographyService::class); }

    public function store(Request $request) {
        return $this->photography->store($request);
    }
    public function getAll() { return $this->photography->getAll(); }

    public function index() { return view('committee.art.index'); }
    public function peserta() { return view('committee.art.peserta-fotografi'); }
    public function gantiPassword() { return view('committee.art.ganti-password'); }
}
