<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sobreController extends Controller
{
     public function __construct()
     {
          $this->middleware('log.acesso');
     }
    function sobre()
   {
        return view('site.sobre');
   }
}
