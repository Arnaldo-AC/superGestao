<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //
    protected $fillable = ['nome','descricao','peso','unidade_id'];

    // Tabela que possui a chave primária - Tabela Independente(Produto)
    public function produtoDetalhe()
    {
        //produto tem um produto detalhe
        return $this->hasOne('App\ProdutoDetalhe');
    }
}
