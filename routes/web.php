<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserSettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserFollowController;
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

Route::get('/home', [UserController::class, 'index'])->name('home');
Route::get('/users/settings', [UserSettingsController::class, 'index'])->name('user.settings');
Route::put('/users/settings/updateAvatar', [UserSettingsController::class, 'updateAvatar'])->name('user.updateAvatar');

Route::get('/users/settings/changePassword',  [UserSettingsController::class, 'changePassword'])->name('user.changePassword');
Route::put('/users/settings/updatePassword',  [UserSettingsController::class, 'updatePassword'])->name('user.updatePassword');

Route::get('/users/settings/userDetails',  [UserSettingsController::class, 'userDetails'])->name('user.details');
Route::put('/users/settings/updateDetails', [UserSettingsController::class, 'updateDetails'])->name('user.updateDetails');

Route::post('/follow/{user}',[UserFollowController::class, 'store'])->name('user.follow');
Route::post('/unfollow/{user}',[UserFollowController::class, 'destroy'])->name('user.unfollow');

Route::get('users/{user}', [UserController::class, 'show'])->name('user.show');;
