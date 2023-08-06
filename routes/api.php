<?php

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotController;
use App\Http\Controllers\CandidateController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/bot-message', [BotController::class, 'handleMessage']);
Route::middleware('api.key')->post('/bot-message', [BotController::class, 'handleMessage']);

Route::resource('result_candidates', CandidateController::class);

// Route::any('/search', function (Request $request) {
//     $query = $request->input('query');

//     $candidates = Candidate::where('matricule', $query)->get();

//     return response()->json($candidates);
// });

