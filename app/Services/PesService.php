<?php
namespace App\Services;

use App\Models\Pes;
use Illuminate\Support\Facades\Storage;

class PesService
{
    public function store($request)
    {
        $pes = Pes::create([
            'email' => $request->email,
            'team_name' => $request->team_name,
            'team_leader' => $request->team_leader,
            'no_wa' => $request->no_wa,
            'major' => $request->major,
            'player_2' => $request->player_2,
            'player_3' => $request->player_3,
            'player_4' => $request->player_4,
            'player_5' => $request->player_5,
            'bukti_bayar' => $request->file('bukti_bayar')->store('bukti_bayar'),
        ]);

        return $pes;
    }
}