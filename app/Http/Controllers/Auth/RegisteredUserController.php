<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $zones = Zone::all();
        return view('auth.register', compact('zones'));
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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'zone_id' => 'required|exists:zones,id',
        ]);

        // ✅ Aquí se obtiene la zona seleccionada
        $zone = Zone::findOrFail($request->zone_id);

        // Validar si la zona está disponible
        if (!$zone->available || $zone->vacancies <= 0) {
            return back()->withErrors(['zone_id' => 'La zona seleccionada no está disponible o ya fue ocupada.']);
        }

        // ✅ Crear el usuario con la zona seleccionada
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'zone_id' => $zone->id, // 💡 aquí es donde estaba fallando
        ]);

        // Reducir vacantes
        $zone->vacancies -= 1;
        if ($zone->vacancies <= 0) {
            $zone->available = false;
        }
        $zone->save();

        event(new Registered($user));
        Auth::login($user);

        return redirect(route('home', absolute: false));
    }

}
