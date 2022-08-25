<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testeController extends Controller
{
  /*  function teste(int $p1, int $p2)
    {
        $soma = $p1 + $p2;
        echo "A soma de $p1 + $p2 é = $soma";
    }
*/

function teste(int $p1, int $p2)
    {
        // usando array associativo para passar parâmetro
      //  return view('site.teste',['x'=>$p1,'y'=>$p2]);

     //  usando a função compact para passar parâmetro(mais usado)
      //  return view('site.teste',compact('p1','p2'));

      //  usando a função with para passar parâmetro
      return view('site.teste')->with('x',$p1)->with('y',$p2);
    }
}
