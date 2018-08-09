$( document ).ready(function() {
    // Handler for .ready() called.

    //productores
    $(".add-more-productores").click(function(){
        $(".after-add-more-productores").after('<div class="row input-group control-group">\n' +
            '                        <div class="col">\n' +
            '                            <input type="text" id="productorNombre" name="productorNombre[]" class="form-control" placeholder="Introduce el nombre" maxlength="80" size="50"  required>\n' +
            '                        </div>\n' +
            '                        <div class="col">\n' +
            '                            <input type="text" id="productorCodigo" name="productorCodigo[]" class="form-control" placeholder="Introduce el código" pattern="[0-9]{6}" title="Un código numérico de 6 cifras" maxlength="6" minlength="6"  required />\n' +
            '                        </div>\n' +
            '                        <div class="col">\n' +
            '                            <input type="text" id="productorNacionalidad" name="productorNacionalidad[]" class="form-control" placeholder="Introduce la nacionalidad"  maxlength="80" required>\n' +
            '                        </div>\n' +
            '                        <div class="input-group-btn">\n' +
            '                            <button class="btn btn-danger remove form-control" type="button"><i class="glyphicon glyphicon-remove"></i>&nbsp;-&nbsp;&nbsp;</button>\n' +
            '                        </div>\n' +
            '                    </div>');
    });


    //compositores JS
    $("body").on("click",".add-more-compositores",function(e){

        var numCancion = parseInt($(e.currentTarget).closest('.after-add-more-compositores').find('#numCancionCompositores').val());

        $(this).parents(".after-add-more-compositores").after('                <!-- Copy Fields -->\n' +
            '                <div class="">\n' +
            '                    <div class="row input-group control-group">\n' +
            '                        <div class="col">\n' +
            '                            <input type="text" id="compositorNombre" name="compositorNombre_' + numCancion + '[]" class="form-control" placeholder="Introduce el nombre" maxlength="80" size="50"  required>\n' +
            '                        </div>\n' +
            '                        <div class="col">\n' +
            '                            <input type="text" id="compositorCodigo" name="compositorCodigo_' + numCancion + '[]" class="form-control" placeholder="Introduce el código" pattern="[0-9]{6}" title="Un código numérico de 6 cifras" maxlength="6" minlength="6"  required />\n' +
            '                        </div>\n' +
            '                        <div class="col">\n' +
            '                            <input type="text" id="compositorNacionalidad" name="compositorNacionalidad_' + numCancion +  '[]" class="form-control" placeholder="Introduce la nacionalidad"  maxlength="80" required>\n' +
            '                        </div>\n' +
            '                        <div class="input-group-btn">\n' +
            '                            <button class="btn btn-danger remove form-control" type="button"><i class="glyphicon glyphicon-remove"></i>&nbsp;-&nbsp;&nbsp;</button>\n' +
            '                        </div>\n' +
            '                    </div>\n' +
            '                </div>\n');
    });

    //interpretes JS
    $("body").on("click",".add-more-interpretes",function(e){

        var numCancion = parseInt($(e.currentTarget).closest('.after-add-more-interpretes').find('#numCancionInterpretes').val());

        $(this).parents(".after-add-more-interpretes").after('                <!-- Copy Fields -->\n' +
            '                <div class="">\n' +
            '                    <div class="row input-group control-group">\n' +
            '                        <div class="col">\n' +
            '                            <input type="text" id="interpreteNombre" name="interpreteNombre_' + numCancion + '[]" class="form-control" placeholder="Introduce el nombre" maxlength="80" size="50"  required>\n' +
            '                        </div>\n' +
            '                        <div class="col">\n' +
            '                            <input type="text" id="interpreteCodigo" name="interpreteCodigo_' + numCancion + '[]" class="form-control" placeholder="Introduce el código" pattern="[0-9]{6}" title="Un código numérico de 6 cifras" maxlength="6" minlength="6"  required>\n' +
            '                        </div>\n' +
            '                        <div class="col">\n' +
            '                            <input type="text" id="interpreteNacionalidad" name="interpreteNacionalidad_' + numCancion + '[]" class="form-control" placeholder="Introduce la nacionalidad"  maxlength="80" required>\n' +
            '                        </div>\n' +
            '                        <div class="input-group-btn">\n' +
            '                            <button class="btn btn-danger remove form-control" type="button"><i class="glyphicon glyphicon-remove"></i>&nbsp;-&nbsp;&nbsp;</button>\n' +
            '                        </div>\n' +
            '                    </div>\n' +
            '                </div>');
    });



    //Contenido del formulario para añadir más canciones
    $('.add-more-canciones').on('click', function(e){
            e.preventDefault();
            var contCanciones = parseInt($("#contCanciones").val()) + 1;
            var contenido = getContenidoCancionForm(contCanciones);

            $(".after-add-more-canciones").append(contenido);

            $("#contCanciones").attr("value", contCanciones);

        }

    );


    //Introducimos la canción obligatoria en la primera carga de la página
    $(window).bind("load", function() {
        // code here
        var contCanciones = 1;
        var contenido = getContenidoCancionForm(contCanciones);

        $(".after-add-more-canciones").append(contenido);

        $("#contCanciones").attr("value", contCanciones);
    });


    //Contenido del formulario para las canciones
    function getContenidoCancionForm(contCanciones){

        return '<div class="row mt-3">\n' +
            '                    <div class="col-md-12" id="editor">\n' +
            '                        <h5>Canción #' + contCanciones + ':</h5>\n' +
            '                    </div>\n' +
            '                </div>' +
            '                   <div name="contenedorNumCancion" id="contenedorNumCancion">' +
            '                   </div>' +
            '                   <div class="row mt-3 input-group control-group">\n' +
            '                    <div class="col-md-8">\n' +
            '                        <label for="cancionNombre">Título:</label>\n' +
            '                        <input type="text" id="cancionNombre" name="cancionNombre[]" class="form-control" placeholder="Introduce el título de la canción" maxlength="80" size="50"  required>\n' +
            '                    </div>\n' +
            '                    <div class="col-md-4">\n' +
            '                        <label for="cancionDuracion">Duración (hh:mm:ss):</label>\n' +
            '                        <input type="text" id="cancionDuracion" name="cancionDuracion[]" class="form-control" placeholder="Introduce la duración" pattern="[0-2]{1}[0-3]{1}:[0-5]{1}[0-9]{1}:[0-5]{1}[0-9]{1}" title="Formato: hh:mm:ss" maxlength="8" required>\n' +
            '                    </div>\n' +
            '\n' +
            '                </div>\n' +
            '\n' +
            '\n' +
            '                <div class="row mt-3">\n' +
            '                    <div class="col-md-12" id="editor">\n' +
            '                        <h5>Compositor o compositores de la canción:</h5>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '\n' +
            '                <div class="row input-group control-group after-add-more-compositores">\n' +
            '                       <input type="hidden" id="numCancionCompositores" name="numCancionCompositores" value="' + contCanciones + '">' +
            '                    <div class="col">\n' +
            '                        <label for="compositorNombre">Nombre:</label>\n' +
            '                        <input type="text" id="compositorNombre" name="compositorNombre_' + contCanciones + '[]" class="form-control" placeholder="Introduce el nombre" maxlength="80" size="50"  required>\n' +
            '                    </div>\n' +
            '                    <div class="col">\n' +
            '                        <label for="compositorCodigo">Código:</label>\n' +
            '                        <input type="text" id="compositorCodigo" name="compositorCodigo_' + contCanciones + '[]" class="form-control" placeholder="Introduce el código" pattern="[0-9]{6}" title="Un código numérico de 6 cifras" maxlength="6" minlength="6"  required>\n' +
            '                    </div>\n' +
            '                    <div class="col">\n' +
            '                        <label for="compositorNacionalidad">Nacionalidad:</label>\n' +
            '                        <input type="text" id="compositorNacionalidad" name="compositorNacionalidad_' + contCanciones + '[]" class="form-control" placeholder="Introduce la nacionalidad"  maxlength="80" required>\n' +
            '                    </div>\n' +
            '                    <div class="input-group-btn">\n' +
            '                        <label>&nbsp;</label>\n' +
            '                        <button class="btn btn-success add-more-compositores form-control" type="button"><i class="glyphicon glyphicon-plus"></i> +</button>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '\n' +
            '\n' +
            '\n' +
            '\n' +
            '                <div class="row mt-3">\n' +
            '                    <div class="col-md-12" id="editor">\n' +
            '                        <h5>Intérprete o intérpretes de la canción:</h5>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '\n' +
            '                <div class="row input-group control-group after-add-more-interpretes">\n' +
            '                       <input type="hidden" id="numCancionInterpretes" name="numCancionInterpretes" value="' + contCanciones + '">' +
            '                    <div class="col">\n' +
            '                        <label for="interpreteNombre">Nombre:</label>\n' +
            '                        <input type="text" id="interpreteNombre" name="interpreteNombre_' + contCanciones + '[]" class="form-control" placeholder="Introduce el nombre" maxlength="80" size="50"  required>\n' +
            '                    </div>\n' +
            '                    <div class="col">\n' +
            '                        <label for="interpreteCodigo">Código:</label>\n' +
            '                        <input type="text" id="interpreteCodigo" name="interpreteCodigo_' + contCanciones + '[]" class="form-control" placeholder="Introduce el código" pattern="[0-9]{6}" title="Un código numérico de 6 cifras" maxlength="6" minlength="6"  required>\n' +
            '                    </div>\n' +
            '                    <div class="col">\n' +
            '                        <label for="interpreteNacionalidad">Nacionalidad:</label>\n' +
            '                        <input type="text" id="interpreteNacionalidad" name="interpreteNacionalidad_' + contCanciones + '[]" class="form-control" placeholder="Introduce la nacionalidad"  maxlength="80" required>\n' +
            '                    </div>\n' +
            '                    <div class="input-group-btn">\n' +
            '                        <label>&nbsp;</label>\n' +
            '                        <button class="btn btn-success add-more-interpretes form-control" type="button"><i class="glyphicon glyphicon-plus"></i> +</button>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '\n' +

            '\n';


    }


    //LIBROS

    //Añade contenido al formulario para añadir más AUTORES a un LIBRO
    $(".add-more-autores").click(function(){
        //var html = $(".copy-productores").html();
        $(".after-add-more-autores").after('<div class="row input-group control-group">\n' +
            '                        <div class="col">\n' +
            '                            <input type="text" id="autorNombre" name="autorNombre[]" class="form-control" placeholder="Introduce el nombre" maxlength="80" size="50"  required>\n' +
            '                        </div>\n' +
            '                        <div class="col">\n' +
            '                            <input type="text" id="autorCodigo" name="autorCodigo[]" class="form-control" placeholder="Introduce el código" pattern="[0-9]{6}" title="Un código numérico de 6 cifras" maxlength="6" minlength="6"  required>\n' +
            '                        </div>\n' +
            '                        <div class="col">\n' +
            '                            <input type="text" id="autorNacionalidad" name="autorNacionalidad[]" class="form-control" placeholder="Introduce la nacionalidad"  maxlength="80" size="50"  required>\n' +
            '                        </div>\n' +
            '                        <div class="input-group-btn">\n' +
            '                            <button class="btn btn-danger remove form-control" type="button"><i class="glyphicon glyphicon-remove"></i>&nbsp;-&nbsp;&nbsp;</button>\n' +
            '                        </div>\n' +
            '                    </div>');
    });

    //PELICULAS

    //Añade contenido al formulario para añadir más DIRECTORES a una PELICULA
    $(".add-more-directores").click(function(){
        //var html = $(".copy-productores").html();
        $(".after-add-more-directores").after('<div class="row input-group control-group">\n' +
            '                        <div class="col">\n' +
            '                            <input type="text" id="directorNombre" name="directorNombre[]" class="form-control" placeholder="Introduce el nombre" maxlength="80" size="50"  required>\n' +
            '                        </div>\n' +
            '                        <div class="col">\n' +
            '                            <input type="text" id="directorCodigo" name="directorCodigo[]" class="form-control" placeholder="Introduce el código" pattern="[0-9]{6}" title="Un código numérico de 6 cifras" maxlength="6" minlength="6"  required>\n' +
            '                        </div>\n' +
            '                        <div class="col">\n' +
            '                            <input type="text" id="directorNacionalidad" name="directorNacionalidad[]" class="form-control" placeholder="Introduce la nacionalidad"  maxlength="80" required>\n' +
            '                        </div>\n' +
            '                        <div class="input-group-btn">\n' +
            '                            <button class="btn btn-danger remove form-control" type="button"><i class="glyphicon glyphicon-remove"></i>&nbsp;-&nbsp;&nbsp;</button>\n' +
            '                        </div>\n' +
            '                    </div>');
    });
    

    //Añade contenido al formulario para añadir más ACTORES a una PELICULA
    $(".add-more-actores").click(function(){
        //var html = $(".copy-productores").html();
        $(".after-add-more-actores").after('<div class="row input-group control-group">\n' +
            '                        <div class="col">\n' +
            '                            <input type="text" id="actorNombre" name="actorNombre[]" class="form-control" placeholder="Introduce el nombre" maxlength="80" size="50"  required>\n' +
            '                        </div>\n' +
            '                        <div class="col">\n' +
            '                            <input type="text" id="actorCodigo" name="actorCodigo[]" class="form-control" placeholder="Introduce el código" pattern="[0-9]{6}" title="Un código numérico de 6 cifras" maxlength="6" minlength="6"  required>\n' +
            '                        </div>\n' +
            '                        <div class="col">\n' +
            '                            <input type="text" id="actorNacionalidad" name="actorNacionalidad[]" class="form-control" placeholder="Introduce la nacionalidad" maxlength="80" required>\n' +
            '                        </div>\n' +
            '                        <div class="input-group-btn">\n' +
            '                            <button class="btn btn-danger remove form-control" type="button"><i class="glyphicon glyphicon-remove"></i>&nbsp;-&nbsp;&nbsp;</button>\n' +
            '                        </div>\n' +
            '                    </div>');
    });




    $("body").on("click",".remove",function(){
        $(this).parents(".control-group").remove();
    });

});


