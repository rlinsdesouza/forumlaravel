<?php

namespace forum\Http\Controllers;

use forum\Models\Postagem;
use Illuminate\Http\Request;
use forum\User;
use forum\Models\Tema;


class PostagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // validate
        $this->middleware('auth');
        $request->validate([
            'titulopost' => 'required|unique:postagems|max:191',
            'tema'=>'different:escolha',
            'descricaopost' =>'required'
        ]);
        //set up new postagem
        $postagem = new Postagem();
        $postagem->titulopost = $request->titulopost;    
        $postagem->descricaopost = $request->descricaopost;
        $postagem->likes = 0;
        $postagem->dislikes = 0;
        $postagem->tema_id = $request->tema;
        $postagem->user_id = $request->user()->id;
        $postagem->save();

        //set status message and redirect back to the form
        $request->session()->flash('status', 'Postagem salva');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \forum\Models\Postagem  $postagem
     * @return \Illuminate\Http\Response
     */
    public function show($postagem)
    {
        $postagem = Postagem::find($postagem);
        $respostas = $postagem->respostas;
        // print_r($respostas->respostas);
        // try {
        //     $respostas = Postagem::find($postagem)->respostas;
        //     return view('pages/post',compact('postagem','respostas'));
        // } catch (Exception $e) {
        //     return view('pages/post',compact('postagem'));            
        // }
        return view('pages/post',compact('postagem','respostas'));
        
        // $respostasdasrespostas =  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \forum\Models\Postagem  $postagem
     * @return \Illuminate\Http\Response
     */
    public function edit(Postagem $postagem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \forum\Models\Postagem  $postagem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postagem $postagem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \forum\Models\Postagem  $postagem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postagem $postagem)
    {
        //
    }

    public function listageral () {
        $postagems = Postagem::all();
        $users = User::all();
        $temas = Tema::all();

        return view ('pages/listposts',compact('postagems','users','temas'));
    }

    public function listaporuser ($id) {
        $postagems = User::find($id)->postagems;
        return view ('pages/listposts',compact('postagems'));
    }

    public function buscanome (Request $request) {
        $postagems = Postagem::where('titulopost','LIKE','%'.$request->input('busca').'%')->get();

        return view ('pages/listposts',compact('postagems'));
    }

    public function addlike(Request $request)
    {
        // validate
        $this->middleware('auth');

        //update postagem
        
        if($request->has('like')) {
            $postagem = Postagem::find($request->like);
            $postagem->likes = $postagem->likes+1;
        }else {
            $postagem = Postagem::find($request->dislike);
            $postagem->dislikes = $postagem->dislikes+1;
        }
        $postagem->save();
        
        //set status message and redirect back to the form
        $request->session()->flash('status', 'Adicionado se foi útil');
        return back();
    }

    public function excluir($id)
    {
        // validate
        $this->middleware('auth');

        //del postagem
        $postagem = Postagem::destroy($id);

        
        //set status message and redirect back to the form
        $request->session()->flash('status', 'Adicionado se foi útil');
        return back();
    }
}
