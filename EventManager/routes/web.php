<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController; 

//Get route example
//Route::get('/', function () {
//  return view('events.index');
//});

//Parameters using routes
//Route::get('/contact/{firstname}/{lastname}', function ($firstname, $lastname){
//  return view('contact');
//  return $firstname . " " . $lastname;
//});

//Named Routes
//Route::get('/test', function () {
//  return "This is a test heheheha";
//})->name("testpage");

//Portfolio related routes
//Route::get('/portfolio', function () {
//  return view('portfolio');
//});

//Route::prefix("portfolio")->group(function(){
//  Route::get('/company', function () {
//      return view('home');
//  });

//  Route::get('/organization', function () {
//     //return view('organization');
//      return "This is a test heheheha";
//  });
//});



//route to Events -> index
Route::get('/', [EventController::class, 'index'])->name('event.index');
Route::get('/create', [EventController::class, 'create'])->name('event.create');
Route::post('/create', [EventController::class, 'save'])->name('event.save');
Route::get('/{event}/edit', [EventController::class, 'edit'])->name('event.edit');
Route::put('/{event}/update', [EventController::class, 'update'])->name('event.update');
Route::delete('/{event}/destroy', [EventController::class, 'destroy'])->name('event.destroy');