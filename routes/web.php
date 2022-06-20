<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\ParamFieldController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ParamFieldOptionController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:admin'
])->prefix('admin')->name('admin.')->group(function () {


    Route::get('/', function () {
        return Inertia::render('Admin/Index');
    })->name('index');

    Route::get('/parameter/pre', [SubCategoryController::class, 'index_pre'])->name('parameter.index_pre');
    Route::get('/parameter/pos', [SubCategoryController::class, 'index_pos'])->name('parameter.index_pos');
    Route::get('/parameter/con', [SubCategoryController::class, 'index_con'])->name('parameter.index_con');


    Route::resource('/parameter', SubCategoryController::class);
    Route::resource('/paramfield', ParamFieldController::class);
    Route::resource('/options', ParamFieldOptionController::class);
    Route::resource('/user', UserController::class);
});
Route::get('/dashboard', function () {


    return Inertia::render('Dashboard');
})->name('dashboard');
