<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request){

        $motivos = MotivoContato::all();
//        $contato = new SiteContato();

//        $contato->nome = $request->input('nome');
//        $contato->telefone = $request->input('telefone');
//        $contato->email = $request->input('email');
//        $contato->motivo = $request->input('motivo');
//        $contato->mensagem = $request->input('mensagem');

//        $contato->fill($request->all());
//        $contato->create($request->all());

//        $contato->save();
        return view('site.contato', [
            'motivos' => $motivos
        ]);
    }

    public function salvar(Request $request){
//        Validação dos dados antes de submeter
        $request->validate([
           'nome' => 'required|min:3|max:60|unique:site_contatos',
           'telefone' => 'required',
           'email' => 'email',
           'motivo_contatos_id' => 'required',
           'mensagem' => 'required|max:2000',
        ]);
        SiteContato::create($request->all());
        return redirect()->route('site.principal');
    }
}
