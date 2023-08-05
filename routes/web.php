<?php

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

Route::prefix('panel')->group(function (){
    Route::get('/',[\App\Http\Controllers\Panel\IndexController::class,'index'])->name('panel.index');

    Route::prefix('event')->group(function (){
        Route::get('/',[\App\Http\Controllers\Panel\EventController::class,'index'])->name('panel.event.index');
        Route::post('/create',[\App\Http\Controllers\Panel\EventController::class,'create'])->name('panel.event.create');
        Route::put('/update',[\App\Http\Controllers\Panel\EventController::class,'update'])->name('panel.event.update');
        Route::delete('/delete',[\App\Http\Controllers\Panel\EventController::class,'delete'])->name('panel.event.delete');
    });
});
