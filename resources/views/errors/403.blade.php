@extends('layouts.master')
@section('content')

    <div class="row">
        <div class="col-md-6 mx-auto text-center">
            <div class="card mt-5">
                <h1>ERROR 403: </h1>
                <h2>¡No tienes edad para comprar en esta página! Solo los mayores de edad tendrán acceso</h2>
                <div class="card-body">
                    <a href="{{url('/catalogo')}}" class="btn btn-primary btn-lg"><i class="fa fa-home"></i>Volver al inicio</a>
                </div>
            </div>
        </div>
    </div>
@endsection