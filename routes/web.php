<?php

use App\Http\Livewire\ApiKey;
use App\Http\Livewire\Search;
use App\Http\Livewire\Settings;
use App\Http\Livewire\HomePanel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\SearchResultController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

//Route::get('/search-result/{query}', 'App\Http\Controllers\SearchResultController@search_result')->name('search_result');


Route::get('/', Search::class)->name('homepage');
// Route securise
Route::get('/panel', HomePanel::class)->name('panel')->middleware('auth'); 
Route::get('/parametre', Settings::class)->name('settings')->middleware('auth');
Route::get('/apikeys', ApiKey::class)->name('apikeys')->middleware('auth');

Route::get('/upload-data', [ImportController::class, 'data'])->name('data')->middleware('auth');
Route::post('importdata', [ImportController::class, 'import'])->middleware('auth');
Route::get('export', [ImportController::class, 'export'])->name('export')->middleware('auth');
Route::get('/candidates/restore', [ImportController::class, 'restoreData'])
->name('candidates.restore')->middleware('auth');



