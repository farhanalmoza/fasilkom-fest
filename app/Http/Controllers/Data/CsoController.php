<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\CsoService;
use Illuminate\Http\Request;

class CsoController extends Controller
{
    protected $cso;

    public function __construct() { $this->cso = app()->make(CsoService::class); }

    public function show($id) { return $this->cso->getDetail($id); }

    public function updateDetailTim(Request $request, $id)
    {
        // variabel
        $buktiBayar = $request->file('buktiBayar');
        $kartuPelajar_1 = $request->file('kartuPelajar_1');
        $kartuPelajar_2 = $request->file('kartuPelajar_2');
        $kartuPelajar_3 = $request->file('kartuPelajar_3');
        
        $data = [
            'teamName' => $request->input('teamName'),
            'member_1' => $request->input('member_1'),
            'member_2' => $request->input('member_2'),
            'member_3' => $request->input('member_3'),
            'sekolah' => $request->input('sekolah'),
            'no_wa' => $request->input('wa'),
        ];
        
        return $this->cso->updateDetailTim($data, $buktiBayar, $kartuPelajar_1, $kartuPelajar_2, $kartuPelajar_3, $id);
    }

    public function updateTahap2(Request $request, $id)
    {
        // variabel
        $buktiBayar = $request->file('buktiBayar');
        $proposal = $request->file('proposal');
        
        return $this->cso->updateTahap2($proposal, $buktiBayar, $id);
    }

    public function updateFinal(Request $request, $id)
    {
        // variabel
        $ppt = $request->file('ppt');
        
        return $this->cso->updateFinal($ppt, $id);
    }

    public function lolosFinal(Request $request, $id) { return $this->cso->lolosFinal($request, $id); }
    public function getAll() { return $this->cso->getAll(); }
    
    public function index() { return view('committee.cso.index'); }
    public function pendaftar() { return view('committee.cso.pendaftar'); }
    public function detailPendaftar($id) { return view('committee.cso.detail-pendaftar', ['id' => $id]); }
    public function tahap2() { return view('committee.cso.tahap-2'); }
    public function gantiPassword() { return view('committee.cso.ganti-password'); }
}
