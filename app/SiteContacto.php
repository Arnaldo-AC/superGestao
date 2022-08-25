<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContacto extends Model
{
    //
    protected $fillable = ['nome','telefone','email','motivo_contacto_id','mensagem'];
}
