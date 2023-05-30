<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index(){
        return view('welcome');

    }
    public function create(){
        return view('matches.create');
    }

    public function session(){
        return view('matches.create');

    }
}
