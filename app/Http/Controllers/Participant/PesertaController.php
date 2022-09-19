<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PesertaController extends Controller
{
    public function showRegistrationForm($slug)
    {
        return view('participant.auth.register', compact('slug'));
    }

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        event(new Registered($user));

        return response(['message' => 'Akun Anda berhasil dibuat!']);
    }
}
