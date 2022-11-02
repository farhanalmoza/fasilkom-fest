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
    public function penyisihanUiux() {
        $uiux = Uiux::where('user_id', Auth::user()->id)->first();
        $team_id = $uiux->id;
        return view('participant.peserta-uiux.penyisihan', compact('team_id'));
    }
    public function finalUiux() {
        $uiux = Uiux::where('user_id', Auth::user()->id)->first();
        $uiux = Uiux::where('user_id', Auth::user()->id)->first();
        $team_id = $uiux->id;
        if ($uiux->finalis == 1) {
            return view('participant.peserta-uiux.final', compact('team_id'));
        }
        return redirect('/peserta-uiux');
    }
    public function gantiPasswordUiux() { return view('participant.peserta-uiux.ganti-password'); }

    // BPC
    public function dashboardBpc() { return view('participant.peserta-bpc.dashboard'); }
    public function detailTimBpc() { return view('participant.peserta-bpc.detail-tim'); }
    public function tahap2Bpc() {
        $bpc = Bpc::where('user_id', Auth::user()->id)->first();
        $team_id = $bpc->id;
        if ($bpc->finalis != 0) {
            return view('participant.peserta-bpc.tahap2', compact('team_id'));
        }
        return redirect('/peserta-bpc');
    }
    public function finalBpc()
    {
        $bpc = Bpc::where('user_id', Auth::user()->id)->first();
        $team_id = $bpc->id;
        if ($bpc->finalis == 2) {
            return view('participant.peserta-bpc.final', compact('team_id'));
        }
        return redirect('/peserta-bpc');
    }

    // form pendaftaran lomba non-akademik
    public function pendaftaranMl() { return view('participant.pendaftaran.ml'); }
    public function pendaftaranPes() { return view('participant.pendaftaran.pes'); }
    public function pendaftaranPubg() { return view('participant.pendaftaran.pubg'); }
    public function pendaftaranFutsal() { return view('participant.pendaftaran.futsal'); }
    public function pendaftaranBasketPutri() { return view('participant.pendaftaran.basket-putri'); }
    public function pendaftaranBasketPutra() { return view('participant.pendaftaran.basket-putra'); }
}
