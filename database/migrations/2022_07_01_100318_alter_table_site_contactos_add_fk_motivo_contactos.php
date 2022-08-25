<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContactosAddFkMotivoContactos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Criação da nova coluna: motivo_contacto_id da tabela site_contactos
        Schema::table('site_contactos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contacto_id');
        });

        // atribuindo motivo_contacto para a nova coluna motivo_contacto_id: statement permite executar uma querie ou um comando no banco de dados
        DB::statement('update site_contactos set motivo_contacto_id = motivo_contacto');

        // Criação da FK
        Schema::table('site_contactos', function (Blueprint $table) {
            $table->foreign('motivo_contacto_id')->references('id')->on('motivo_contactos');
              // Remover a coluna motivo_contacto da tabela Site_Contacto
            $table->dropColumn('motivo_contacto');
        });

      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Criação da coluna e remoção da FK
        Schema::table('site_contactos', function (Blueprint $table) {
            $table->integer('motivo_contacto');
            $table->dropForeign('site_contactos_motivo_contacto_id_foreign');
        });

        // atribuindo motivo_contactos_id para a nova coluna motivo_contacto: statement permite executar uma querie ou um comando no banco de dados
        DB::statement('update site_contactos set motivo_contacto = motivo_contacto_id');

     // Remoção da coluna: motivo_contacto_id da tabela site_contactos
     Schema::table('site_contactos', function (Blueprint $table) {
        $table->dropColumn('motivo_contacto_id');
    });
    }
}
