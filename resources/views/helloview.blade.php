<h1>Hello world!</h1>

<p>Testando a dinamicidade, o meu nome é {{ $name[1] }}</p>
@if($name[0] === "Anderson")
    <p>O seu nome é anderson</p>
@endif

@if($name[1] === "Anderson")
    <p>O seu nome é anderson</p>
@else
    <p>O seu nome é na verdade {{$name[1]}}</p>

@endif

<p>Loops arrays</p>

@for($i = 0 ;$i < count($numbers); $i++)
    <p>{{$numbers[$i]}}</p>
@endfor
@php
$name = "Oi";
echo $name;
@endphp

@foreach($names as $namefor)
    <p>{{$loop->index}}</p>

    <p>{{$namefor}}</p>

@endforeach
