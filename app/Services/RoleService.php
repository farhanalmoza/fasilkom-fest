<?php
namespace App\Services;

use App\Models\Role;
use Illuminate\Support\Facades\Storage;

class RoleService
{
    public function getAll()
    {
        return Role::all();
    }

    public function getDivPanitia()
    {
        return Role::where('parent', 1)->get();
    }

    public function getTargetPeserta()
    {
        return Role::where('parent', 0)->get();
    }

    public function add($data)
    {
        $role = Role::create($data);
        if (!$role) return response()->json(['message' => 'Gagal menambahkan divisi'], 500);
        return response()->json(['message' => 'Berhasil menambahkan divisi'], 200);
    }

    public function getDetail($id)
    {
        return Role::find($id);
    }

    public function update($id, $data)
    {
        $role = Role::find($id);
        if (!$role) return response()->json(['message' => 'Divisi tidak ditemukan'], 404);
        $role->update($data);
        return response()->json(['message' => 'Berhasil mengubah divisi'], 200);
    }

    public function delete($id)
    {
        $role = Role::find($id);
        if (!$role) return response()->json(['message' => 'Divisi tidak ditemukan'], 404);
        $role->delete();
        return response()->json(['message' => 'Berhasil menghapus divisi'], 200);
    }
}