@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Cadastro de Tema</h1>


    @if(!isset($tema)) 
    <form action="{{url('temas/add')}}" method="POST">
    @else
    <form action="{{url('temas/editar/'.$tema->id)}}" method="POST">
    @endif    
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
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descricaotema">{{$tema->descricaotema}}</textarea>
        @else 
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descricaotema"></textarea>
        @endif
        </div>
        @if(!isset($tema))
        <button class="btn btn-primary" type="submit">Salvar</button>
        @endif
        @if (isset($tema) && (Auth::user()!=null)  && $tema->user->id == Auth::user()->id)
        <button class="btn btn-primary" type="submit">Editar</button>        
        @endif
    </form>
</div>

@endsection