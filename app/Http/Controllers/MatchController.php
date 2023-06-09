<?php

namespace App\Http\Controllers;

use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use App\Models\Matches;
use App\Models\User;

class MatchController extends Controller
{
    public function index(){

        $search = request("search");

        if($search){
            $matches = Matches::where([
                ['title', 'like','%'.$search.'%']
            ])->get();
        }else{
            $matches = Matches::all();

        }
      return view('welcome', ['matches' => $matches, 'search' => $search]);


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
        $matche->date = $request->date;
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

        $user = auth()->user();
        $matche->user_id = $user->id;

        $matche->save();
        return redirect('/')->with('msg', 'Pelada criada com sucesso!');
    }

    public function show($id){

        $match= Matches::findOrFail($id);

        $user = auth()->user();
        $hasUserJoined = false;
        if($user){

            $userEvents = $user->matchesAsParticipant->toArray();
            foreach ($userEvents as $userEvent){
                if($userEvent['id'] == $id){
                    $hasUserJoined = true;
                }
            }
        }


        $matchOwner = User::where('id', '=', $match->user_id)->first()->toArray();

        return view('matches.show', ['match' => $match, "matchOwner" => $matchOwner, "hasUserJoined" => $hasUserJoined]);

    }

    public function dashboard(){
        $user = auth()->user();

        $matches = $user->matches;

        $matchesAsParticipant = $user->matchesAsParticipant;

        return view('matches.dashboard', ['matches' => $matches, 'matchesAsParticipant' => $matchesAsParticipant]);
    }

    public function destroy($id){

        Matches::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Pelada excluido com sucesso!');
    }

    public function edit($id){
        $match= Matches::findOrFail($id);

        $user = auth()->user();

        if($user->id != $match->user->id) return redirect("/dashboard");

        return view('matches.edit', ['match' => $match]);
    }

    public function update(Request $request){
        $data=$request->all();

        if($request->hasFile("image") && $request->file('image')->isValid()){
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->image->move(public_path("/img/matches"), $imageName );

            $data["image"] = $imageName;
        }

     Matches::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Pelada editada com sucesso!');
    }

    public function joinMatch($id){
        $user = auth()->user();

        $user->matchesAsParticipant()->attach($id);

        $match= Matches::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Presença confirmada na pelada '. $match->title);

    }

    public function leaveMatch($id){

        $user = auth()->user();
        $match= Matches::findOrFail($id);
        $user->matchesAsParticipant()->detach($id);
        return redirect('/dashboard')->with('msg', 'Presença removida com sucesso '. $match->title);

    }
}
