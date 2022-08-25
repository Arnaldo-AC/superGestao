<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContacto;

class principalController extends Controller
{
   function principal()
   {
      $motivo_contacto = MotivoContacto::all();
        return view('site.principal',['motivo_contactos'=>$motivo_contacto]);
   }
}
