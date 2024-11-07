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
        // Authentifier l'utilisateur
        $request->authenticate();
        
        // Régénérer la session
        $request->session()->regenerate();

        // Récupérer l'utilisateur authentifié
        $user = Auth::user();

        // Redirection en fonction du rôle de l'utilisateur
        if ($user) {
            switch ($user->role_id) {
                case 1:
                    return redirect()->intended(route('client.Home'));
                case 2:
                    return redirect()->intended(route('fournisseur.accueil'));
                case 3:
                    return redirect()->intended(route('suppermarche.dashboard'));
                case 4:
                    return redirect(backpack_url('/admin/dashboard'));
                default:
                    return redirect('/');
            }
        }

        // Si l'utilisateur n'est pas authentifié, rediriger vers la page d'accueil
        return redirect('/');
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