<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Fornecedor;
use Illuminate\Database\Seeder;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        //Com fillable
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'contato@fornecedor100.com.br';
        $fornecedor->save();

        //Com fillable
        Fornecedor::create([
            'nome'=> 'Fornecedor 200',
            'site'=> 'fornecedor200.com.br',
            'uf'=> 'RS',
            'email'=> 'contato@fornecedor200.com.br',
        ]);

        //Não passa pelo Eloquent
        DB::table('fornecedors')->insert([
            'nome'=> 'Fornecedor 300',
            'site'=> 'fornecedor300.com.br',
            'uf'=> 'PR',
            'email'=> 'contato@fornecedor300.com.br',
        ]);
    }
}
