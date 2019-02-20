@extends('layouts.app')

@section('content')

<div id="main" class="container">
    <div id="top" class="row">
        <div class="col-md-3">
                <h2>Publicações</h2>
                @auth
                <a href="{{url('postagens/add')}}" class="btn btn-primary pull-right h2">Novo Item</a>                    
                @endauth            
        </div>   
    </div> <!-- /#top -->

    <hr />
    <div id="list" class="row">
        <div class="table-responsive col-md-12">
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Tema</th>
                        <th>Usuário</th>
                        <th>Data criação</th>
                        <th class="actions">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($postagems as $postagem)
                        <tr>
                            <td>{{$postagem->id}}</td>
                            <td> 
                                {{$postagem->titulopost}}
                                <i class="fa fa-thumbs-up"></i>
                                {{$postagem->likes}} 
                                <i class="fa fa-thumbs-down"></i>
                                {{$postagem->dislikes}}
                            </td>
                            <td>{{$postagem->tema->titulotema}}</td>
                            <td><i class="fa fa-user"></i>{{$postagem->user->name}}</td>
                            <td>{{$postagem->created_at}}</td>
                            <td class="actions">
                                <a class="btn btn-success btn-xs" href="{{url('postagens/'.$postagem->id)}}">Visualizar</a>
                                {{-- <a class="btn btn-warning btn-xs" href="edit.html">Editar</a> --}}
                                @auth
                                @if ($postagem->user->id == Auth::user()->id)
                                <form action="{{url('postagens/excluir')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$postagem->id}}">
                                    <a class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#delete-modal">Excluir</a>                                                                        
                                    @include('pages/modalconfirm')
                                </form>
                                @endif
                                @endauth
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> <!-- /#list -->

    {{-- <div id="bottom" class="row">
        <div class="col-md-12">
        
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul><!-- /.pagination -->
            
        </div>
    </div> <!-- /#bottom --> --}}


</div>  <!-- /#main -->
    
@endsection