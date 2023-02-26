<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $contato = new SiteContato();
        $contato->nome = 'Sistema SG';
        $contato->telefone = '(91) 98265-0277';
        $contato->email = 'contato@sg.com.br';
        #$contato->motivo_contato = 1;
        $contato->motivo_contatos_id = 2;
        $contato->mensagem = 'Seja bem-vindo ao sistema Super Gestão';
        $contato->save();
    }
}
