@extends('layouts.master')
@section('content')
    <div class="row mt-5">
        @include('flash::message')
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
@endsection