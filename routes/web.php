<?php

use App\Models\User;
use App\Http\Livewire\RolesTable;
use App\Http\Livewire\UsersTable;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Gate;


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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');





//Route::middleware(['auth:sanctum', 'verified'])->get('users',UsersTable::class)->name('users');
//Route::middleware(['auth:sanctum', 'verified'])->get('roles',RolesTable::class)->name('roles');

Route::get('/test', function () {
    $user = User::find(2);

    //return $user->Tpermiso('user.index');
    Gate::authorize('tAccess','role.index');
    return $user;
});

Route::middleware(['auth:sanctum', 'verified'])->resource('role',RoleController::class)->names('role');
