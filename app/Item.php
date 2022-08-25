<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $table = 'produtos';
    protected $fillable = ['nome','descricao','peso','unidade_id','fornecedor_id'];

    // Tabela que possui a chave primária - Tabela Independente(Produto)
    public function produtoDetalhe()
    {
        //produto tem um produto detalhe
        return $this->hasOne('App\ItemDetalhe','produto_id', 'id');
    }

    public function pedidos()
    {
        return $this->belongsToMany('App\Produto','pedidos_produtos','produto_id','pedido_id');
    }
}
