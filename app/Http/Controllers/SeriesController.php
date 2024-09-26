<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Series::all();
        $mesagemsucesso = Session('mensagem.sucesso');
        return view('series.index')->with('series', $series)->with('mensagemdesucesso',$mesagemsucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        
        $season=[];
        $serie =Series::create($request->all());
        for ($i = 1; $i <= $request->seassonQty; $i++) {
            $season[]=[
                'series_id'=>$serie->id,
                'number' => $i
            ];
        }
        Season::insert($season);
        $episode=[];
        foreach ($serie->seasons as $season) {
            for ($i = 1; $i <= $request->episodesPerSeasson; $i++) {
                $episode[] = [
                    'season_id' => $season->id,
                    'number' => $i,
                    'seriesBelong' => $serie->nome
                ];
            }   
        }
        Episode::insert($episode);
        
        return to_route('series.index')
            ->with('mensagem.sucesso','Série '.$serie->nome.' adicionada com sucesso');
    }

    public function destroy(Series $series){
        $series->delete();
        return to_route('series.index')
            ->with('mensagem.sucesso','Série '.$series->nome.' removida com sucesso');
    }

    public function edit(Series $series){
        return view('series.edit')->with('serie', $series);
    }

    public function update(SeriesFormRequest $request, Series $series){
        $series->update($request->all());
        return to_route('series.index')
            ->with('mensagem.sucesso','Série '.$series->nome.' atualizada com sucesso');
    }
}
