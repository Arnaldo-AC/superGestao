<?php

use Illuminate\Database\Seeder;
use App\SiteContacto;

class SiteContactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
     /*   SiteContacto::create([
            'nome'=> 'Sistema SG',
            'telefone'=> '91234567',
            'email'=> 'sgcontacto@gmail.com',
            'motivo_contacto'=> 1,
            'mensagem'=> 'Gostando do SG'
        ]);*/
        factory(SiteContacto::class, 100)->create();
    }
}
