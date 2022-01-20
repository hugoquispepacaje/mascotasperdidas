<div class="modal fade " id="gestionarModal" tabindex="-1" role="dialog" aria-labelledby="gestionarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="gestionarModalLabel">Gestionar publicación</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/anuncios/gestionar" autocomplete="off">
                    @csrf
                    <div class="container">
                        <h4>Codigo de publicación</h4>
                        <div class="form-group">
                            <label for="codigo_publicacionInput">Ingese el codigo de la publicación</label>
                            <input type="text" class="form-control" id="codigo_publicacionInput" name="codigo_publicacion" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Gestionar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>