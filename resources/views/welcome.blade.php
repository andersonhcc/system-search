@extends('layouts.main')
@section('title', 'HC Arenas')
@section('content')
    <div id="search-container" class="col-md-12">
        <h1>Busque uma pelada</h1>
        <form action="">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        <h2>Próximas Peladas ⚽ </h2>
        <p class="subtitle">Veja as peladas dos próximos dias</p>
        <div id="cards-container" class="row">
            @foreach($matches as $match)
                <div class="card col-md-3">
                    <img src="/img/matches/{{$match->image}}" alt="{{ $match->title }}">
                    <div class="card-body">
                        <p class="card-date">10/09/2020</p>
                        <h5 class="card-title">{{ $match->title }}</h5>
                        <p class="card-participants">X Participantes</p>
                        <a href="/matches/{{$match->id}}" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

