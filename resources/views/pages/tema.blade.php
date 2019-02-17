@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Cadastro de Tema</h1>


    <form action="{{url('temas/add')}}" method="POST">
    @csrf
        <div class="form-group">
        <label for="exampleFormControlInput1">Título</label>
        @if(isset($tema))
        <input type="text" class="form-control" id="exampleFormControlInput1" name="titulotema" value="{{$tema->titulotema}}">
        @else
        <input type="text" class="form-control" id="exampleFormControlInput1" name="titulotema">
        @endif
        </div>
        <div class="form-group">
        <label for="exampleFormControlTextarea1">Descrição tema</label>
        @if(isset($tema))
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descricaotema" value="{{$tema->descricaotema}}"></textarea>
        @else 
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descricaotema"></textarea>
        @endif
        </div>
        @if(!isset($tema))
        <button class="btn btn-primary" type="submit">Salvar</button>
        @endif
    </form>
</div>

@endsection