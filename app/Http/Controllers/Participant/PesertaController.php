<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\Bpc;
use App\Models\Cso;
use App\Models\Uiux;
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

        // get user by email
        $user = User::where('email', $request->email)->first();
        // get user id
        $user_id = $user->id;
        // get role id
        $role_id = $user->role_id;
        // create participant
        if ($role_id == 2) {
            Cso::create([
                'user_id' => $user_id,
            ]);
        }
        if ($role_id == 3) {
            Uiux::create([
                'user_id' => $user_id,
            ]);
        }
        if ($role_id == 4) {
            Bpc::create([
                'user_id' => $user_id,
            ]);
        }

        return response(['message' => 'Akun Anda berhasil dibuat!']);
    }

    // CSO
    public function dashboardCso() { return view('participant.peserta-cso.dashboard'); }
    public function detailTimCso() { return view('participant.peserta-cso.detail-tim'); }
    public function gantiPasswordCso() { return view('participant.peserta-cso.ganti-password'); }

    // UI/UX
    public function dashboardUiux() { return view('participant.peserta-uiux.dashboard'); }
    public function detailTimUiux() { return view('participant.peserta-uiux.detail-tim'); }
    public function karyaUiux() { return view('participant.peserta-uiux.karya'); }
    public function gantiPasswordUiux() { return view('participant.peserta-uiux.ganti-password'); }
}
