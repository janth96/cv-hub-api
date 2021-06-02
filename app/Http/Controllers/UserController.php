<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show ()
    {
        return response()->json(auth()->user(), 200);
    }

    public function update (Request $request)
    {
        return response()->json($request, 200);
    }
}
