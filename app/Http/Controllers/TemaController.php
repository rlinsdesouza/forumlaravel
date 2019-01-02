<?php

namespace forum\Http\Controllers;

use forum\Models\Tema;
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
    public function show(Tema $tema)
    {
        //
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
}
