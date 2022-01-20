@extends('templades.base')
@section('contenido')
<div class="container" style="margin-top: 10px;margin-bottom: 10px;">
    <div class="row justify-content-center row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-3">
        <div class="row">
            <div class="alert alert-danger" role="alert">
                {{$error}}
            </div>
            <div>
                <a type="button" class="btn btn-primary" href="/">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection