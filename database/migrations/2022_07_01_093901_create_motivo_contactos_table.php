<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\MotivoContacto;

class CreateMotivoContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motivo_contactos', function (Blueprint $table) {
            $table->id();
            $table->string('motivo_contacto',20);
            $table->timestamps();
        });

        /*
        MotivoContacto::create(['Dúvida']);
        MotivoContacto::create(['Elogio']);
        MotivoContacto::create(['Reclamação']);
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motivo_contactos');
    }
}
