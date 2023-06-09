<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatchController;

Route::get('/',[MatchController::class, 'index']);
Route::get('/matches/create',[MatchController::class, 'create'])->middleware('auth');
Route::post('/matches',[MatchController::class, 'store']);
Route::get('/matches/{id}',[MatchController::class, 'show']);
Route::get('/dashboard',[MatchController::class, 'dashboard'])->middleware('auth');
Route::delete('/matches/{id}',[MatchController::class, 'destroy'])->middleware('auth');
Route::get('/matches/edit/{id}',[MatchController::class, 'edit'])->middleware('auth');
Route::put('/matches/update/{id}',[MatchController::class, 'update'])->middleware('auth');
Route::post('/matches/join/{id}',[MatchController::class, 'joinMatch'])->middleware('auth');
Route::delete('/matches/leave/{id}',[MatchController::class, 'leaveMatch'])->middleware('auth');



Route::get('/helloview', function () {

    $teste = ["Anderson", "Henrique"];

    $array = [1, 2, 3, 5,6, 10, 20];

    $names = ["Anderson", "Henrique", "Costa", "Carvalho"];


    return view('helloview',
        [ 'name' => $teste, "numbers" => $array, "names" => $names]);
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/produto/{id?}', function ($id = 1) {

    $search = request("search");

   return view ('produtos', ["id" => $id, "search" => $search]);
});
