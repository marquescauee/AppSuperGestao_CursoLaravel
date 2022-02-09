<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //inserindo registro através da instanciação de objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'SC';
        $fornecedor->email = 'fornecedor@gmail.com';
        $fornecedor->save();

        //inserindo registro através do método estático create da classe Fornecedor
        Fornecedor::create([
            'nome' => 'Fornecedor200',
            'site' => 'fornecedor200.com.br',
            'uf' => 'RS',
            'email' => 'fornecedor200@gmail.com'
        ]);

        //inserindo registro através do método estático table da classe DB e função insert
        \DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor300',
            'site' => 'fornecedor300.com.br',
            'uf' => 'PR',
            'email' => 'fornecedor300@gmail.com'
        ]);
    }
}
