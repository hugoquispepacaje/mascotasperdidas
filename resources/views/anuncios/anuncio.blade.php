@extends('templades.base')

@section('contenido')
    <div class="container" style="margin-top: 10px;margin-bottom: 10px;">
        <div class="container justify-content-center">
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
            <div class="card text-center">
                <img class="card-img-top img-fluid img-thumbnail" src="{{$anuncio->imagen}}" alt="Card image cap">
                <div class="card-body">
                    <h1 class="card-title">{{$anuncio->nombre}}</h1>
                    <h5 class="card-text">Descripción:</h5>
                    <p class="card-text">{{$anuncio->descripcion}}</p>
                    <h5 class="card-text">Fecha de desaparición/encuentro:</h5>
                    <p class="card-text">{{$anuncio->fecha}}</p>
                    <h5 class="card-text">Color de mascota:</h5>
                    <p class="card-text">{{$anuncio->color}}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h3 class="card-text">Detalles de contacto:</h3>
                        <h5 class="card-text">Nombre de contacto:</h5>
                        <p class="card-text">{{$anuncio->nombre_contacto}}</p>
                        <h5 class="card-text">Numero de contacto:</h5>
                        <p class="card-text">{{$anuncio->numero_contacto}}</p>
                    </li>
                    <li class="list-group-item">
                        <h3 class="card-text">Detalles de publicación:</h3>
                        <h5 class="card-text">Tipo de publicación:</h5>
                        <p class="card-text">{{$anuncio->tipo}}</p>
                        <h5 class="card-text">Tipo de mascota:</h5>
                        <p class="card-text">{{$anuncio->tipo_mascota}}</p>
                        <h5 class="card-text">Codigo de publicación:</h5>
                        <p class="card-text">{{$anuncio->codigo_publicacion}}</p>
                    </li>
                </ul>
            </div>  
        </div>
        <div class="modal-footer">
            <button class="btn btn-success" data-toggle="modal" data-target="#editarModal">Editar</button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminarModal">
                Eliminar
            </button>
        </div>
    </div>
    <div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminarModalLabel">Eliminar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar el anuncio?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form action="{{ url('/anuncios',['id' => $anuncio->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('anuncios.editar_anuncio')
@endsection

