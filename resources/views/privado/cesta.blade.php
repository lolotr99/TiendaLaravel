@extends('layouts.master')
@section('content')
    @if (!session()->has('cesta') || session('cesta') == null)
        {{ session(['cesta' => array()]) }}
        <h1 class="mt-5">No tienes ningún artículo en la cesta</h1>
        <a href="{{url('/catalogo')}}" class="btn btn-primary">Ver Artículos para comprar</a>
    @else
        @foreach (session('cesta') as $indice => $valor)
        <div class="row mt-5">
            <div class="col-sm-4">
                <img src="{{asset($valor->imagenArticulo)}}" style="width: 350px; height: 350px;">
            </div>
            <div class="col-sm-8">
                    <h3><b>{{$valor->nombreArticulo}}</b></h3>
                <hr>
                    <h4>Precio: <b>{{$valor->precio}}</b></h4>
                    <h5>Marca: <b>{{$valor->marca}}</b></h5>
                    <p>Descripción: <span class="font-weight-bold"></span>{{$valor->descripcion}}</p>
                <hr>
                <div class="row">
                        <div class="col">
                            <form action="{{url('/cesta/comprar')}}" method="post">
                                {{csrf_field()}}
                                <label for="cantidad">Cantidad</label>
                                <input type="number" class="form-class" id="cantidad" name="cantidad" required min="0">
                                <input type="hidden" name="ocultoIdArticulo" value="{{$valor->id}}">
                                <input type="submit" class="btn btn-primary" value="Pagar">
                            </form>
                            <hr>
                            <a href="<?php echo url('/catalogo') ?>" class="btn btn-default" style="border-color: black;">Volver al listado</a>
                            <a href="<?php echo url('/catalogo/vaciarCesta') ?>" class="btn btn-default" style="border-color: black;">Vaciar cesta</a>

                        </div>

                </div>
            </div>
        </div>
        @endforeach
    @endif
@endsection