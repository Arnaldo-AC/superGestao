<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    //
    protected $table = 'fornecedores';
    protected $fillable = ['nome','site','email','uf'];

    public function produtos()
    {
        return $this->hasMany('App\Item','fornecedor_id','id');
    }
}
