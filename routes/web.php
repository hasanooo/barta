<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/registration',[AdminController::class,'registrationindex'])->name('registration');
Route::get('/login',[AdminController::class,'loginindex'])->name('login');
Route::get('/profile',[AdminController::class,'profileindex'])->name('profile');
Route::get('/profile_edit',[AdminController::class,'editprofile'])->name('editprofile');
Route::post('/registrationsubmit',[AdminController::class,'registration_form_submit'])->name('registration_sumbit');
Route::post('/loginsubmit',[AdminController::class,'loginsubmit'])->name('login_sumbit');