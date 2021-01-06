<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/students',[StudentController::class, 'list'])->name('liststudents');

Route::get('/addstudent',[StudentController::class, 'showForm'])->name('addstudent');

Route::post('/addstudent',[StudentController::class, 'addStudent']);

Route::get('/editstudent/{id}',[StudentController::class, 'edit'])->name('editstudent');

Route::post('/editstudent',[StudentController::class, 'updateStudent']);

Route::get('/deletestudent/{id}',[StudentController::class, 'deleteStudent']);


Route::get('/teachers',[TeacherController::class, 'index'])->name('listteachers');

Route::get('/addteacher',[TeacherController::class, 'showForm'])->name('addteacher');

Route::post('/addteacher',[TeacherController::class, 'addTeacher']);



