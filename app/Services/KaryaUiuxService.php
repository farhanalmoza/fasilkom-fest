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
}