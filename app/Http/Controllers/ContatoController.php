<?php

namespace App\Http\Controllers;

use App\Models\SiteContato;
use Illuminate\Http\Request;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato()
    {
        $motivo_contatos = MotivoContato::all();

        return view('site.contato',[
            'titulo'=>'Contato (teste)',
            'motivo_contatos' => $motivo_contatos
        ]);
    }

    public function salvar(Request $request)
    {

        $request->validate([
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000',
        ],[
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.min' => 'O campo nome deve ter no máximo 40 caracteres',
            'nome.unique' => 'O nome informado já está em uso',
            'email.email' => 'O campo e-mail precisa de um e-mail válido',
            'mensagem.max' => 'A mensagem deve ter no máximo 200 caracteres',
            //Mensagem default
            'required' => 'O campo :attribute deve ser preenchido'
        ]);

        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }

}
