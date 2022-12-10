<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        #\App\Models\SiteContato::factory(10)->create();
        #$this->call(FornecedorSeeder::class);
        #$this->call(SiteContatoSeeder::class);
        $this->call(MotivoContatoSeeder::class);
    }
}
