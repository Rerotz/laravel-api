<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    // 1. Registro de usuarios
    public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'date_of_birth' => 'required|date',
        'gender' => 'required|in:male,female,other',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'date_of_birth' => $request->date_of_birth,
        'gender' => $request->gender,
        'role' => 'user', // O 'admin' si quieres definir el rol de otra forma
    ]);

    return response()->json(['message' => 'User successfully registered'], 201);
}

public function registerAdmin(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'date_of_birth' => 'required|date',
        'gender' => 'required|in:male,female,other',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'date_of_birth' => $request->date_of_birth,
        'gender' => $request->gender,
        'role' => 'admin', // Aquí se establece el rol de administrador
    ]);

    return response()->json(['message' => 'Admin successfully registered'], 201);
}

public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (!$token = JWTAuth::attempt($credentials)) {
        return response()->json(['error' => 'Invalid credentials'], 401);
    }

    // Recuperar el usuario autenticado
    $user = auth()->user();
    $userInfo = [
        'name' => $user->name,
        'email' => $user->email,
        'date_of_birth' => $user->date_of_birth,
        'gender' => $user->gender,
        'role' => $user->role,
    ];

    // Redirigir según el rol del usuario
    return response()->json([
        'token' => $token,
        'user_info' => $userInfo,
    ]);
}


    // 3. Obtener información del usuario autenticado
    public function userProfile()
{
    $user = auth()->user();

    if ($user->role === 'admin') {
        return view('view_administrador', compact('user'));
    } else {
        return view('view_usuario', compact('user'));
    }
}

}
