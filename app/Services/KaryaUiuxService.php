<?php
namespace App\Services;

use App\Models\KaryaUiux;

class KaryaUiuxService
{
    function addPenyisihan($data)
    {
        $karya = KaryaUiux::create($data);
        if (!$karya) return response()->json(['message' => 'Gagal mengunggah link'], 500);
        return response()->json(['message' => 'Berhasil mengunggah link'], 200);
    }

    function getPenyisihan($id)
    {
        $karya = KaryaUiux::where('team_id', $id)->first();
        if (!$karya) return response()->json(['message' => 'Karya tidak ditemukan'], 404);
        return $karya;
    }
}