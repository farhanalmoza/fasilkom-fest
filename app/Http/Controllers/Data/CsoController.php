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
        
        $data = [
            'teamName' => $request->input('teamName'),
            'member_1' => $request->input('member_1'),
            'member_2' => $request->input('member_2'),
        ];
        
        return $this->cso->updateDetailTim($data, $buktiBayar, $kartuPelajar_1, $kartuPelajar_2, $id);
    }
}
