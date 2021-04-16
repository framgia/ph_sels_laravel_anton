<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LessonController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserSettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserFollowController;
use App\Http\Controllers\WordsController;
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

Route::post('/follow/{user}', [UserFollowController::class, 'store'])->name('user.follow');
Route::post('/unfollow/{user}', [UserFollowController::class, 'destroy'])->name('user.unfollow');

Route::get('/users/{user}', [UserController::class, 'show'])->name('user.show');;

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/category/{category}/words', [WordsController::class, 'index'])->name('words.index');
Route::post('/category/{category}/words', [WordsController::class, 'store'])->name('words.store');
Route::get('/category/{category}/words/create', [WordsController::class, 'create'])->name('words.create');
Route::delete('/category/{category}/words/{word}', [WordsController::class, 'destroy'])->name('words.destroy');

Route::get('/category/{category}/lesson', [LessonController::class, 'index'])->name('lesson.index');
Route::post('/category/{category}/lesson', [LessonController::class, 'store'])->name('lesson.store');
Route::get('/category/{category}/lesson/result', [LessonController::class, 'result'])->name('lesson.result');
