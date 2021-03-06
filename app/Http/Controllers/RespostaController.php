<?php

namespace forum\Http\Controllers;

use forum\Models\Resposta;
use Illuminate\Http\Request;

class RespostaController extends Controller
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
     * @param  \forum\Models\Resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function show(Resposta $resposta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \forum\Models\Resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function edit(Resposta $resposta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \forum\Models\Resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resposta $resposta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \forum\Models\Resposta  $resposta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resposta $resposta)
    {
        //
    }

    public function addresposta(Request $request)
    {
        // validate
        $this->middleware('auth');
        $request->validate([
            'resposta' => 'required'
        ]);

        //nova resposta resposta
        $resposta = new Resposta();
        $resposta->resposta = $request->resposta;
        $resposta->likes = 0;
        $resposta->dislikes =0 ;
        $resposta->user_id = $request->user()->id;
     
        if($request->has('idpostagem')) {
            $resposta->respostavel_id = $request->idpostagem;
            $resposta->respostavel_type = 'forum\Models\Postagem';
        }else {
            $resposta->respostavel_id = $request->idresposta;
            $resposta->respostavel_type = 'forum\Models\Resposta';
        }
        

        $resposta->save();
        
        //set status message and redirect back to the form
        $request->session()->flash('status', 'Adicionado resposta');
        return back();
    }
}
