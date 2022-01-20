<script>
    $.validator.addMethod("maxDate", function(value, element) {
        var curDate = new Date();
        var inputDate = new Date(value);
        if (inputDate <= curDate)
            return true;
        return false;
    }, "Fecha debe ser hasta hoy"); 

    $.validator.addMethod('filesize', function (value, element, arg) {
        var minsize=1000; // min 1kb
        if((element.files[0].size>minsize)&&(element.files[0].size<=arg)){
            return true;
        }else{
            return false;
        }
    });
    $(document).ready(function () {
        $("#formulario_crear").validate({
            rules: {
                nombre:{
                    required: true,
                    maxlength: 20
                },
                color:{
                    required: true,
                    maxlength: 20
                },
                fecha:{
                    required: true,
                    maxDate: true,
                },
                imagen:{
                    required: true,
                    extension: "jpeg|png|jpg|svg",
                    filesize: 5000000
 
                },
                descripcion:{
                    required: true
                },
                nombre_contacto:{
                    required: true,
                    maxlength: 20
                },
                numero_contacto:{
                    required: true,
                    maxlength: 9,
                    minlength: 9
                }
            },
            messages: {
                nombre:{
                    required: "Campo obligatorio",
                    maxlength: "Maximo 20 caracteres"
                },
                color:{
                    required: "Campo obligatorio",
                    maxlength: "Maximo 20 caracteres"
                },
                fecha:{
                    required: "Campo obligatorio",
                },
                imagen:{
                    required: "Campo obligatorio",
                    extension: "Formatos permitidos jpeg|png|jpg|svg",
                    filesize: "Maximo 5 MB"
                },
                descripcion:{
                    required: "Campo obligatorio"
                },
                nombre_contacto:{
                    required: "Campo obligatorio",
                    maxlength: "Maximo 20 caracteres"
                },
                numero_contacto:{
                    required: "Campo obligatorio",
                    maxlength: "Deben ser 9 digitos",
                    minlength: "Deben ser 9 digitos"
                }
            }
        });
        $("#formulario_editar").validate({
            rules: {
                nombre:{
                    required: true,
                    maxlength: 20
                },
                color:{
                    required: true,
                    maxlength: 20
                },
                fecha:{
                    required: true,
                    maxDate: true,
                },
                imagen:{
                    extension: "jpeg|png|jpg|svg"
 
                },
                descripcion:{
                    required: true
                },
                nombre_contacto:{
                    required: true,
                    maxlength: 20
                },
                numero_contacto:{
                    required: true,
                    maxlength: 9,
                    minlength: 9
                }
            },
            messages: {
                nombre:{
                    required: "Campo obligatorio",
                    maxlength: "Maximo 20 caracteres"
                },
                color:{
                    required: "Campo obligatorio",
                    maxlength: "Maximo 20 caracteres"
                },
                fecha:{
                    required: "Campo obligatorio",
                },
                imagen:{
                    extension: "Formatos permitidos jpeg|png|jpg|svg"
                },
                descripcion:{
                    required: "Campo obligatorio"
                },
                nombre_contacto:{
                    required: "Campo obligatorio",
                    maxlength: "Maximo 20 caracteres"
                },
                numero_contacto:{
                    required: "Campo obligatorio",
                    maxlength: "Deben ser 9 digitos",
                    minlength: "Deben ser 9 digitos"
                }
            }
        });
    });
</script>