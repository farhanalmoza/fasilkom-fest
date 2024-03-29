<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\Bpc;
use App\Models\Competition;
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
    public function dashboardCso() {
        $group = Competition::where('id', '7')->first();
        $group = $group->group_wa;
        return view('participant.peserta-cso.dashboard', compact('group'));
    }
    public function detailTimCso() { return view('participant.peserta-cso.detail-tim'); }
    public function gantiPasswordCso() { return view('participant.peserta-cso.ganti-password'); }

    // UI/UX
    public function dashboardUiux() {
        $uiux = Uiux::where('user_id', Auth::user()->id)->first();
        $final = $uiux->finalis;
        $group = Competition::where('id', '8')->first();
        $group = $group->group_wa;
        return view('participant.peserta-uiux.dashboard', compact('group', 'final'));
    }
    public function detailTimUiux() { 
        $uiux = Uiux::where('user_id', Auth::user()->id)->first();
        $final = $uiux->finalis;
        return view('participant.peserta-uiux.detail-tim', compact('final'));
    }
    public function penyisihanUiux() {
        $uiux = Uiux::where('user_id', Auth::user()->id)->first();
        $team_id = $uiux->id;
        $final = $uiux->finalis;
        return view('participant.peserta-uiux.penyisihan', compact('team_id', 'final'));
    }
    public function finalUiux() {
        $uiux = Uiux::where('user_id', Auth::user()->id)->first();
        $uiux = Uiux::where('user_id', Auth::user()->id)->first();
        $team_id = $uiux->id;
        $final = $uiux->finalis;
        if ($uiux->finalis == 1) {
            return view('participant.peserta-uiux.final', compact('team_id', 'final'));
        }
        return redirect('/peserta-uiux');
    }
    public function gantiPasswordUiux() {
        $uiux = Uiux::where('user_id', Auth::user()->id)->first();
        $final = $uiux->finalis;
        return view('participant.peserta-uiux.ganti-password', compact('final'));
    }

    // BPC
    public function dashboardBpc() {
        $bpc = Bpc::where('user_id', Auth::user()->id)->first();
        $team_id = $bpc->id;
        $final = $bpc->finalis;
        $group = Competition::where('id', '9')->first();
        $group = $group->group_wa;
        return view('participant.peserta-bpc.dashboard', compact('team_id', 'final', 'group'));
    }
    public function detailTimBpc() {
        $bpc = Bpc::where('user_id', Auth::user()->id)->first();
        $team_id = $bpc->id;
        $final = $bpc->finalis;
        return view('participant.peserta-bpc.detail-tim', compact('team_id', 'final'));
    }
    public function tahap2Bpc() {
        $bpc = Bpc::where('user_id', Auth::user()->id)->first();
        $team_id = $bpc->id;
        $final = $bpc->finalis;
        if ($bpc->finalis != 0) {
            return view('participant.peserta-bpc.tahap2', compact('team_id', 'final'));
        }
        return redirect('/peserta-bpc');
    }
    public function finalBpc()
    {
        $bpc = Bpc::where('user_id', Auth::user()->id)->first();
        $team_id = $bpc->id;
        $final = $bpc->finalis;
        if ($bpc->finalis == 2) {
            return view('participant.peserta-bpc.final', compact('team_id', 'final'));
        }
        return redirect('/peserta-bpc');
    }
    public function gantiPasswordBpc() { 
        $bpc = Bpc::where('user_id', Auth::user()->id)->first();
        $team_id = $bpc->id;
        $final = $bpc->finalis;
        return view('participant.peserta-bpc.ganti-password', compact('team_id', 'final'));
    }

    // form pendaftaran lomba non-akademik
    public function pendaftaranMl() { return view('participant.pendaftaran.ml'); }
    public function pendaftaranPes() { return view('participant.pendaftaran.pes'); }
    public function pendaftaranPubg() { return view('participant.pendaftaran.pubg'); }
    public function pendaftaranFutsal() {
        $data = [ 'title' => 'Futsal', 'category' => '1', ];
        return view('participant.pendaftaran.sport', compact('data'));
    }
    public function pendaftaranBasketPutri() {
        $data = [ 'title' => 'Basket Putri', 'category' => '3', ];
        return view('participant.pendaftaran.sport', compact('data'));
    }
    public function pendaftaranBasketPutra() {
        $data = [ 'title' => 'Basket Putra', 'category' => '2', ];
        return view('participant.pendaftaran.sport', compact('data'));
    }
    public function pendaftaranFotografi() { return view('participant.pendaftaran.fotografi'); }
    public function pendaftaranVideografi() { return view('participant.pendaftaran.videografi'); }
    public function pendaftaranSoloCover() { return view('participant.pendaftaran.solo-cover'); }
    public function closeReg() { return view('participant.pendaftaran.closereg'); }
}
