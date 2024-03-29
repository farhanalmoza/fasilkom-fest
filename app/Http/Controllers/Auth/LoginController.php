<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ( auth()->user()->role_id == 1 ) {
                return redirect('admin');
            } else if ( auth()->user()->role_id == 2 ) {
                return redirect('peserta-cso');
            } elseif ( auth()->user()->role_id == 3 ) {
                return redirect('peserta-uiux');
            } elseif ( auth()->user()->role_id == 4 ) {
                return redirect('peserta-bpc');
            } elseif ( auth()->user()->role_id == 27) {
                return redirect('panitia-sport');
            } elseif ( auth()->user()->role_id == 26) {
                return redirect('panitia-esport');
            } elseif ( auth()->user()->role_id == 28) {
                return redirect('panitia-art');
            } elseif ( auth()->user()->role_id == 24) {
                return redirect('panitia-bpc');
            } elseif ( auth()->user()->role_id == 11) {
                return redirect('panitia-cso');
            } elseif ( auth()->user()->role_id == 25) {
                return redirect('panitia-uiux');
            }

            return $this->sendLoginResponse($request);
        }
        
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
}
