@extends('layouts.main')
@section('title', $match->title)
@section('content')
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/matches/{{ $match->image }}" class="img-fluid" alt="{{ $match->title }}">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $match->title }}</h1>
                <p class="event-city"><ion-icon name="location-outline"></ion-icon> {{ $match->city }}</p>
                <p class="events-participants"><ion-icon name="people-outline"></ion-icon> X Participantes</p>
                <p class="event-owner"><ion-icon name="star-outline"></ion-icon> Dono do Evento</p>
                <a href="#" class="btn btn-primary" id="event-submit">Confirmar Presença</a>
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Sobre a pelada:</h3>
                <p class="event-description">{{ $match->description }}</p>
            </div>
        </div>
    </div>

@endsection
