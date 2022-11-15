<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\UiuxService;
use Illuminate\Http\Request;

class UiuxController extends Controller
{
    protected $uiux;

    public function __construct() { $this->uiux = app()->make(UiuxService::class); }

    public function show($id) { return $this->uiux->getDetail($id); }

    public function updateDetailTim(Request $request, $id)
    {
        // variabel
        $buktiBayar = $request->file('buktiBayar');
        $orisinalitas = $request->file('orisinalitas');
        $identitas_1 = $request->file('identitas_1');
        $identitas_2 = $request->file('identitas_2');
        
        $data = [
            'teamName' => $request->input('teamName'),
            'member_1' => $request->input('member_1'),
            'member_2' => $request->input('member_2'),
            'instansi' => $request->input('instansi'),
            'no_wa' => $request->input('wa'),
        ];
        
        return $this->uiux->updateDetailTim($data, $buktiBayar, $orisinalitas, $identitas_1, $identitas_2, $id);
    }

    public function updateTahap2(Request $request, $id)
    {
        // variabel
        $buktiBayar = $request->file('buktiBayar');
        $proposal = $request->file('proposal');
        
        return $this->uiux->updateTahap2($proposal, $buktiBayar, $id);
    }

    public function updateFinal(Request $request, $id)
    {
        // variabel
        $ppt = $request->file('orisinalitas');
        
        return $this->uiux->updateFinal($ppt, $id);
    }

    public function lolosFinal(Request $request, $id) { return $this->uiux->lolosFinal($request, $id); }
    public function getAll() { return $this->uiux->getAll(); }
    
    public function index() { return view('committee.uiux.index'); }
    public function pendaftar() { return view('committee.uiux.pendaftar'); }
    public function detailPendaftar($id) { return view('committee.uiux.detail-pendaftar', ['id' => $id]); }
    public function tahap2() { return view('committee.uiux.tahap-2'); }
    public function final() { return view('committee.uiux.final'); }
    public function gantiPassword() { return view('committee.uiux.ganti-password'); }

}
