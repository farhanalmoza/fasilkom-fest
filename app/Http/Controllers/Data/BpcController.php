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
        $buktiBayar = $request->file('buktiBayar');
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
        
        return $this->bpc->updateDetailTim($data, $buktiBayar, $bmc, $identitas_1, $identitas_2, $identitas_3, $id);
    }

    public function updateTahap2(Request $request, $id)
    {
        // variabel
        $proposal = $request->file('proposal');
        
        return $this->bpc->updateTahap2($proposal, $id);
    }
}
