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
            <h1 class="mb-0">Añadir un nuevo LIBRO a la biblioteca</h1>
        </div>
    </div>
    <div class="panel-body">
        <div class="container">


            <form action="process.php" method="post">
                <input type="hidden" name="option" value="addNuevoLibro">

                <div class="row mt-3">
                    <div class="col-md-12">
                        <h3>Datos básicos</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8"><p>
                            <label for="titulo">Nombre:</label>
                            <input type="text" name="titulo" id="titulo" placeholder="Introduce el título del libro" maxlength="80" size="50" class="form-control" required /></p>
                    </div>
                    <div class="col-md-4">
                        <label for="lengua">Lengua:</label>
                        <input type="text" class="form-control" name="lengua" id="lengua" pattern="[a-z]{2}-[A-Z]{2}" maxlength="5" placeholder="Introduce la lengua del libro. Ej.: es-ES" title="xx-XX (idioma y país), Ej.: es-ES" required>
                    </div>

                </div>

                <div class="row">
                    <div class="col">
                        <label for="genero">Género</label>
                        <select class="form-control" name="genero" id="genero" required>
                            <option class="text-secondary" value="" disabled selected>Selecciona un género de la lista</option>
                            <option value="Policial">Policial</option>
                            <option value="Romántica">Romántica</option>
                            <option value="Aventura">Aventura</option>
                            <option value="Terror">Terror</option>
                            <option value="Ficción">Ficción</option>
                            <option value="Ciencia">Ciencia</option>
                            <option value="Biográfica">Biográfica</option>
                            <option value="Infantil">Infantil</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="fecha">Fecha de publicación:</label>
                        <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Introduce la fecha de publicación del libro" required>
                    </div>

                </div>



                <!-- AUTORES -->

                <div class="row">
                    <div class="col-md-12 mt-3" id="autores">
                        <h3>Autor o autores:</h3>
                    </div>
                </div>

                <div class="row input-group control-group after-add-more-autores">
                    <div class="col">
                        <label for="autorNombre">Nombre:</label>
                        <input type="text" id="autorNombre" name="autorNombre[]" class="form-control" placeholder="Introduce el nombre" maxlength="80" required>
                    </div>
                    <div class="col">
                        <label for="autorCodigo">Código:</label>
                        <input type="text" id="autorCodigo" name="autorCodigo[]" class="form-control" placeholder="Introduce el código" pattern="[0-9]{6}" title="Un código numérico de 6 cifras" maxlength="6" minlength="6"  required>
                    </div>
                    <div class="col">
                        <label for="autorNacionalidad">Nacionalidad:</label>
                        <input type="text" id="autorNacionalidad" name="autorNacionalidad[]" class="form-control" placeholder="Introduce la nacionalidad" maxlength="80" required>
                    </div>
                    <div class="input-group-btn">
                        <label>&nbsp;</label>
                        <button class="btn btn-success add-more-autores form-control" type="button"><i class="glyphicon glyphicon-plus"></i> +</button>
                    </div>
                </div>




                <div class="row">
                    <div class="col-md-12 mt-3" id="autores">
                        <h3>Reseña:</h3>
                    </div>
                </div>



                <div class="row">
                    <div class="col form-group">
                        <label for="resena">Reseña del libro</label>
                        <textarea class="form-control" name="resena" id="resena" rows="3" placeholder="Introduce la reseña del libro" required></textarea>
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



