<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Demandante;
use App\Models\Seleccionador;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
// Roles
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $user = User::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'genero' => $request->genero,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        $user->save();

        if ($request->rol === 'Demandante') {
            $demandante = Demandante::create(['id' => $user->id]);
            $demandante->save();
            $user->assignRole('demandante');

        } else {
            $seleccionador = Seleccionador::create(['id' => $user->id]);
            $seleccionador->save();
            $user->assignRole('seleccionador');
        }

        event(new Registered($user));

        Auth::login($user);

        $request->session()->flash('mensajeRegistro', 'Se ha registrado correctamente.');

        return redirect('/vincular-empresa');
    }
}
