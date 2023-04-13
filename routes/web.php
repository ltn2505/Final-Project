<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\OnlineController;
use Illuminate\Http\Request;
use App\Models\School;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/user', UserController::class);
Route::resource('/school', SchoolController::class);
Route::resource('/student', StudentController::class);

Route::get('/students/import', [StudentController::class, 'importForm'])->name('students.import.form');
Route::post('/students/import', [StudentController::class, 'import'])->name('students.import');

Route::get('/students/chart', [StudentController::class, 'chart'])->name('students.chart');
Route::post('/students/transform', [StudentController::class, 'transform'])->name('students.transform');
Route::resource('online', OnlineController::class);
