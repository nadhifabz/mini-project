<?php

use App\Http\Controllers\ApiClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeesController;

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
    return view('login.index');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard.index',[
        "active" => ""
    ]);
})->middleware('auth');

Route::get('/companies/list', [CompanyController::class, 'list'])->middleware('auth');
Route::get('/employees/list', [EmployeesController::class, 'list'])->middleware('auth');

Route::resource('/companies', CompanyController::class)->middleware('auth');
Route::resource('/employees', EmployeesController::class)->middleware('auth');

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');