@extends('layouts.main')
@section('title', 'HC Arenas')
@section('content')
    <div id="search-container" class="col-md-12">
        <h1>Busque uma pelada</h1>
        <form action="/" method="get">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        @if($search)
            <h2>Buscando por {{$search}} </h2>

        @else
            <h2>Próximas Peladas ⚽ </h2>
        @endif
        <p class="subtitle">Veja as peladas dos próximos dias</p>
        <div id="cards-container" class="row">
            @foreach($matches as $match)
                <div class="card col-md-3">
                    <img src="/img/matches/{{$match->image}}" alt="{{ $match->title }}">
                    <div class="card-body">
                        <p class="card-date">{{date('d/m/Y', strtotime($match->date))}}</p>
                        <h5 class="card-title">{{ $match->title }}</h5>
                        <p class="card-participants">X Participantes</p>
                        <a href="/matches/{{$match->id}}" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach
            @if(count($matches) === 0 && $search)
                <p>Não foi possível encontrar uma pelada com {{$search}}! <a href="/">Ver todos</a></p>
                @elseif(count($matches) === 0)
                    <p>Não há peladas disponíveis</p>

                @endif
        </div>
    </div>

@endsection

