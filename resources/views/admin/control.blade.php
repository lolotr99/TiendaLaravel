@extends('layouts.master')
@section('content')

    <a class="btn btn-danger">Eliminar articulo</a>
    <a class="btn btn-warning" data-toggle="modal" data-target="#modalArticulo" ><i class="fas fa-pencil"></i>Editar articulo</a>

<div class="modal fade" id="modalArticulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Articulo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="formArticulo" method="post" action="" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="titulo" class="col-form-label">Nombre</label>
                        <input type="text" required class="form-control" name="nombre" id="nombre">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="marca">Marca</label>
                            <select name="marca" class="form-control" id="marca" required>
                                <option value="Nike">Nike</option>
                                <option value="Adidas">Adidas</option>
                                <option value="Fila">Fila</option>
                                <option value="Puma">Puma</option>
                                <option value="Asics">Asics</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="precio">Precio</label>
                            <input type="number"  step=".01" name="precio" min="0" class="form-control" required id="precio" placeholder="0,00€">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="imagenArticulo" class="col-form-label">Seleccionar Imagen</label>
                        <input type="file" name="imagenArticulo" accept=".png, .jpg" id="imagenArticulo" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="col-form-label">Descripcion:</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Articulo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection