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
          <a href="{{url('postagens/'.$postagem->id)}}">Leia mais</a>            
        </p>
      </div>
      @endforeach
      <small class="d-block text-right mt-3">
        <a href="{{url('postagens/listargeral')}}">All updates</a>
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
            <a href="{{url('postagens/'.$post->id)}}">Leia mais</a>            
          </p>
        </div>
        @endforeach
        <small class="d-block text-right mt-3">
          <a href="#">All updates</a>
        </small>
      </div>

      @auth    
      <!--- \\\\\\\Post-->
      @include('pages/formpost')
      
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
