<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = app()->make(UserService::class);
    }

    public function gantiPassword(Request $request)
    {
        $data = [
            'old_pass' => $request->input('passLama'),
            'new_pass' => $request->input('passBaru'),
            'confirm_pass' => $request->input('konfirPassBaru'),
        ];
        return $this->user->gantiPass($data);
    }
}
