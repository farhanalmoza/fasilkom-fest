<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function gantiPass($data)
    {
        $idUser = auth()->user()->id;
        $user = User::find($idUser);
        if(!$user) return response(['message' => 'user tidak ditemukan'], 404);
        if($data['new_pass'] != $data['confirm_pass']) return response(['message' => 'Konfirmasi password tidak sama'], 422);
        if(Hash::check($data['old_pass'], $user->password)) {
            $update = $user->update([
                'password' => Hash::make($data['new_pass'])
            ]);
            if(!$update) return response(['message' => 'terjadi kesalahan'], 500);
            return response(['message' => 'Password berhasil diubah']); 
        } else {
            return response(['message' => 'Password lama tidak sesuai'], 422);
        }
    }
}