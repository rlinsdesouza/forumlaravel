<?php

namespace forum\Http\Controllers;

use Illuminate\Http\Request;
use forum\Models\Postagem;
use forum\User;
use forum\Models\Tema;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $postagems = Postagem::orderBy('created_at','desc')->take(5)->get();
        // $users = User::all();
        $temas = Tema::all();
        $postagemsMaisInteressantes = Postagem::orderBy('likes','desc')->take(5)->get();

        return view ('pages/index',compact('postagems','users','temas','postagemsMaisInteressantes'));
    }
}
