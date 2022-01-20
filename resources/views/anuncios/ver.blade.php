@extends('templades.base')

@section('contenido')
    <div class="container" style="margin-top: 10px;margin-bottom: 10px;">
        <div class="row justify-content-center row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-3">
            @if($errors->any())
                <div class="container">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif       
            @if($anuncios->isEmpty())
            <div class="alert alert-dark" role="alert">
                No hay publicaciones
            </div>
            @else
                @foreach($anuncios as $anuncio)
                <div class="col mt-4">
                    <div class="card text-center" style="width: 18rem;">
                        <img style="width: 18rem; height: 18rem;" class="card-img-top rounded mx-auto d-block" src="{{$anuncio->imagen}}" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title">{{$anuncio->nombre}}</h2>
                            <h6 class="card-subtitle mb-2 text-muted">{{$anuncio->tipo}}</h6>
                            <h5 class="text-muted">Fecha de perdida/encuentro</h5>
                            <p class="card-text">{{date("d/m/Y", strtotime($anuncio->fecha))}}</p>
                            <button type="button" class="btn btn-primary" data-nombre="{{$anuncio->nombre}}" data-descripcion="{{$anuncio->descripcion}}" data-nombre_contacto="{{$anuncio->nombre_contacto}}"
                            data-imagen="{{$anuncio->imagen}}" data-color="{{$anuncio->color}}" data-fecha="{{date("d/m/Y", strtotime($anuncio->fecha))}}" data-numero_contacto="{{$anuncio->numero_contacto}}"
                            data-toggle="modal" data-target="#detallesModal">Ver detalles</button>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="modal fade" id="detallesModal" tabindex="-1" role="dialog" aria-labelledby="detallesModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="card text-center">
                                    <img class="card-img-top img-fluid img-thumbnail" name="imagen" id="imagen">
                                    <div class="card-body">
                                        <h1 class="card-title" name="nombre" id="nombre">Nombre</h1>
                                        <h5 class="card-text">Descripción:</h5>
                                        <p class="card-text" name="descripcion" id="descripcion">Descripcion</p>
                                        <h5 class="card-text">Fecha de desaparición/encuentro:</h5>
                                        <p class="card-text" name="fecha" id="fecha">Fecha</p>
                                        <h5 class="card-text">Color de mascota:</h5>
                                        <p class="card-text" name="color" id="color">Color</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <h3 class="card-text">Detalles de contacto:</h3>
                                            <h5 class="card-text" >Nombre de contacto:</h5>
                                            <p class="card-text" name="nombre_contacto" id="nombre_contacto">Nombre de contacto</p>
                                            <h5 class="card-text">Numero de contacto:</h5>
                                            <p class="card-text" name="numero_contacto" id="numero_contacto">Numero de contacto</p>
                                        </li>
                                    </ul>
                                    <div class="card-body">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    @if(session('tipo_mensaje'))
        <div class="modal fade" id="mensaje" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Mensaje</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    @if(session('tipo_mensaje')=='error')
                        <p>{{session('mensaje')}}</p>
                    @elseif(session('tipo_mensaje')=='exito')
                        <h3 class="card-text">Anuncio publicado con exito</h3>
                        <h5 class="card-text">Usted puede gestionar el anuncio con el siguiente codigo:</h5>
                        <h3 class="card-text">{{session('codigo_publicacion')}}</h3>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Listo</button>
                </div>
                </div>
            </div>
        </div>
    @endif
@endsection
