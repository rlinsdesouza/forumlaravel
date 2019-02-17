@extends('layouts.app')

@section('content')

<div id="main" class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div id="top" class="row">
        <div class="col-md-3">
                <h2>Temas</h2>
                @auth
                <a href={{url('temas/cadastro')}} class="btn btn-primary pull-right h2">Novo tema</a>                    
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
                        <th>Tema</th>
                        <th>Descrição</th>
                        <th>Usuário</th>
                        <th>Data criação</th>
                        <th class="actions">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($temas as $tema)
                        <tr>
                            <td>{{$tema->id}}</td>
                            <td>{{$tema->titulotema}}</td>
                            <td>{{$tema->descricaotema}}</td>
                            <td><i class="fa fa-user"></i>{{$tema->user->name}}</td>
                            <td>{{$tema->created_at}}</td>
                            <td class="actions">
                                <a class="btn btn-success btn-xs" href="{{url('temas/'.$tema->id)}}">Visualizar</a>
                                {{-- <a class="btn btn-warning btn-xs" href="edit.html">Editar</a> --}}
                                @auth
                                @if ($tema->user->id == Auth::user()->id)
                                <a class="btn btn-danger btn-xs"  href="{{url('temas/excluir/'.$tema->id)}}" data-toggle="modal" data-target="#delete-modal">Excluir</a>                                                                        
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