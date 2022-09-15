<?php
namespace App\Services;

use App\Models\Information;

class InformasiService
{
    public function getDetail()
    {
        $information = Information::first();
        if ($information) { return $information; }
        return null;
    }

    public function update($request, $id)
    {
        $information = Information::find($id);
        $data = [
            'closing_date' => $request->tgl_closing,
            'venue' => $request->tmp_closing,
            'description' => $request->deskripsi,
            'email' => $request->email,
            'instagram' => $request->instagram,
        ];
        if(!$information) return response()->json(['message' => 'Terjadi kesalahan'], 404);
        $information->update($data);
        return response()->json(['message' => 'Berhasil mengubah informasi'], 200);
    }
}