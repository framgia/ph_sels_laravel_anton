<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserSettingsController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user/settings', [UserSettingsController::class, 'index'])->name('user.settings');
Route::put('/user/settings/updateAvatar', [UserSettingsController::class, 'updateAvatar'])->name('user.updateAvatar');

Route::get('/users/settings/changePassword',  [UserSettingsController::class, 'changePassword'])->name('user.changePassword');
Route::put('/users/settings/updatePassword',  [UserSettingsController::class, 'updatePassword'])->name('user.updatePassword');

Route::get('/users/settings/userDetails',  [UserSettingsController::class, 'userDetails'])->name('user.details');
Route::put('/user/settings/updateDetails', [UserSettingsController::class, 'updateDetails'])->name('user.updateDetails');
