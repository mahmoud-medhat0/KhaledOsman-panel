<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\CodesController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\theme;

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

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false,
    'home' => false, // Email Verification Routes...
  ]);
Route::controller(AdminsController::class)->group(function(){
    Route::get('admin/list','index')->name('adminlist');
    Route::get('admin/add','add')->name('adminadd');
    Route::post('admin/insert','storeadmin')->name('storeadmin');
    Route::delete('admin/delete/{id}','admindelete')->name('admindelete');
    Route::post('admin/edit/','edit')->name('adminedit');
    Route::post('admin/update','adminupdate')->name('adminupdate');
});
Route::controller(LessonController::class)->middleware('auth')->group(function () {
    Route::get('lesson/create','create')->name('lesson.create');
    Route::post('lesson/store','store')->name('lesson.store');
    Route::get('lesson/show','show')->name('lesson.show');
    Route::get('lesson/edit/{id}','edit')->name('lesson.edit');
    Route::put('lesson/update/{id}','update')->name('lesson.update');
    Route::get('lesson/destroy/{id}','destroy')->name('lesson.destroy');
    Route::get('lesson/view/{id}','view')->name('lesson.view');
    Route::post('storage/private/uploads/{filename}','show1')->name('video.play');
    Route::get('secured-video-segment/{segment}', 'streamSegment')->name('secured.video.segment');
});
Route::controller(StudentsController::class)->group(function(){
    Route::get('student/all','index')->name('student.index');
    Route::get('student/create','create')->name('student.create');
    Route::post('student/store','store')->name('student.store');
    Route::get('student/edit/{id}','edit')->name('student.edit');
    Route::put('student/update/{id}','update')->name('student.update');
    Route::delete('student/destroy/{id}','destroy')->name('student.destroy');
});
Route::controller(CodesController::class)->group(function(){
    Route::get('codes/all','index')->name('codes.index');
    Route::get('codes/create','create')->name('codes.create');
    Route::post('code/store','store')->name('codes.store');
});
Route::controller(theme::class)->group(function (){
    Route::get('theme/dark','setdark')->name('themedark');
    Route::get('theme/light','setlight')->name('themelight');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
