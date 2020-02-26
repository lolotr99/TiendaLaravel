@extends('layouts.master')
@section('content')
    @if (!session()->has('cesta') || session('cesta') == null)
        {{ session(['cesta' => array()]) }}
        Aún no hay ningún artículo en la cesta
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
                    <form>
                        <div class="col">
                            <label for="cantidad">Cantidad</label>
                            <input class="form-class" id="cantidad" name="cantidad" type="number" min="0">
                            <input type="submit" value="Pagar">
                            <hr>
                            <a href="<?php echo url('/catalogo') ?>" class="btn btn-default" style="border-color: black;">Volver al listado</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    @endif
@endsection