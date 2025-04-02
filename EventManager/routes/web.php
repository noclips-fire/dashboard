<?php

use Illuminate\Support\Facades\Route;

//Get route example
Route::get('/', function () {
    return view('home');
});

//Parameters using routes
Route::get('/contact/{firstname}/{lastname}', function ($firstname, $lastname){
    //return view('contact');
    return $firstname . " " . $lastname;
});

//Named Routes
Route::get('/test', function () {
    return "This is a test heheheha";
})->name("testpage");

//Portfolio related routes
Route::get('/portfolio', function () {
    return view('portfolio');
});

Route::prefix("portfolio")->group(function(){
    Route::get('/company', function () {
        return view('home');
    });

    Route::get('/organization', function () {
        //return view('organization');
        return "This is a test heheheha";
    });
});