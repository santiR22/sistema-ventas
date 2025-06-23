<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $titulo = "Login de usuarios";
        return view("modules.auth.login", compact("titulo"));
    }

    public function login(Request $request)
    {
        // Validate the request data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        //validar usuario y contraseña
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Credenciales incorrectas.'])->withInput();
        }

        // Validar si el usuario está activo
        if (!$user->activo) {
            return back()->withErrors(['email' => 'El usuario no está activo.'])->withInput();
        }

        // Iniciar sesión
        Auth::login($user);
        $request->session()->regenerate();

        return to_route('home');
    }

    public function createAdmin()
    {
        // Crear un usuario administrador si no existe
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
            'activo' => true,
            'rol' => 'admin'
        ]);
        return response()->json(['message' => 'Usuario administrador creado exitosamente.']);
    }

    //logout fuction
    public function logout()
    {
        Auth::logout();
        /* $request->session()->invalidate();
        $request->session()->regenerateToken(); */

        return to_route('login');
        //return to_route('login')->with('message', 'Sesión cerrada exitosamente.');
    }
}
