@extends('layouts.master')
@section('content')
    <div class="card mx-auto my-5">
        <div class="card-header">
            <h2>Editar Artículo</h2>
        </div>
        <div class="card-body mt-3">
            <form action="{{url('/updateArticulo')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="titulo" class="col-form-label">Nombre</label>
                    <input type="text" required class="form-control" name="nombre" id="nombre" value="{{$articulo->nombreArticulo}}">
                    <input type="hidden" name="ocultoIdArticulo" value="{{$articulo->id}}">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="marca">Marca</label>
                        <select name="marca" class="form-control" id="marca" required>
                            <option value="{{ $articulo->marca }}" {{ ("Nike" == $articulo->marca ? "selected":"") }}>Nike</option>
                            <option value="{{ $articulo->marca }}" {{ ("Adidas" == $articulo->marca ? "selected":"") }}>Adidas</option>
                            <option value="{{ $articulo->marca }}" {{ ("Fila" == $articulo->marca ? "selected":"") }}>Fila</option>
                            <option value="{{ $articulo->marca }}" {{ ("Puma" == $articulo->marca ? "selected":"") }}>Puma</option>
                            <option value="{{ $articulo->marca }}" {{ ("Asics" == $articulo->marca ? "selected":"") }}>Asics</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="precio">Precio</label>
                        <input type="number"  step=".01" name="precio" min="0"  value="{{$articulo->precio}}" class="form-control" required id="precio" placeholder="0,00€">
                    </div>
                </div>
                <div class="form-group">
                    <label for="imagenArticulo" class="col-form-label">Seleccionar Imagen</label>
                    <input type="file" name="imagenArticulo" accept=".png, .jpg" id="imagenArticulo" required>
                </div>
                <div class="form-group">
                    <label for="descripcion" class="col-form-label">Descripcion:</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" required>{{$articulo->descripcion}}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar Articulo</button>
                </div>
            </form>
        </div>
    </div>
@endsection