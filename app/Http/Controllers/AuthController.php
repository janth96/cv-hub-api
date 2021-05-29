<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

  public function register (Request $request) {
    // Validate credentials
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8'/*, 'confirmed'*/],
    ]);

    return User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);
  }

  public function login (Request $request) {

    $user = User::where('email', $request['email'])->first();

    // User not found
    if(!$user) return response()->json(["message" => "user not found"], 404);

    // Log in user
    $credentials = $request->only(['email', 'password']);
    $token = auth()->attempt($credentials);

    // Return token
    if($token) {
      return response()->json(['token' => $token], 200);
    }

    // False credentials
    return response()->json([
      'data' => null,
      'status' => "error",
      'message' => "incorrect user-password combination",
    ], 401);
  }
}
