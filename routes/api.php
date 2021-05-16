<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

use App\Http\Controllers\ResumeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});

// Create a user
Route::get('/user-create', function(Request $request) {
  User::create([
    'email' => "jan@jan.jan",
    'name' => 'Jan',
    'password' => Hash::make('mypassword'),
  ]);
});

// Log in a user
Route::post('/login', function(Request $request) {

  $credentials = $request->only(['email', 'password']);

  $token = auth()->attempt($credentials);

  return $token;
});

// Get authenticated user
Route::middleware('auth')->get('/me', function (){
  return auth()->user();
});

// Route::get('/resumes', [ResumeController::class, 'index']);
