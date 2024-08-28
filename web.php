<?php

use App\Models\Event;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\UserController;


Auth::routes();


//guest routes

Route::get('/', [\App\Http\Controllers\front\EventController::class, 'index'])->name('front.event.index');
Route::get('/allevents', [\App\Http\Controllers\front\EventController::class, 'allEvents'])->name('front.event.all');
Route::get('/events/{slug}', [\App\Http\Controllers\front\EventController::class, 'show'])->name('front.events.show');




//dashbord routes
Route::get('admin/dashboard', [\App\Http\Controllers\AdminDashboardController::class, 'index']);
Route::get('event/index', [EventController::class, 'index'])->name('event.index');
Route::get('event/create', [EventController::class, 'create'])->name('event.create');
Route::post('event/store', [EventController::class, 'store'])->name('event.store');
Route::get('event/edit/{id}', [EventController::class, 'edit'])->name('event.edit');
Route::put('/event/update/{id}', [EventController::class, 'update'])->name('event.update');
Route::get('event/delete/{id}', [EventController::class, 'delete'])->name('event.delete');

Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
Route::put('/profile', [UserController::class, 'update'])->name('profile.update');





//only admin can access these routes
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('pending/events', [EventController::class, 'pending'])->name('event.pending');
    Route::get('/event/approve/{id}', [EventController::class, 'approve'])->name('event.approve');
    Route::get('user/index', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    // routes/web.php
Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

   
});
