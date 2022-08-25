<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProdutosRelacionamentoFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Criando a coluna no produto que vai receber o fk de fornecedores
        Schema::table('produtos', function (Blueprint $table) {

          $fornecedor_id =  DB::table('fornecedores')->insert([
                'nome' => 'Fornecedor Padrão SG',
                'site' => 'FornecedorPadrao.co.ao',
                'uf' => 'FP',
                'email' => 'contacto@fornecedorsg.com'
            ]);

            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('produtos', function (Blueprint $table) {
        $table->dropForeign('produtos_fornecedor_id_foreign');
        $table->dropColumn('fornecedor_id');
        });
    }
}
