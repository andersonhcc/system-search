<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

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
