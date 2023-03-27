<?php

use App\Http\Controllers\EmployeeController;
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

Route::get('/employee',[EmployeeController::class, 'index'])->name('employee');
Route::get('/add-employee',[EmployeeController::class, 'addEmployee'])->name('add_employee');
Route::post('/employee-store',[EmployeeController::class, 'store'])->name('employee_store');
Route::get('/employee-edit/{id}',[EmployeeController::class, 'edit'])->name('employee_edit');
Route::post('/employee-update/{id}',[EmployeeController::class, 'update'])->name('employee_update');
Route::get('/employee-delete/{id}',[EmployeeController::class, 'delete'])->name('employee_delete');