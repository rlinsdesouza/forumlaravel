{{-- vai ser util
    https://bootsnipp.com/snippets/featured/social-network-layout-bootstrap-4
    
    --}}


@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- the actual blog post: title/author/date/content -->
                <h1><a href="">{{$postagem->titulopost}}</a></h1>
                <p class="lead"><i class="fa fa-user"></i> by <a href="">{{$postagem->user->name}}</a></p>
                <hr>
                <p><i class="fa fa-calendar"></i> Postada em {{$postagem->created_at}}</p>
                <p><i class="fa fa-tags"></i> Tema: 
                    <a href=""><span class="badge badge-info">{{$postagem->tema->titulotema}}</span></a> 
                </p>	
                <hr>
                {{-- <img src="http://placehold.it/900x300" class="img-responsive"> --}}
                <hr>
                <p>{{$postagem->descricaopost}}</p>
                <br/>
                {{-- <div>
                    <center><p><strong>Embed Twitter post:</strong>
                        <!-- Place this tag in your head or just before your close body tag. -->
                        <blockquote class="twitter-tweet" lang="hu"><p>Thousands of code samples at your fingertips! Literally, thousands: <a href="http://t.co/aHrsBZ7plp">http://t.co/aHrsBZ7plp</a> (via <a href="https://twitter.com/ch9">@ch9</a>) <a href="http://t.co/94CQJLOCzO">pic.twitter.com/94CQJLOCzO</a></p>— Microsoft Developer (@msdev) <a href="https://twitter.com/msdev/statuses/487959572230193152">2014. július 12.</a></blockquote>
                        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </center>
                </div>
                <br/>
                <div>
                    <center><p><strong>Embed Youtube player:</strong> </center>
                        <div class="vid">
                            <iframe width="560" height="315" src="//www.youtube.com/embed/bsPUMZlsZP8" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <br/>
                        <p><h3>This Youtube Player is responsive!</h3></p>
                        <p>Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor.</p>
                        <blockquote>
                            <p>„Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.”</p>
                            <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>           
                </div> --}}
                
                <hr>                
                @auth
                <p><h4>Útil?</h4></p>
                <form action="{{url('postagens/addlike')}}" method="post">
                    @csrf
                    <div>
                        <button type="submit" class="btn btn-outline-info" name="like" value="{{$postagem->id}}"><i class="fa fa-thumbs-up"></i>{{$postagem->likes}}</button>
                    </div>
                </form>
                <form action="{{url('postagens/addlike')}}" method="post">
                        @csrf
                        <div>
                            <button type="submit" class="btn btn-outline-danger" name="dislike" value="{{$postagem->id}}"><i class="fa fa-thumbs-down"></i>{{$postagem->dislikes}}</button>
                        </div>
                </form>
                @else
                    <div>
                        <p><h4>Útil?</h4></p>
                        <i class="fa fa-thumbs-up"></i>
                        {{$postagem->likes}} 
                        <i class="fa fa-thumbs-down"></i>
                        {{$postagem->dislikes}}   
                    </div>
                @endauth
                
{{--                 
                <!-- Helyezd el ezt a címkét az utolsó +1 gomb címke mögé. -->
                <script type="text/javascript">
                (function() {
                    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                    po.src = 'https://apis.google.com/js/platform.js';
                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                })();
                </script> --}}
                <br/>
                <hr>


                <!-- the comments -->
                <div class="well">                
                    @foreach ($respostas as $resposta)
                        <h3><i class="fa fa-comment"></i> {{$resposta->user->name}} says:<small>{{$resposta->created_at}}</small></h3>
                        <p>{{$resposta->resposta}}</p>
                        @auth
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-reply"></i>Responder {{$resposta->user->name}}</button>    
                            <div class="collapse" id="collapseExample">
                                <div class="well">
                                    <h4><i class="fa fa-paper-plane-o"></i> Responder:</h4>
                                    <form action="{{url('postagens/addresposta')}}" method="POST" role="form">
                                        @csrf
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" name="resposta"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="idresposta" value="{{$resposta->id}}"><i class="fa fa-reply"></i> Enviar</button>
                                    </form>
                                </div>                    
                            </div>
                        @endauth
                        
                        @foreach ($resposta->respostas as $resp)
                            <div class="col-sm-8">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <strong>{{$resp->user->name}}</strong> <span class="text-muted">respondeu {{$resposta->user->name}}  em {{$resp->created_at}}</span>
                                    </div>
                                    <div class="panel-body">
                                        {{$resp->resposta}}
                                    </div><!-- /panel-body -->
                                </div><!-- /panel panel-default -->
                            </div><!-- /col-sm-5 -->
                        @endforeach
                    @endforeach
                </div>

                <hr>


                <!-- the comment box -->
                @auth
                    <div class="well">
                        <h4><i class="fa fa-paper-plane-o"></i> Responder:</h4>
                        <form action="{{url('postagens/addresposta')}}" method="POST" role="form">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="resposta"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="idpostagem" value="{{$postagem->id}}"><i class="fa fa-reply"></i> Enviar</button>
                        </form>
                    </div>                    
                @endauth

    
                    {{-- <script src="https://apis.google.com/js/plusone.js"></script> --}}
                <hr>

            </div>
        </div>	
    </div>

@endsection

