<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/',[TaskController::class,'index'])->name('dashboard');
Route::resource('/task',TaskController::class)->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/todolist', [TaskController::class, 'index'])->name('todolist.index');
// Route::post('/add', [TaskController::class, 'store'])->name('todolist.store');

// Route::get('auth/github', [SocialController::class, 'githubRedirect'])->name('login.github');




Route::get('google-auth',[SocialController::class,'redirect'])->name('google-auth');
Route::get('auth/callback/google', [SocialController::class, 'callbackGoogle']);

require __DIR__.'/auth.php';
