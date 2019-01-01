{{-- vai ser util
    https://bootsnipp.com/snippets/featured/social-network-layout-bootstrap-4
    
    --}}


@extends('layouts.app')

@section('reply')

    <div class="well">
        <h4><i class="fa fa-paper-plane-o"></i> Responder:</h4>
        <form role="form">
            <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-reply"></i> Enviar</button>
        </form>
    </div>
@endsection

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
                
                <div>
                    <p><h4>Útil?</h4></p>
                    <i class="fa fa-thumbs-up"></i>
                    {{$postagem->likes}} 
                    <i class="fa fa-thumbs-down"></i>
                    {{$postagem->dislikes}}   
                </div>
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
                                @yield('reply')
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
                    @yield('reply')                    
                @endauth

    
                    {{-- <script src="https://apis.google.com/js/plusone.js"></script> --}}
                <hr>

            </div>

            {{-- <div class="col-lg-4"> --}}
                {{-- <div class="well">
                    <h4><i class="fa fa-search"></i> Blog Search...</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <!-- /input-group -->
                </div> --}}
                {{-- <!-- /well -->
                <div class="well">
                    <h4><i class="fa fa-tags"></i> Popular Tags:</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href=""><span class="badge badge-info">Windows 8</span></a>
                                </li>
                                 <li><a href=""><span class="badge badge-info">C#</span></a>
                                </li>
                                 <li><a href=""><span class="badge badge-info">Windows Forms</span></a>
                                </li>
                                 <li><a href=""><span class="badge badge-info">WPF</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href=""><span class="badge badge-info">Bootstrap</span></a>
                                </li>
                                 <li><a href=""><span class="badge badge-info">Joomla!</span></a>
                                </li>
                                 <li><a href=""><span class="badge badge-info">CMS</span></a>
                                </li>
                                 <li><a href=""><span class="badge badge-info">Java</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
				<!-- /well -->
				<div class="well">
                    <h4><i class="fa fa-thumbs-o-up"></i> Follow me!</h4>
					<ul>
                    <p><a title="Facebook" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x"></i></span></a> <a title="Twitter" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x"></i></span></a> <a title="Google+" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-google-plus fa-stack-1x"></i></span></a> <a title="Linkedin" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-linkedin fa-stack-1x"></i></span></a> <a title="GitHub" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-github fa-stack-1x"></i></span></a> <a title="Bitbucket" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-bitbucket fa-stack-1x"></i></span></a></p>
					</ul>
                </div>
				<!-- /well -->
                <!-- /well -->
                <div class="well">
                    <h4><i class="fa fa-fire"></i> Popular Posts:</h4>
					<ul>
                    <li><a href="">WPF vs. Windows Forms-Which is better?</a></li>
					<li><a href="">How to create responsive website with Bootstrap?</a></li>
					<li><a href="">The best Joomla! templates 2014</a></li>
					<li><a href="">ASP .NET cms list</a></li>
			        <li><a href="">C# Hello, World! program</a></li>
					<li><a href="">Java random generator</a></li>
					</ul>
                </div>
                <!-- /well -->
				
				<!-- /well -->
                <div class="well">
                    <h4><i class="fa fa-book"></i> Featured books:</h4>
                    <div class="row"> 
                        <div class="col-lg-12">
    				        <div class="cuadro_intro_hover " style="background-color:#cccccc;">
						        <p style="text-align:center; margin-top:20px;">
							    <img src="http://placehold.it/500x330" class="img-responsive" alt="">
						        </p>
						        <div class="caption">
							        <div class="blur"></div>
							        <div class="caption-text">
		        						<h3 style="border-top:2px solid white; border-bottom:2px solid white; padding:10px;">Book 1</h3>
								        <p>Loren ipsum dolor si amet ipsum dolor si amet ipsum dolor...</p>
								        <a class=" btn btn-default" href="#"><i class="fa fa-plus"></i> INFO</span></a>		
							        </div>
						        </div>
					    </div>
                    </div>
                </div>                
		 --}}
		{{-- <div class="col-lg-12">
    				<div class="cuadro_intro_hover " style="background-color:#cccccc;">
						<p style="text-align:center; margin-top:20px;">
							<img src="http://placehold.it/500x330" class="img-responsive" alt="">
						</p>
						<div class="caption">
							<div class="blur"></div>
							<div class="caption-text">
								<h3 style="border-top:2px solid white; border-bottom:2px solid white; padding:10px;">Book 2</h3>
								<p>Loren ipsum dolor si amet ipsum dolor si amet ipsum dolor...</p>
								<a class=" btn btn-default" href="#"><i class="fa fa-plus"></i> INFO</span></a>
							
							</div>
						</div>
					</div>
				
	    </div> --}}
            {{-- </div>                   --}}
        </div>	
    </div>

@endsection

