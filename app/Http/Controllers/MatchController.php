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
        $matche->items = $request->items;

        if($request->hasFile("image") && $request->file('image')->isValid()){
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->image->move(public_path("/img/matches"), $imageName );

            $matche->image = $imageName;
        }

        $matche->save();
        return redirect('/')->with('msg', 'Pelada criada com sucesso!');
    }

    public function show($id){

        $match= Matches::findOrFail($id);

        return view('matches.show', ['match' => $match]);

    }
}
