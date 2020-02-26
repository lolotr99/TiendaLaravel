<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MayorEdad
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$age)
    {
        $fechaNac = Auth::user()->fechanacimiento;
        $fNac = date("Y-m-d", strtotime($fechaNac));
        $hoy = now();
        $annos = $hoy->diff($fNac);
        $edadUsuario = $annos->y;
        if ($edadUsuario  <= $age) {
            abort(403, "¡No tienes edad para comprar en esta página! Solo los mayores de edad tendrán acceso");
        }
        return $next($request);
    }
}
