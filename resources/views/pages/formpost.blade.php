{{-- vai ser util
    https://bootsnipp.com/snippets/featured/social-network-layout-bootstrap-4
    
    --}}

    <div class="container">
              <!--- \\\\\\\Post-->
      <form action="{{url('postagens/criar')}}" method="post">
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
                </div>
            </div>
        </div>
    </form>

  <!-- Post /////-->
        
    </div>
