<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\QueryException;

// use App\Models\User;

use App\Http\Controllers\AuthController;
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

Route::middleware('auth')->get('/user', function () {
    return auth()->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/me', function () {
  return response()->json(auth()->user(), 200);
});

// // Get authenticated user
// Route::middleware('auth')->get('/me', function (){
//   return auth()->user();
// });

Route::get('/resumes', [ResumeController::class, 'index']);
