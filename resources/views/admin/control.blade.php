@extends('layouts.master')
@section('content')
    <div class="row mt-5">
        @include('flash::message')
    </div>
    <div class="row d-flex justify-content-end">
        <button id="modalboton" class="btn btn-primary" data-toggle="modal" data-target="#modalArticulo">Añadir Articulo</button>
    </div>
<div class="row">
        @foreach($arrayArticulos as	$key =>	$articulo)
        <div class="card mr-5 mb-5" style="width:400px">
                <img class="card-img-top" src="{{asset($articulo->imagenArticulo)}}" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title">{{$articulo->nombreArticulo}}</h4>
                    <h4 class="card-title">{{$articulo->precio}} €</h4>
                    <p class="card-text">{{$articulo->descripcion}}</p>
                    <a class="btn btn-danger"  onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?')" href="{{url('/deleteArticulo',$articulo->id)}}">Eliminar articulo</a>
                    <a class="btn btn-warning" href="{{url('/updateArticulo',$articulo->id)}}"><i class="fas fa-pencil"></i>Editar articulo</a>
                </div>
        </div>
        @endforeach
</div>

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
                <form name="formArticulo" method="post" action="{{url('/control/anadirArticulo')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="titulo" class="col-form-label">{{ __('Nombre') }}</label>
                        <input type="text" required class="form-control @if(isset($error)) is-invalid @endif" name="nombre" id="nombre" value="{{old('nombre')}}">
                        @if(isset($error))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $error }}</strong>
                        </span>
                        @endif
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
                            <label for="precio">{{ __('Precio') }}</label>
                            <input type="number"  step=".01" name="precio" min="0" class="form-control @if(isset($error)) is-invalid @endif" required id="precio" placeholder="0,00€" value="{{old('precio')}}">
                            @error('precio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="imagenArticulo" class="col-form-label">{{ __('Seleccionar Imagen') }}</label>
                        <input type="file" name="imagenArticulo" class="form-control @if(isset($error)) is-invalid @endif" accept=".png, .jpg" id="imagenArticulo" required value="{{old('imagenArticulo')}}">
                        @error('imagenArticulo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="col-form-label">{{ __('Descripcion') }}</label>
                        <textarea class="form-control @if(isset($error)) is-invalid @endif" name="descripcion" id="descripcion" required>{{old('descripcion')}}</textarea>
                        @error('descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Guardar Articulo') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection