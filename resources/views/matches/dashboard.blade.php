@extends('layouts.main')

@section('title', 'Dasboard')

@section('content')

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Minhas peladas</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if(count($matches) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($matches as $match)
                    <tr>
                        <td scropt="row">{{ $loop->index + 1 }}</td>
                        <td><a href="/matches/{{ $match->id }}">{{ $match->title }}</a></td>
                        <td>{{count($match->users)}}</td>
                        <td>
                            <a href="/matches/edit/{{$match->id}}" class="btn btn-info edit-btn"><ion-icon name="create-outline"> </ion-icon>Editar</a>
                            <form action="/matches/{{$match->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash"></ion-icon>Deletar</button>

                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>Você ainda não tem peladas cadastradas, <a href="/matches/create">criar pelada</a></p>
        @endif
    </div>

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Peladas que estou participando</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if(count($matchesAsParticipant) > 0);
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($matchesAsParticipant as $match)
                <tr>
                    <td scropt="row">{{ $loop->index + 1 }}</td>
                    <td><a href="/matches/{{ $match->id }}">{{ $match->title }}</a></td>
                    <td>{{count($match->users)}}</td>
                    <td>
                        <form method="POST"  action="/matches/leave/{{$match->id}}">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger delete-btn">
                                <ion-icon name="trash-outline"></ion-icon>
                                Sair do evento
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

            @else:
                <p>Você não está participando de nenhuma pelada, <a href="/">veja as peladas disponíveis</a></p>
        @endif
    </div>


@endsection
