<?php

use Illuminate\Database\Seeder;
use App\MotivoContacto;

class MotivoContactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        MotivoContacto::create(['motivo_contacto'=> 'Dúvida']);
        MotivoContacto::create(['motivo_contacto'=>'Elogio']);
        MotivoContacto::create(['motivo_contacto'=>'Reclamação']);
    }
}
