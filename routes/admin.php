<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HomeadminController;

Route::get('', [HomeadminController::class, 'index'])->name('admin.home');
Route::resource('/publication', PublicationController::class);