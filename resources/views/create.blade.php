@extends('layouts.main')
@section('title', 'Criar Pelada')
@section('content')

    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie a sua Pelada</h1>
        <form action="/matches" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group" id="form-group-id">
                <label for="title">Foto da Arena:</label>
                <input type="file" id="image" name="image" class="form-control-file">
            </div>
            <div class="form-group" id="form-group-id">
                <label for="title">Pelada:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome da pelada">
            </div>
            <div class="form-group" id="form-group-id">

            <label for="title">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local da pelada">
            </div>
            <div class="form-group" id="form-group-id">

            <label for="title">A pelada é privada?</label>
                <select name="private" id="private" class="form-control">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div class="form-group" id="form-group-id">
                <label for="title">Descrição:</label>
                <textarea name="description" id="description" class="form-control" placeholder="Algo que você queira acrescentar?"></textarea>
            </div>
            <div class="form-group">
                <label for="title">Adicionar itens de infraestrutura:</label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="SemPagamento"> Sem pagamento
                </div>

                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cerveja"> Cerveja grátis
                </div>

                <div class="form-group" >
                    <input type="checkbox" name="items[]" value="Chuteira"> Chuteira grátis
                </div>


                <div class="form-group" >
                    <input type="checkbox" name="items[]" value="Brindes"> Brindes
                </div>

                </div>
            <input type="submit" class="btn btn-primary" value="Criar Pelada" id="form-group-id">
        </form>
    </div>
@endsection
