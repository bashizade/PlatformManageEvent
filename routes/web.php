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
        Route::put('/update/{event}',[\App\Http\Controllers\Panel\EventController::class,'update'])->name('panel.event.update');
        Route::delete('/disable/{event}',[\App\Http\Controllers\Panel\EventController::class,'disable'])->name('panel.event.disable');
        Route::post('/enable/{event}',[\App\Http\Controllers\Panel\EventController::class,'enable'])->name('panel.event.enable');
    });

    Route::prefix('invoice')->group(function (){
        Route::get('/',[\App\Http\Controllers\Panel\InvoiceController::class,'index'])->name('panel.invoice.index');
        Route::post('/create',[\App\Http\Controllers\Panel\InvoiceController::class,'create'])->name('panel.invoice.create');
        Route::put('/update/{invoice}',[\App\Http\Controllers\Panel\InvoiceController::class,'update'])->name('panel.invoice.update');
        Route::delete('/delete/{invoice}',[\App\Http\Controllers\Panel\InvoiceController::class,'delete'])->name('panel.invoice.delete');
        Route::put('/change-status/{invoice}',[\App\Http\Controllers\Panel\InvoiceController::class,'change_status'])->name('panel.invoice.change_status');
    });
});
