@extends('layouts.master')
@section('content')

<div class="row mt-5">
    @foreach($arrayArticulos as	$key =>	$articulo)
        <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                <img src="{{asset($articulo->imagenArticulo)}}"style="height:200px"/>
                <h4	style="min-height:45px;margin:5px 0	10px 0">
                    {{$articulo->nombreArticulo}}
                </h4>
            @if (Auth::check())
                <form action="{{url('catalogo/anadirCesta')}}" method="post">
                    {{csrf_field()}}
                    <input type="submit" class="btn btn-secondary" value="Comprar Artículo"/>
                    <input type="hidden" value="{{$articulo->id}}" name="ocultoId">
                    <input type="hidden" value="{{$articulo->nombreArticulo}}" name="ocultoNombre">
                    <input type="hidden" value="{{$articulo->precio}}" name="ocultoPvp">
                </form>
            @endif
        </div>
    @endforeach
</div>

@endsection