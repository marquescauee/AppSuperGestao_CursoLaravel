<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
            SiteContato::create([
                'nome' => 'Cauê',
                'telefone' => '48 2819-2137',
                'email' => 'cauelpoes@gmail.com',
                'motivo_contato' => 3,
                'mensagem' => 'salve'
            ]);
        */
        \App\Models\SiteContato::factory()->count(100)->create();
    }
}
