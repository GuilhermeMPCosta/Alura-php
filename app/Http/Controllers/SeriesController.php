<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mesagemsucesso = Session('mensagem.sucesso');
        return view('series.index')->with('series', $series)->with('mensagemdesucesso',$mesagemsucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        Serie::create($request->all());
        $request->session()->flash('mensagem.sucesso','Série '.$request->nome.' adicionada com sucesso');
        return to_route('series.index');
    }

    public function destroy(Request $request){
        $serie=Serie::find($request->series);
        Serie::destroy($request->series);
        $request->session()->flash('mensagem.sucesso','Série '.$serie->nome.' removida com sucesso');
        return to_route('series.index');
    }
}
