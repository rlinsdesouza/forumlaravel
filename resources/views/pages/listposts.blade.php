@extends('layouts.app')

@section('content')

<div id="main" class="container">
    <div id="top" class="row">
        <div class="col-md-3">
                <h2>Publicações</h2>
                @auth
                <a href="add.html" class="btn btn-primary pull-right h2">Novo Item</a>                    
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
                                <a class="btn btn-success btn-xs" href="{{$postagem->id}}">Visualizar</a>
                                {{-- <a class="btn btn-warning btn-xs" href="edit.html">Editar</a> --}}
                                @auth
                                @if ($postagem->user->id == Auth::user()->id)
                                <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>                                                                        
                                @endif
                                @endauth
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> <!-- /#list -->

    <div id="bottom" class="row">
        <div class="col-md-12">
        
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul><!-- /.pagination -->
            
        </div>
    </div> <!-- /#bottom -->

    <!-- Modal -->
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
                </div>
                <div class="modal-body">Deseja realmente excluir este item? </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
                </div>
            </div>
        </div>
    </div>

</div>  <!-- /#main -->
    
@endsection