<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'forncedor 100';
        $fornecedor->site = 'fornecedor100.co.ao';
        $fornecedor->email = 'fornecedor100@gmail.com';
        $fornecedor->uf = 'ac';
        $fornecedor->save(); 

        Fornecedor::create([
            'nome'=> 'Fornecedor 200',
            'site'=> 'Fornecedor200.co.ao',
            'email'=> 'Fornecedor200@gmail.com',
            'uf'=> 'ld'
        ]);

        //insert
        DB::table('fornecedores')->insert([
            'nome'=> 'Fornecedor 300',
            'site'=> 'Fornecedor300.co.ao',
            'email'=> 'Fornecedor300@gmail.com',
            'uf'=> 'kz'
        ]);

    }
}
