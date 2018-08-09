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
            <h1 class="mb-0">Añadir una nueva PELÍCULA a la biblioteca</h1>
        </div>
    </div>
    <div class="panel-body">
        <div class="container">

            

            <form action="process.php" method="post">
                <input type="hidden" name="option" value="addNuevaPelicula">

                <div class="row mt-3">
                    <div class="col-md-12">
                        <h3>Datos básicos</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6"><p>
                            <label for="titulo">Título:</label>
                            <input type="text" name="titulo" id="titulo" placeholder="Introduce el título de la película" maxlength="50" size="50" class="form-control" required /></p>
                    </div>
                    <div class="col-md-3">
                        <label for="duracion">Duración (hh:mm:ss):</label>
                       <input type="text" id="duracion" name="duracion" class="form-control" placeholder="Introduce la duración" pattern="[0-2]{1}[0-3]{1}:[0-5]{1}[0-9]{1}:[0-5]{1}[0-9]{1}" title="Formato: hh:mm:ss" maxlength="8" required>
                   </div>
                    <div class="col-md-3">
                        <label for="anio_estreno">Año de estreno:</label>
                        <input type="text" class="form-control" name="anio_estreno" id="anio_estreno" placeholder="Introduce el año de estreno de la película" min="1900" max="<?php echo date("Y"); ?>" step="1" value="0000" placeholder="Introduce el año de publicación del disco" required>
                    </div>

                </div>

                


                <!-- DIRECTORES -->

                <div class="row">
                    <div class="col-md-12 mt-3" id="directores">
                        <h3>Director o directores:</h3>
                    </div>
                </div>

                <div class="row input-group control-group after-add-more-directores">
                    <div class="col">
                        <label for="directorNombre">Nombre:</label>
                        <input type="text" id="directorNombre" name="directorNombre[]" class="form-control" placeholder="Introduce el nombre" maxlength="80" size="50" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="directorCodigo">Código:</label>
                        <input type="text" id="directorCodigo" name="directorCodigo[]" class="form-control" placeholder="Introduce el código" pattern="[0-9]{6}" title="Un código numérico de 6 cifras" maxlength="6" minlength="6"  required>
                    </div>
                    <div class="col">
                        <label for="directorNacionalidad">Nacionalidad:</label>
                        <input type="text" id="directorNacionalidad" name="directorNacionalidad[]" class="form-control" placeholder="Introduce la nacionalidad" maxlength="80" required>
                    </div>
                    <div class="input-group-btn">
                        <label>&nbsp;</label>
                        <button class="btn btn-success add-more-directores form-control" type="button"><i class="glyphicon glyphicon-plus"></i> +</button>
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
                        <input type="text" id="productorNombre" name="productorNombre[]" class="form-control" placeholder="Introduce el nombre" maxlength="80" size="50" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="productorCodigo">Código:</label>
                        <input type="text" id="productorCodigo" name="productorCodigo[]" class="form-control" placeholder="Introduce el código" pattern="[0-9]{6}" title="Un código numérico de 6 cifras" maxlength="6" minlength="6"  required>
                    </div>
                    <div class="col">
                        <label for="productorNacionalidad">Nacionalidad:</label>
                        <input type="text" id="productorNacionalidad" name="productorNacionalidad[]" class="form-control" placeholder="Introduce la nacionalidad" maxlength="80" required>
                    </div>
                    <div class="input-group-btn">
                        <label>&nbsp;</label>
                        <button class="btn btn-success add-more-productores form-control" type="button"><i class="glyphicon glyphicon-plus"></i> +</button>
                    </div>
                </div>


                <!-- ACTORES -->

                <div class="row">
                    <div class="col-md-12 mt-3" id="actores">
                        <h3>Actor o actores:</h3>
                    </div>
                </div>

                <div class="row input-group control-group after-add-more-actores">
                    <div class="col">
                        <label for="actorNombre">Nombre:</label>
                        <input type="text" id="actorNombre" name="actorNombre[]" class="form-control" placeholder="Introduce el nombre" maxlength="80" size="50" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="actorCodigo">Código:</label>
                        <input type="text" id="actorCodigo" name="actorCodigo[]" class="form-control" placeholder="Introduce el código" pattern="[0-9]{6}" title="Un código numérico de 6 cifras" maxlength="6" minlength="6"  required>
                    </div>
                    <div class="col">
                        <label for="actorNacionalidad">Nacionalidad:</label>
                        <input type="text" id="actorNacionalidad" name="actorNacionalidad[]" class="form-control" placeholder="Introduce la nacionalidad" maxlength="80" required>
                    </div>
                    <div class="input-group-btn">
                        <label>&nbsp;</label>
                        <button class="btn btn-success add-more-actores form-control" type="button"><i class="glyphicon glyphicon-plus"></i> +</button>
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



