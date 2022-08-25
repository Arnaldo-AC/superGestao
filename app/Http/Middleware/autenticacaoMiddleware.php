<?php

namespace App\Http\Middleware;

use Closure;

class autenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil)
    {
        session_start();

        if(isset($_SESSION['email']) && $_SESSION['email'] != '')
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('site.login',['erro'=>2]);
        }
    }
}
