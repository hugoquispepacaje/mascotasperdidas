<div class="modal fade " id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="editarModalLabel">Editar publicación</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulario_editar" method="POST" action="{{ url('/anuncios',['id' => $anuncio->id])}}" enctype="multipart/form-data" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <div class="container">
                        <h4>Datos de publicación</h4>
                        <div class="form-group">
                            <label for="tipoDePublicacionSelect">Tipo de publicación</label>
                            <select class="form-control" id="tipoDePublicacionSelect" name="tipo">
                                <option selected disabled hidden> 
                                    {{$anuncio->tipo}} 
                                </option> 
                                <option>Mascota perdida</option>
                                <option>Mascota encontrada</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nombreInput">Nombre de publicación</label>
                            <input type="text" class="form-control" id="nombreInput" name="nombre" value="{{$anuncio->nombre}}" placeholder="Maximo 20 caracteres">
                        </div>
                        <div class="form-group">
                            <label for="colorInput">Color de la mascota</label>
                            <input type="text" class="form-control" id="colorInput" name="color" value="{{$anuncio->color}}" placeholder="Maximo 20 caracteres">
                        </div>
                        <div class="form-group">
                            <label for="datepicker">Fecha de perdida/encuentro</label>
                            <input type="date" id="datepicker" class="form-control" name="fecha" value="{{$anuncio->fecha}}">
                        </div>
                        <div class="form-group">
                            <label for="tipoDeMascotaSelect">Tipo de mascota</label>
                            <select class="form-control" id="tipoDeMascotaSelect" name="tipo_mascota">
                                <option selected disabled hidden> 
                                    {{$anuncio->tipo_mascota}}
                                </option> 
                                <option>Gato</option>
                                <option>Perro</option>
                                <option>Otro</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fotoFile">Foto</label>
                            <input type="file" class="form-control-file" id="fotoFile" name="imagen" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="descripcionTextArea">Descripción</label>
                            <textarea class="form-control" id="descripcionTextArea" rows="4" name="descripcion" required>{{$anuncio->descripcion}}</textarea>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="container">
                        <h4>Datos de contacto</h4>
                        <div class="form-group">
                            <label for="nombreContacotInput">Nombre de contacto</label>
                            <input type="text" class="form-control" id="nombreContacotInput" name="nombre_contacto" value="{{$anuncio->nombre_contacto}}" placeholder="Maximo 20 caracteres">
                        </div>
                        <div class="form-group">
                            <label for="TelefonoContactoInput">Telefono de contacto</label>
                            <input type="number" class="form-control" id="TelefonoContactoInput" name="numero_contacto" value="{{$anuncio->numero_contacto}}" placeholder="Numero de 9 digitos">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Actualizar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>