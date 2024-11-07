<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Enums\RoleType;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $roles = RoleType::cases(); // Récupérez les rôles depuis l'énumération
        return view('auth.register', ['roles' => $roles]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role_id' => ['nullable', 'integer', 'in:' . implode(',', array_map(fn($role) => $role->value, RoleType::cases()))],
        ]);

        // Définir un `role_id` par défaut si aucun n'est fourni
        $roleId = $request->role_id ?? Role::where('name', 'client')->first()->id;

        // Créer l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $roleId,
        ]);

        // Assigner le rôle à l'utilisateur
        if ($role = Role::find($roleId)) {
            $user->assignRole($role->name);
        }

        event(new Registered($user));

        return redirect()->route('login')->with('success', 'Inscription réussie ! Vous pouvez maintenant vous connecter.');
    }
}