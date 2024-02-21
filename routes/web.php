<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SinhvienController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DatatablesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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

Route::resource('student', StudentController::class)->except('show');


// Route::group(['prefix' => 'student', 'as' => 'student.'], function () {
//     Route::get('/', [StudentController::class, 'index'])->name('index');
//     Route::get('/create', [StudentController::class, 'create'])->name('create');
//     Route::post('/create', [StudentController::class, 'store'])->name('store');
//     Route::delete('/destroy/{student}', [StudentController::class, 'destroy'])->name('destroy');
//     Route::get('/edit/{student}', [StudentController::class, 'edit'])->name('edit');
//     Route::put('/edit/{student}', [StudentController::class, 'update'])->name('update');
// });

Route::group(['prefix' => 'courses', 'as' => 'courses.'], function () {
    Route::get('/', [CourseController::class, 'index'])->name('index');
    Route::get('/create', [CourseController::class, 'create'])->name('create');
    Route::post('/create', [CourseController::class, 'store'])->name('store');
    Route::delete('/destroy/{courses}', [CourseController::class, 'destroy'])->name('destroy');
    Route::get('/edit/{courses}', [CourseController::class, 'edit'])->name('edit');
    Route::put('/edit/{courses}', [CourseController::class, 'update'])->name('update');
});

Route::group(['prefix' => 'sinhvien', 'as' => 'sinhvien.'], function () {
    Route::get('/', [SinhvienController::class, 'index'])->name('index');
    Route::get('/create', [SinhvienController::class, 'create'])->name('create');
    Route::post('/create', [SinhvienController::class, 'store'])->name('store');
    Route::delete('/destroy/{sinhvien}', [SinhvienController::class, 'destroy'])->name('destroy');
    Route::get('/edit/{sinhvien}', [SinhvienController::class, 'edit'])->name('edit');
    Route::put('/edit/{sinhvien}', [SinhvienController::class, 'update'])->name('update');
});

Route::get('/datatables', [DatatablesController::class, 'getIndex'])->name('datatables');
Route::get('/datatables/data', [DatatablesController::class, 'anyData'])->name('datatables.data');


Route::get('/courses/api' , [CourseController::class, 'api'])->name('courses.api');

Route::get('test', function () {
    return view('layout.master');
});