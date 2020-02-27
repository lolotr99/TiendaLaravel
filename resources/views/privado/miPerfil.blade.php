@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-3">
                <div class="text-center">
                    <?php
                    ?><img src="{{asset('/imagenes/usuario.png')}}" class="img-circle img-thumbnail" alt="imagen de perfil del usuario">
                </div></hr><br>
            </div>
            <div class="col-sm-9 text-left">
                <div class="tab-content">
                    <h1>DATOS DEL USUARIO</h1>
                    <hr>
                    <h1 class="h3">{{ auth()->user()->nombre }}</h1>
                    <p class="m-0"><b>Email</b><i class="fas fa-mail-bulk mr-2"></i>{{ auth()->user()->email }}</p>
                    <p class="m-0"><b>Fecha de nacimiento:</b> <i class="fas fa-calendar-alt mr-2"></i>{{ auth()->user()->fechanacimiento }}</p>
                    <hr>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <section class="table-responsive">
                    <h1>Historial de Compras</h1>
                    <table class="table table-hover mt-5">
                        <thead>
                        <tr>
                            <th>Articulo</th>
                            <th>Cantidad</th>
                            <th>Precio Total</th>
                            <th>Fecha</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($compras as $value)
                            <tr>
                                <th>{{$value->nombreArticulo}}</th>
                                <td>{{$value->cantidad}}</td>
                                <td>{{$value->precio * $value->cantidad}}</td>
                                <td>{{$value->fechacompra}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>
@endsection