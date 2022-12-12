<?php

namespace App\Http\Controllers;

use App\Models\{
    Jogo,
    Aposta
};
use Illuminate\Http\Request;

class JogosController extends Controller
{
    public function create(Request $request)
    {
        $jogo = new Jogo();

        $jogo->time_1 = $request->time1;
        $jogo->time_2 = $request->time2;
        $jogo->bandeira_1 =  strtolower($request->time1.'.png');
        $jogo->bandeira_2 =  strtolower($request->time2.'.png');
        $jogo->placar_1 = $request->placar1;
        $jogo->placar_2 = $request->placar2;
        $jogo->data = $request->data_jogo;

        $jogo->save();
        return back()->with('cadastro', 'Cadastro realizado com sucesso');
    }

    public function update(Request $request, $id)
    {
        if(!$jogo = Jogo::find($id))
            return redirect()->route('show.jogos');
        
        $jogo->time_1 = $request->time1;
        $jogo->time_2 = $request->time2;
        $jogo->bandeira_1 =  strtolower($request->time1.'.png');
        $jogo->bandeira_2 =  strtolower($request->time2.'.png');
        $jogo->placar_1 = $request->placar1;
        $jogo->placar_2 = $request->placar2;
        $jogo->data = $request->data_jogo;

        $jogo->update();

        return redirect()->route('show.jogos');
    }
    
    public function show()
    {
        $jogos = Jogo::get();
        $apostas = Aposta::get();
        return view('jogos.show', compact('jogos', 'apostas'));
    }

    public function delete($id)
    {
        if(!$jogo = Jogo::find($id))
            return redirect()->route('show.jogos');
        
        $jogo->delete();

        return redirect()->route('show.jogos');
    }

}
