@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Cadastro de Tema</h1>


    <form action="temas/add" method="POST">
    @csrf
        <div class="form-group">
        <label for="exampleFormControlInput1">Título</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="titulotema">
        </div>
        <div class="form-group">
        <label for="exampleFormControlTextarea1">Descrição tema</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descricaotema"></textarea>
        </div>
        <button class="btn btn-primary" type="submit">Cadastrar</button>
    </form>
</div>

@endsection