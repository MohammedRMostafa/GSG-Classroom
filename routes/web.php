<?php

use App\Http\Controllers\ClassroomsController;
use App\Http\Controllers\TopicsController;
use App\Models\Classroom;
use Illuminate\Support\Facades\Route;

Route::get('/', [ClassroomsController::class, 'index'])
    ->name('classrooms.index');

Route::resource('classrooms', ClassroomsController::class)
    ->where(['classroom', '\d+'])
    ->except('index');
#================================Topic======================================

Route::resource('topics', TopicsController::class)
    ->where(['topic', '\d+'])
    ->except('show');
