<?php

namespace App\Http\Middleware;

use Closure;

class CheckRol
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
        //dd($rol); Imprimir lo que tenemos en la variable

       // $rol = func_get_arg();//traer todos los parametros
        //$rol = array_slice($rol, 2);//escoger los ultimos parameros
      /*  $rol = array_slice( func_get_args(), 2);
        //dd($roles);
        

            if ( auth()->user()->hasRoles($rol))

            {
                    return $next($request);
            }

        
        
        return redirect('/');
    }*/
    
    $roles = array_slice( func_get_args(), 2);
    
   
        # code...
         if (auth()->user()->hasroles($roles))
        {

        return $next($request);
        }
    
   
        return redirect('/');
    }
}
