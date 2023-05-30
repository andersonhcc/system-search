<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatchController;

Route::get('/',[MatchController::class, 'index']);

Route::get('/matches/create',[MatchController::class, 'create']);


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
