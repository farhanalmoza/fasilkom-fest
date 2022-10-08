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
        $identitas_1 = $request->file('identitas_1');
        $identitas_2 = $request->file('identitas_2');
        
        $data = [
            'teamName' => $request->input('teamName'),
            'member_1' => $request->input('member_1'),
            'member_2' => $request->input('member_2'),
            'instansi' => $request->input('instansi'),
            'no_wa' => $request->input('wa'),
        ];
        
        return $this->uiux->updateDetailTim($data, $buktiBayar, $identitas_1, $identitas_2, $id);
    }
}
