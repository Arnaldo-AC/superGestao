<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContacto;
use App\MotivoContacto;

class contactoController extends Controller
{
    function contacto()
   {
          $contacto = new SiteContacto();
       /*   $contacto->nome = $request->input('nome');
          $contacto->telefone = $request->input('telefone');
          $contacto->email = $request->input('email');
          $contacto->motivo_contacto = $request->input('motivo_contacto');
          $contacto->mensagem = $request->input('mensagem');
          $contacto->save();*/

        //  $contacto->fill($request->all());
       //   $contacto->save();
      
      
      // $contacto->create($request->all());
          
      $motivo_contacto = MotivoContacto::all();
        return view('site.contacto', ['motivo_contactos' => $motivo_contacto]);
   }
   public function salvar(Request $request)
   {
      // Realizar a validação dos dados recebidos no Request

      $regras = [
         'nome' => 'required|min:3|max:40', //|unique:site_contactos
         'telefone' => 'required',
         'email' => 'email',
         'motivo_contacto_id' => 'required',
         'mensagem' => 'required|max:2000'
      ];

      $feedback =  [
         'nome.required' => 'O campo nome precisa ser preenchido',
         'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
         'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
         'telefone.required' => 'O campo telefone precisa ser preenchido',
         'email.email' => 'Este formato não corresponde à um email',
         'motivo_contacto_id.rquired' => 'O campo motivo contacto deve ser preenchido',
         'motivo_mensagem.required' => 'O campo motivo mensagem deve ser preencido',
         'mensagem.required' => 'O campo mensagem deve ser preenchido',
         'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres',

         // required: 'O campo :attribute deve ser preenchido';   
      ];
      $request->validate($regras,$feedback);
      SiteContacto::create($request->all());
      return redirect()->route('site.index');
   }
}
