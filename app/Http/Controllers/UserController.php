<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show ()
    {
        return response()->json(['user' => auth()->user()], 200);
    }
    // 
    // public function update (Request $request)
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8'/*, 'confirmed'*/],
    //         ''
    //     ])
    //
    //     $user = auth()->user()->update([
    //
    //     ]);
    //
    //     return response()->json(, 200);
    // }
}
