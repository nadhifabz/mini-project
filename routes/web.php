<?php

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

// Route::get('/', function () {
//     return view('login.index');
// })->name('login');

Route::get('/', function () {
    return view('dashboard.index',[
        "active" => ""
    ]);
})->middleware('auth.basic');

Route::get('/companies/list', [CompanyController::class, 'list'])->middleware('auth.basic');
Route::get('/employees/list', [EmployeesController::class, 'list'])->middleware('auth.basic');

Route::resource('/companies', CompanyController::class)->middleware('auth.basic');
Route::resource('/employees', EmployeesController::class)->middleware('auth.basic');

// Route::post('/login', [LoginController::class, 'authenticate']);
// Route::post('/logout', []);