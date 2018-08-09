
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

$parser = new parser();

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
                <h1 class="mb-0">Listado completo de los DISCOS almacenados. </h1>
            </div>
        </div>
        <div class="panel-body">
            <div class="container">
                <a class="btn btn-primary float-right" href="add-disco.php" role="button">Añadir un nuevo DISCO</a>

                <div class="listado-discos">
                    <?php $parser -> imprimeDiscos();?>
                </div>
                <p>
                    <br /><hr /><br />
                    <a class="btn btn-secondary" href="index.php" role="button">Volver a la página principal</a>
                </p>
            </div>
        </div>
    </div>


    <?php

    require_once ("phpincludes/footer.php");
    ?>

  </body>

</html>
