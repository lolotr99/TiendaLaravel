<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Historialventas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CatalogoController extends Controller
{
     public function getIndex()
    {
        $articulos = Articulo::all();
        return	view('catalogo.show', array('arrayArticulos'=>$articulos));
    }

    public function anadirCesta(Request $request) {
         $id = $request->input('ocultoId');
         $articulo = Articulo::find($id);
         $arrayArticulos = array($articulo);
         session(['cesta' => $arrayArticulos]);
         return redirect('cesta');
    }

    public function vaciarCesta() {
        session()->forget('cesta');
        return view('privado.cesta');
    }

    public function comprarArticulo(Request $request) {
         $historialVentas = new Historialventas();
         $historialVentas->idUsuario = Auth::user()->id;
         $historialVentas->idArticulo = $request->input('ocultoIdArticulo');
         $historialVentas->fechacompra = date('Y-m-d');
         $historialVentas->cantidad = $request->input('cantidad');
         $historialVentas->save();
         return view('catalogo.factura');
    }
}
