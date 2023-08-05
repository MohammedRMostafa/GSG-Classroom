<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomsController;
use App\Http\Controllers\ClassworkController;
use App\Http\Controllers\JoinClassroomController;
use App\Http\Controllers\TopicsController;

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



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



Route::middleware('auth')->group(function () {


    #==============================Classroom====================================
    Route::get('/', [ClassroomsController::class, 'index'])
        ->name('classrooms.index');

    Route::prefix('/classrooms/trashed')->as('classroom.trashed')->controller(ClassroomsController::class)->group(function () {
        Route::get('/', 'trashed');
        Route::put('{classroom}', 'restore')->name('.restore');
        Route::delete('/{classroom}', 'forceDelete')->name('.force-deletes');
    });

    Route::resource('classrooms', ClassroomsController::class)
        ->where(['classroom', '\d+'])
        ->except('index');

    Route::get('classrooms/{classroom}/join', [JoinClassroomController::class, 'create'])
        ->middleware('signed')
        ->name('classrooms.join');
    Route::post('classrooms/{classroom}/join', [JoinClassroomController::class, 'store']);
    #================================Topic======================================

    Route::prefix('classroom/{classroom}/topics/trashed')->as('classroom.topics.trashed')->controller(TopicsController::class)
        ->group(function () {
            Route::get('/', 'trashed');
            Route::put('/{topic}', 'restore')->name('.restore');
            Route::delete('/{topic}', 'forceDelete')->name('.force-deletes');
        });
    Route::resource('classroom.topics', TopicsController::class)
        ->where(['topic', '\d+'])
        ->except('show');

    #================================Classwork======================================

    Route::resource('classrooms.classworks', ClassworkController::class);
});
