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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'/*, 'confirmed'*/],
            'job_title' => ['string'],
            'phone_number' => ['string'],
            'linkedin_url' => ['string'],
            'github_url' => ['string'],
            'website_url' => ['string'],
        ])

        $user = auth()->user()->update($request);

        return response()->json(, 200);
    }
}
