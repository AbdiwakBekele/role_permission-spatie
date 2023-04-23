<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
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

//Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Modified Route for admin
Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth', 'verified', 'role:admin'])->name('admin.index');

// Modified Route for Admin with Group
Route::middleware(['auth', 'verified', 'role:admin'])->group(function() {
    Route::resource('/role', RoleController::class);
    Route::resource('/permission', PermissionController::class);
    Route::post('/role/{role_id}/permission', [RoleController::class, 'assignPermission']);
    Route::resource('/user', UserController::class);

    Route::post('/user/{user_id}/role', [UserController::class, 'assignRole']);
    Route::post('/user/{user_id}/permission', [UserController::class, 'assignPermission']);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';