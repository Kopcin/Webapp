<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/comments', [CommentsController::class, 'index'])->name('comments');
Route::get('/createComment/{event_id}', [CommentsController::class, 'create'])->name('createComment');
Route::post('/createComment/{event_id}', [CommentsController::class, 'store'])->name('storeComment');
Route::get('/deleteComment/{id}', [CommentsController::class, 'destroy'])->name('deleteComment');
Route::get('/editComment/{id}', [CommentsController::class, 'edit'])->name('editComment');
Route::put('/updateComment/{id}', [CommentsController::class, 'update'])->name('updateComment');

Route::get('/events', [EventsController::class, 'index'])->name('events');
Route::get('/create', [EventsController::class, 'create'])->name('create');
Route::post('/create', [EventsController::class, 'store'])->name('store');
Route::get('/delete/{id}', [EventsController::class, 'destroy'])->name('delete');
Route::get('/edit/{id}', [EventsController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [EventsController::class, 'update'])->name('update');