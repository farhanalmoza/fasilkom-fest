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
}