<?php

use App\Http\Controllers\Participant\CompetitorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('form',[CompetitorController::class,'index'])->name('form');
Route::post('select/value',[CompetitorController::class,'search_select_value']);
Route::post('form/register',[CompetitorController::class,'register_competitor']);



require __DIR__.'/auth.php';
