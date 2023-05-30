@extends('layouts.main')
@section('title', 'Produtos')
@section('content')

    <p>o id é {{$id}}</p>

    @if($search != null)
        <p>the user want search for {{ $search }}</p>
    @endif

@endsection
