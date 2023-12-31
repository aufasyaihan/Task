<?php

use App\Http\Controllers\taskController;
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
Route::get('task/completed', [taskController::class, 'completed']);
Route::get('task/incomplete', [taskController::class, 'incomplete']);
Route::resource('task', taskController::class); //ini udah Route CRUD semuanya pak
Route::put('task/{id}/status', [taskController::class, 'updateStatus']);