<?php
/**
 * Created by PhpStorm.
 * User: iker
 * Date: 05/03/2018
 * Time: 13:35
 */

require_once ("phpincludes/header.php");
?>
<body>

<?php
include("phpincludes/navigation.php");
?>

<!-- Page Content -->
<div class="panel panel-default">
    <div class="panel-heading pb-2 pt-2">
        <div class="container">
            <h1 class="mb-0">Añadir un nuevo DISCO a la biblioteca</h1>
        </div>
    </div>
    <div class="panel-body">
        <div class="container">

            <form action="process.php" method="post">
                <input type="hidden" name="option" value="addNuevoDisco">

                <div class="row mt-3">
                    <div class="col-md-12">
                        <h3>Datos básicos</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8"><p>
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Introduce el nombre del disco" maxlength="80" size="50"  required /></p>
                    </div>
                    <div class="col-md-4">
                        <label for="anio">Año de publicación:</label>
                        <input type="number" class="form-control" name="anio" id="anio" min="1900" max="<?php echo date("Y"); ?>" step="1" value="0000" placeholder="Introduce el año de publicación del disco" required>
                    </div>
                </div>


                <!-- EDITOR -->
                <div class="row">
                    <div class="col-md-12" id="editor">
                        <h3>Editor:</h3>
                    </div>
                </div>

                <div class="row input-group control-group">
                    <div class="col">
                        <label for="editorNombre">Nombre</label>
                        <select class="form-control" name="editorNombre" id="editorNombre" required>
                            <option value="" class="text-secondary" disabled selected>Selecciona un editor de la lista</option>
                            <option>Anthony Baletti</option>
                            <option>John Smith</option>
                            <option>Erik Molier</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="editorCodigo">Código:</label>
                        <input type="text" class="form-control"  placeholder="Introduce el código" name="editorCodigo" id="editorCodigo" pattern="[0-9]{6}" title="Un código numérico de 6 cifras" maxlength="6" minlength="6"  required />
                    </div>

                    <div class="col">
                        <label for="editorNacionalidad">Nacionalidad:</label>
                        <input type="text" class="form-control" name="editorNacionalidad" id="editorNacionalidad" placeholder="Introduce la nacionalidad"  maxlength="80" required />
                    </div>

                </div>


                <!-- PRODUCTORES -->
                <div class="row">
                    <div class="col-md-12 mt-3" id="productores">
                        <h3>Productor o productores:</h3>
                    </div>
                </div>

                <div class="row input-group control-group after-add-more-productores">
                    <div class="col">
                        <label for="productorNombre">Nombre:</label>
                        <input type="text" id="productorNombre" name="productorNombre[]" class="form-control" placeholder="Introduce el nombre" maxlength="80" required>
                    </div>
                    <div class="col">
                        <label for="productorCodigo">Código:</label>
                        <input type="text" id="productorCodigo" name="productorCodigo[]" class="form-control" placeholder="Introduce el código" pattern="[0-9]{6}" title="Un código numérico de 6 cifras" maxlength="6" minlength="6"  required />
                    </div>
                    <div class="col">
                        <label for="productorNacionalidad">Nacionalidad:</label>
                        <input type="text" id="productorNacionalidad" name="productorNacionalidad[]" class="form-control" placeholder="Introduce la nacionalidad"  maxlength="80" required />
                    </div>
                    <div class="input-group-btn">
                        <label>&nbsp;</label>
                        <button class="btn btn-success add-more-productores form-control" type="button"><i class="glyphicon glyphicon-plus"></i> +</button>
                    </div>
                </div>


                <!-- CANCIONES -->

                <div class="row mt-3">
                    <div class="col-md-12" id="editor">
                        <h3>Canciones:</h3>
                    </div>
                </div>

                <input type="hidden" name="contCanciones" id="contCanciones" value="0" />



                <div class="after-add-more-canciones">

                </div>


                <div class="row input-group control-group mt-2">
                    <div class="col">
                        <div class="input-group-btn">
                            <button class="btn btn-success add-more-canciones form-control" type="button"><i class="glyphicon glyphicon-plus"></i> Añadir una nueva canción</button>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 mt-5"><input type="submit" class="btn btn-primary" /> <a class="btn btn-primary" href="index.php" role="button">Cancelar y volver atrás</a></div>
                </div>

            </form>


        </div>
    </div>
</div>


<?php

require_once ("phpincludes/footer.php");
?>

</body>

</html>



