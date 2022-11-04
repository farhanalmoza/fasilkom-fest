<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\BpcService;
use Illuminate\Http\Request;

class BpcController extends Controller
{
    protected $bpc;

    public function __construct() { $this->bpc = app()->make(BpcService::class); }

    public function show($id) { return $this->bpc->getDetail($id); }

    public function updateDetailTim(Request $request, $id)
    {
        // variabel
        $bmc = $request->file('bmc');
        $identitas_1 = $request->file('identitas_1');
        $identitas_2 = $request->file('identitas_2');
        $identitas_3 = $request->file('identitas_3');
        
        $data = [
            'teamName' => $request->input('teamName'),
            'member_1' => $request->input('member_1'),
            'member_2' => $request->input('member_2'),
            'member_3' => $request->input('member_3'),
            'instansi' => $request->input('instansi'),
            'no_wa' => $request->input('wa'),
        ];
        
        return $this->bpc->updateDetailTim($data, $bmc, $identitas_1, $identitas_2, $identitas_3, $id);
    }

    public function updateTahap2(Request $request, $id)
    {
        // variabel
        $buktiBayar = $request->file('buktiBayar');
        $proposal = $request->file('proposal');
        
        return $this->bpc->updateTahap2($proposal, $buktiBayar, $id);
    }

    public function updateFinal(Request $request, $id)
    {
        // variabel
        $ppt = $request->file('ppt');
        
        return $this->bpc->updateFinal($ppt, $id);
    }

    public function lolosFinal(Request $request, $id) { return $this->bpc->lolosFinal($request, $id); }
    public function getAll() { return $this->bpc->getAll(); }
    
    public function index() { return view('committee.bpc.index'); }
    public function pendaftar() { return view('committee.bpc.pendaftar'); }
    public function detailPendaftar($id) { return view('committee.bpc.detail-pendaftar', ['id' => $id]); }
    public function tahap2() { return view('committee.bpc.tahap-2'); }
    public function gantiPassword() { return view('committee.bpc.ganti-password'); }
}
