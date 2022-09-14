<?php
namespace App\Services;

use App\Models\User;

class PanitiaService
{
    public function getAll()
    {
        // get user where role_id != 1
        return User::join('roles', 'roles.id', '=', 'users.role_id')
                    ->select('users.*', 'roles.name as role_name')
                    ->where('role_id', '!=', 1)
                    ->where('role_id', '!=', 2)
                    ->where('role_id', '!=', 3)
                    ->where('role_id', '!=', 4)
                    ->get();
    }

    public function store($request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        if (!$user) return response()->json(['message' => 'Gagal menambahkan panitia'], 500);
        return response()->json(['message' => 'Berhasil menambahkan panitia'], 200);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) return response()->json(['message' => 'Panitia tidak ditemukan'], 404);
        $user->delete();
        return response()->json(['message' => 'Berhasil menghapus panitia'], 200);
    }
}