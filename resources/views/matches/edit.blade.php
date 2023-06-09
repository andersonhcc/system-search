@extends('layouts.main')

@section('title', 'Editando: ' . $match->title)

@section('content')

    <div id="event-create-container" class="col-md-6 offset-md-3">
        @php
            $dateString = substr($match->date, 0, 10);
            $date = new DateTime($dateString);
            $formattedDate = $date->format('Y-m-d');
                        if ($date) {
                            $formattedDate = $date->format('Y-m-d');
                        } else {
                            $formattedDate = "";
                        }
        @endphp
        <h1>Editando: {{ $match->title }}</h1>
        <form action="/matches/update/{{ $match->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="image">Imagem da Pelada:</label>
                <input type="file" id="image" name="image" class="from-control-file">
                <img src="/img/matches/{{ $match->image }}" alt="{{ $match->title }}" class="img-preview">
            </div>
            <div class="form-group">
                <label for="title">Pelada:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome da pelada" value="{{ $match->title }}">
            </div>
            <div class="form-group">
                <label for="date">Data da pelada:</label>
                <input type="date" class="form-control" id="date" name="date" value="{{$formattedDate }}">
            </div>
            <div class="form-group">
                <label for="title">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local da pelada" value="{{ $match->city }}">
            </div>
            <div class="form-group">
                <label for="title">A pelada é privada?</label>
                <select name="private" id="private" class="form-control">
                    <option value="0">Não</option>
                    <option value="1" {{ $match->private == 1 ? "selected='selected'" : "" }}>Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Descrição:</label>
                <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer na pelada?">{{ $match->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="title">Adicione itens de infraestrutura:</label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Palco"> Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cerveja grátis"> Cerveja grátis
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Open Food"> Open food
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Brindes"> Brindes
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Editar Evento">
        </form>
    </div>

@endsection
