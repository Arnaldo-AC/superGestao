<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class logAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $request - manipular
      //  return $next($request);
      // recuperar IP
      $ip = $request->server->get('REMOTE_ADDR');
      // Recuperar o nome da rota
      $rota = $request->getRequestUri();
        // response(forma um objecto de resposta para quem faz a solicitação) - manipular
        LogAcesso::create(['log' => "IP $ip requisitou a rota $rota"]);
       
      //  return $next($request);
       // return Response('Chegamos no middleware e finalizamos no mesmo middleware');

       $resposta = $next($request);
       $resposta->setStatusCode(201,'O status da resposta e a mensagem foram alterados');

       return $resposta;
    }
}
