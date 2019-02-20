@extends('layouts.app')

@section('content')

<div id="main" class="container">
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
                                <form action="{{url('temas/excluir')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$tema->id}}">
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