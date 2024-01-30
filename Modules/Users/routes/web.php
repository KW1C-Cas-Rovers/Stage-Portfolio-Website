<?php

use Illuminate\Support\Facades\Route;
use Modules\Users\app\Http\Controllers\Auth\LoginController;
use Modules\Users\app\Http\Controllers\Auth\RegisterController;
use Modules\Users\app\Http\Controllers\UsersController;

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

// Authentication Routes
Route::middleware('guest')->namespace('Modules\Users\app\Http\Controllers\Auth')->prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.post');

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('admin.register.show');
    Route::post('/register', [RegisterController::class, 'register'])->name('admin.register.post');
});

// Authenticated Routes
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout.post');

    Route::resource('users', UsersController::class)->names('users')->except('destroy');
    Route::put('/admin/users/{user}/update-password', [UsersController::class, 'updatePassword'])->name('users.updatePassword');
    Route::put('/admin/users/{id}/update-role', [UsersController::class, 'updateRole'])->name('users.updateRole');
});

//role middleware you can use:

/*
 |--------------------------------------------------------------------------
 | role middleware you can use:
 |--------------------------------------------------------------------------
 |
 | role:super-admin
 | role:editor
 | role:author
 | role:user
 |
 */

// Authenticated Routes with Role Middleware
Route::middleware(['auth', 'role:super-admin'])->prefix('admin')->group(function () {
    // Routes accessible only to super-admin
    // Example: Super Admin only can manage users
    // Route::resource('/users', UsersController::class)->names('users');

    Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');
});

Route::middleware(['auth', 'role:editor'])->prefix('admin')->group(function () {
    // Routes accessible only to editors
    // Example: The editor can only edit the user information/password
    // Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
});

Route::middleware(['auth', 'role:author'])->prefix('admin')->group(function () {
    // Routes accessible only to authors
    // Example: The Author can create/edit the pages
    // Route::get('/pages/{page}/edit', [PagesController::class, 'edit'])->name('pages.edit');
    // Route::get('/pages/create', [PagesController::class, 'create'])->name('pages.create');
});

Route::middleware(['auth', 'role:user'])->prefix('admin')->group(function () {
    // Routes accessible only to users
    // Example: The user can only edit his own information/password and can only view the pages content not edit
    // Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
});
