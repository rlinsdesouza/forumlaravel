@extends ('layouts.app')

@section('content')
  <main role="main" class="container">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <h6 class="border-bottom border-gray pb-2 mb-0">Postagens recentes</h6>

      @foreach ($postagems as $postagem)
      <div class="media text-muted pt-3">
        {{-- <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded"> --}}
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
          <strong class="d-block text-gray-dark"><i class="fa fa-user"></i> by {{$postagem->user->name}}</strong>
          <strong class="d-block text-gray-dark">{{$postagem->tema->titulotema}}</strong>
          {{$postagem->titulopost}}
          <i class="fa fa-thumbs-up"></i>
          {{$postagem->likes}} 
          <i class="fa fa-thumbs-down"></i>
          {{$postagem->dislikes}}
          <i class="fa fa-calendar"></i> Posted on {{$postagem->created_at}}
          <a href="postagens/{{$postagem->id}}">Leia mais</a>            
        </p>
      </div>
      @endforeach
      <small class="d-block text-right mt-3">
        <a href="postagens/listargeral">All updates</a>
      </small>
    </div>

    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Postagens mais interessantes</h6>
        @foreach ($postagemsMaisInteressantes as $post)
        <div class="media text-muted pt-3">
          {{-- <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded"> --}}
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark"><i class="fa fa-user"></i> by {{$post->user->name}}</strong>
            <strong class="d-block text-gray-dark">{{$post->tema->titulotema}}</strong>
            {{$post->titulopost}}
            <i class="fa fa-thumbs-up"></i>
            {{$post->likes}} 
            <i class="fa fa-thumbs-down"></i>
            {{$post->dislikes}}
            <i class="fa fa-calendar"></i> Posted on {{$post->created_at}}
            <a href="postagens/{{$post->id}}">Leia mais</a>            
          </p>
        </div>
        @endforeach
        <small class="d-block text-right mt-3">
          <a href="#">All updates</a>
        </small>
      </div>

      @auth    
      <!--- \\\\\\\Post-->
      <form action="postagens/criar" method="post">
          @csrf
          <div class="card gedf-card">
              <div class="card-header">
                  <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                          <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Fazer uma publicação</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="false" href="#images">Anexar código github</a>
                      </li>
                  </ul>
              </div>
              <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                            <div class="input-group input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Título</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="titulopost">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Tema</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" name="tema">
                                    <option value="escolha">Escolha</option>
                                    @foreach ($temas as $tema)
                                        <option value="{{$tema->id}}">{{$tema->titulotema}}</option>
                                    @endforeach
                                </select>  
                            </div>
                          <div class="form-group">
                              <label class="sr-only" for="message">post</label>
                              <textarea class="form-control" id="message" rows="3" placeholder="O que vc deseja publicar?" name="descricaopost"></textarea>
                          </div>
      
                      </div>
                      <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                          <div class="form-group">
                              <div class="custom-file">
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="codegist" placeholder="Copie e cole o script gist aqui...">
                              </div>
                          </div>
                          <div class="py-4"></div>
                      </div>
                  </div>
                  <div class="btn-toolbar justify-content-between">
                      <div class="btn-group">
                          <button type="submit" class="btn btn-primary">Postar</button>
                      </div>
                      {{-- <div class="btn-group">
                          <button id="btnGroupDrop1" type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                              aria-expanded="false">
                              <i class="fa fa-globe"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                              <a class="dropdown-item" href="#"><i class="fa fa-globe"></i> Public</a>
                              <a class="dropdown-item" href="#"><i class="fa fa-users"></i> Friends</a>
                              <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Just me</a>
                          </div>
                      </div> --}}
                  </div>
              </div>
          </div>
      </form>

    <!-- Post /////-->
    @endauth
      
  </main>
{{-- 
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster --> --}}
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
  <script src="../../assets/js/vendor/popper.min.js"></script>
  <script src="../../dist/js/bootstrap.min.js"></script>
  <script src="../../assets/js/vendor/holder.min.js"></script>
  <script src="offcanvas.js"></script>
@endsection
