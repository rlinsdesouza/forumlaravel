<?php

namespace forum\Http\Controllers;

use forum\Models\Tema;
use forum\User;

use Illuminate\Http\Request;

class TemaController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \forum\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tema = Tema::find($id);
        return view ('pages/tema',['tema'=>$tema]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \forum\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function edit(Tema $tema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \forum\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tema $tema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \forum\Models\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tema $tema)
    {
        //
    }

    public function addtema(Request $request)
    {
        // validate
        $this->middleware('auth');
        $request->validate([
            'titulotema'=>'required|max:191',
            'descricaotema' => 'required'
        ]);

        //nova resposta resposta
        $tema = new Tema();
        $tema->titulotema = $request->titulotema;
        $tema->descricaotema = $request->descricaotema;       
        $tema->user_id = $request->user()->id;
             

        $tema->save();
        
        //set status message and redirect back to the form
        $request->session()->flash('status', 'Adicionado tema');
        return back();
    }

    public function cadastrotema()
    {
        // validate
        $this->middleware('auth');
        return view('pages/tema');
    }

    public function listageral () {
        $temas = Tema::all();
        $users = User::all();
        
        return view ('pages/listtemas',compact('temas','users'));
    }
    public function listaporuser ($id) {
        $temas = User::find($id)->temas;
        return view ('pages/listtemas',compact('temas'));
    }

    public function buscatema (Request $request) {
        $temas = Tema::where('titulotema','LIKE','%'.$request->input('busca').'%')->get();
        return view ('pages/listtemas',compact('temas'));
    }

    public function excluir($id)
    {
        // validate
        $this->middleware('auth');

        //del tema
        $tema = Tema::destroy($id);

        
        //set status message and redirect back to the form
        $request->session()->flash('status', 'removido com sucesso');
        return back();
    }
}
