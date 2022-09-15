<?php
namespace App\Services;

use App\Models\Category;

class KategoriService
{
    public function getAll()
    {
        return Category::all();
    }

    public function getDetail($id)
    {
        $kategori = Category::find($id);
        if ($kategori) { return $kategori; }
        return null;
    }

    public function create($data)
    {
        $kategori = Category::create($data);
        if (!$kategori) return response()->json(['message' => 'Gagal menambahkan bidang lomba'], 500);
        return response()->json(['message' => 'Berhasil menambahkan bidang lomba'], 200);
    }

    public function delete($id)
    {
        $kategori = Category::find($id);
        if(!$kategori) return response()->json(['message' => 'Terjadi kesalahan'], 404);
        $kategori->delete();
        return response()->json(['message' => 'Berhasil menghapus Bidang lomba'], 200);
    }
}