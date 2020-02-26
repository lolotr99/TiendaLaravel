<?php

namespace App\Http\Controllers;

use App\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Session;

class CatalogoController extends Controller
{
     public function getIndex()
    {
        $articulos = Articulo::all();
        return	view('catalogo.show', array('arrayArticulos'=>$articulos));
    }

    public function postArticulo(Request $request) {
         $articulo = new Articulo();
         $articulo->nombreArticulo = $request->input('nombre');
         $articulo->marca = $request->input('marca');
         $articulo->precio = $request->input('precio');
         $articulo->imagenArticulo = $request->file('imagenArticulo')->move('imagenes',$request->file('imagenArticulo')->getClientOriginalName());
         $articulo->descripcion = $request->input('descripcion');
         $articulo->save();
         return redirect('catalogo');
    }

    public function anadirCesta(Request $request) {
         $id = $request->input('ocultoId');
         $articulo = Articulo::find($id);
         $arrayArticulos = array($articulo);
         session(['cesta' => $arrayArticulos]);
         return redirect('cesta');
    }
}
