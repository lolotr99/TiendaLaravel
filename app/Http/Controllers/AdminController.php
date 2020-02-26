<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function getIndex()
    {
        $articulos = Articulo::all();
        return	view('admin.control', array('arrayArticulos'=>$articulos));
    }

    public function deleteArticulo($id) {
        DB::table('historialventas')->where("idArticulo", '=', $id)->delete();
        $articulo = Articulo::find($id);
        $articulo->delete();

        flash('El artículo fue eliminado correctamente');
        return redirect('/control');
    }

    public function updateArticulo($id) {
        $articulo = Articulo::find($id);
        return view('admin.update', array('articulo' => $articulo));
    }

    public function postUpdate (Request $request) {
        $idArticulo = $request->input('ocultoIdArticulo');
        $articulo=Articulo::where('id', '=',$idArticulo )->first();
        $articulo->nombreArticulo = $request->input('nombre');
        $articulo->marca = $request->input('marca');
        $articulo->precio = $request->input('precio');
        $articulo->imagenArticulo = $request->file('imagenArticulo')->move('imagenes',$request->file('imagenArticulo')->getClientOriginalName());
        $articulo->descripcion = $request->input('descripcion');
        $articulo->save();
        flash('El artículo fue actualizado correctamente');
        return redirect('/control');
    }
}
