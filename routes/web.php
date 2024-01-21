<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\AjaxController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['menu']], function() {

    Route::get('/', [PageController::class, 'home'])->name('home');
    
    Route::get('/page', [PageController::class, 'page'])->name('page');

    // CV
    Route::get('/cv', function() { return view('page.cv.main'); })->name('cv');
    Route::get('/cv/experience', function() { return view('page.cv.experience'); })->name('cv.experience');

    // Projects
    Route::get('/projects/games', function() { return view('page.projects.games'); })->name('projects.games');
    Route::get('/projects/websites', function() { return view('page.projects.websites'); })->name('projects.websites');

});

// AJAX REQUESTS
Route::post('/ajax/session/save', [AjaxController::class, 'saveSession']);
