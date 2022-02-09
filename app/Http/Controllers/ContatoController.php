<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {
       /*
            //METODO 1
            $contato = new SiteContato();
            $contato->nome = $request->input('nome');
            $contato->telefone = $request->input('telefone');
            $contato->email = $request->input('email');
            $contato->motivo_contato = $request->input('motivo_contato');
            $contato->mensagem = $request->input('mensagem');

            $contato->save();
       */

        /*
            //METODO 2
            $contato = new SiteContato();
            $contato->fill($request->all());
            $contato->save();
        */

            //METODO 3
        // $contato = new SiteContato();
        // $contato->create($request->all());

        //print_r($contato->getAttributes());

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]); 
    }

    public function salvar(Request $request) {

        //validação dos dados recebidos no $request

        $regras = [
            'nome' => 'required|min:3|max:20',
            'telefone' => 'required',
            'email' => 'email|unique:site_contatos',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required',
        ];

        $msgPersonalizada = [
            'required' => 'O campo :attribute deve ser preenchido.',
            'motivo_contatos_id.required' => 'O motivo não foi informado.',
            'nome.min' => 'O campo nome precisa ter no mínimo :min caracteres.',
            'nome.max' => 'O campo nome não pode ter mais de :max caracteres.',
            'email.email' => 'O email informado não é valido.',
            'email.unique' => 'O email informado já está em uso.',
        ];

        $request->validate($regras, $msgPersonalizada);

        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}
