<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Participant\CompetitorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('form',[CompetitorController::class,'index'])->name('form');
Route::post('select/value',[CompetitorController::class,'search_select_value']);
Route::post('form/register',[CompetitorController::class,'register_competitor']);

Route::group(['middleware'=> ['auth']], function(){
    Route::get('competitors/ward/{idStake}',[WardController::class,'index']);
});


require __DIR__.'/auth.php';
