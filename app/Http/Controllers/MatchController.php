<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matches;

class MatchController extends Controller
{
    public function index(){
      $matches = Matches::all();

      return view('welcome', ['matches' => $matches]);


    }
    public function create(){
        return view('create');
    }

    public function session(){
        return view('matches.create');

    }

    public function store(Request $request){
        $matche = new Matches;

        $matche->title = $request->title;
        $matche->city = $request->city;
        $matche->private = $request->private;
        $matche->description = $request->description;

        $matche->save();

        return redirect('/');


    }
}
