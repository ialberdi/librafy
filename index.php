
<?php
/**
 * Created by PhpStorm.
 * User: iker
 * Date: 05/03/2018
 * Time: 13:35
 */

function loadClasses($clase) {
    include 'classes/class_' . $clase . '.php';
}

spl_autoload_register('loadClasses');

$listadoMedios = new listadoMedios();
$ultimosTresDiscos = $listadoMedios->getUltimosTresDiscos();
$ultimosTresLibros = $listadoMedios->getUltimosTresLibros();
$ultimasTresPeliculas = $listadoMedios->getUltimasTresPeliculas();

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
                <h1 class="mb-0">Tu catálogo online de discos, libros y películas. </h1>
            </div>
        </div>
        <div class="panel-body">
            <div class="container">

                <div class="table-responsive">
                    <table class="table">
                        <caption>Últimos <a href="list-discos.php?e=disco" role="button">discos</a> añadidos:<a class="btn btn-primary float-right" href="add-disco.php" role="button">Añadir un nuevo DISCO</a></caption>
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Año</th>
                            <th scope="col">Nº de canciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
						foreach ($ultimosTresDiscos as $discos => $disco){ ?>
                            <tr>
                                <th scope="row"><?php echo $disco["id"]; ?></th>
                                <td><?php echo $disco->nombre; ?></td>
                                <td><?php echo $disco->anio; ?></td>
                                <td><?php echo count($disco->canciones->cancion); ?></td>
                            </tr>
                            <?php
						}
                        ?>

                        </tbody>
                    </table>
                </div>


                <div class="table-responsive">
                    <table class="table">
                        <caption>Últimos <a href="list-libros.php" role="button">libros</a> añadidos:<a class="btn btn-primary float-right" href="add-libro.php" role="button">Añadir un nuevo LIBRO</a></caption>
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Título</th>
                            <th scope="col">Género</th>
                            <th scope="col">Año publicación</th>
                        </tr>
                        </thead>
                        <tbody>
						<?php
						foreach ($ultimosTresLibros as $libros => $libro){ ?>
                            <tr>
                                <th scope="row"><?php echo $libro["id"]; ?></th>
                                <td><?php echo $libro->titulo; ?></td>
                                <td><?php echo $libro->genero; ?></td>
                                <td><?php echo strftime("%d-%m-%Y",strtotime($libro->fecha)); ?></td>
                            </tr>
							<?php
						}
						?>
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <caption>Últimas <a href="list-peliculas.php" role="button">películas</a> añadidas: <a class="btn btn-primary float-right" href="add-pelicula.php" role="button">Añadir una nueva PELÍCULA</a></caption>
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Título</th>
                            <th scope="col">Duración</th>
                            <th scope="col">Año estreno</th>
                        </tr>
                        </thead>
                        <tbody>
						<?php
						foreach ($ultimasTresPeliculas as $peliculas => $pelicula){ ?>
                            <tr>
                                <th scope="row"><?php echo $pelicula["id"]; ?></th>
                                <td><?php echo $pelicula->titulo; ?></td>
                                <td><?php echo $pelicula->duracion; ?></td>
                                <td><?php echo $pelicula->anio_estreno; ?></td>
                            </tr>
							<?php
						}
						?>
                        </tbody>
                    </table>
                </div>


            </div>


        </div>
    </div>







    <?php

    require_once ("phpincludes/footer.php");
    ?>

  </body>

</html>
