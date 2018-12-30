@extends('layouts.app')

@section('content')

<div id="main" class="container">
    <div id="top" class="row">
        <div class="col-md-3">
                <h2>Publicações</h2>
            </div>
            
            <div class="col-md-6">
                <div class="input-group h2">
                    <input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar publicações">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">
                            <i class="material-icons">search</i>
                        </button>
                    </span>
                </div>
            </div>
            
            <div class="col-md-3">
                <a href="add.html" class="btn btn-primary pull-right h2">Novo Item</a>
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
                                <i class="material-icons">thumb_up</i>
                                {{$postagem->likes}} 
                                <i class="material-icons">thumb_down</i>
                                {{$postagem->dislikes}}
                            </td>
                            <td>{{$postagem->tema->titulotema}}</td>
                            <td>'@'{{$postagem->user->name}}</td>
                            <td>{{$postagem->created_at}}</td>
                            <td class="actions">
                                <a class="btn btn-success btn-xs" href="view.html">Visualizar</a>
                                <a class="btn btn-warning btn-xs" href="edit.html">Editar</a>
                                <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
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