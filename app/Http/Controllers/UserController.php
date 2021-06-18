<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show ()
    {
        return response()->json(['user' => auth()->user()], 200);
    }

    public function update (Request $request)
    {
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users',
            'password' => 'string|min:8',
            'job_title' => 'string|nullable',
            'phone_number' => 'string|nullable',
            'linkedin_url' => 'string|nullable',
            'github_url' => 'string|nullable',
            'website_url' => 'string|nullable',
        ]);

        $user = auth()->user();

        $user->update($request->all());

        return response()->json(['user' => $user], 200);
    }
}
