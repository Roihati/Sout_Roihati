<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();
        $user = Auth::user();
        if( $user &&  $user->role_id==3){
            return redirect()->intended(route('fournisseur.accueil', absolute: false));

        }else if($user && $user->role_id==2){
            return redirect()->intended(route('suppermarche.dashboard', absolute: false));

       }else if($user && $user->role_id==1){
        return redirect()->intended(route('client.Home', absolute: false));

       }else if($user && $user->role_id==4){
        return backpack_url('/admin/dashboard');
       }else{
        redirect('/');
       }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}