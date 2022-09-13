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

    public function add($data)
    {
        $role = Role::create($data);
        if (!$role) return response()->json(['message' => 'Gagal menambahkan divisi'], 500);
        return response()->json(['message' => 'Berhasil menambahkan divisi'], 200);
    }
}