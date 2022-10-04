<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
//        $contato = new SiteContato();

//        $contato->nome = $request->input('nome');
//        $contato->telefone = $request->input('telefone');
//        $contato->email = $request->input('email');
//        $contato->motivo = $request->input('motivo');
//        $contato->mensagem = $request->input('mensagem');

//        $contato->fill($request->all());
//        $contato->create($request->all());

//        $contato->save();
        return view('site.contato');
    }

    public function salvar(Request $request){
//        Validação dos dados antes de submeter
        $request->validate([
           'nome' => 'required',
           'telefone' => 'required',
           'email' => 'required',
           'motivo' => 'required',
           'mensagem' => 'required',
        ]);
//        SiteContato::create($request->all());
    }
}
