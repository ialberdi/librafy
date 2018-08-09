<?php
/**
 * Created by PhpStorm.
 * User: iker
 * Date: 28/03/2018
 * Time: 0:45
 */

function loadClasses($clase) {
	include 'classes/class_' . $clase . '.php';
}

spl_autoload_register('loadClasses');

$option = $_POST["option"];

switch ($option) {
	case "addNuevoDisco":

		$numCanciones = $_POST["contCanciones"];


		$nombre = $_POST["nombre"];

		$productores = array("productorNombre" => $_POST["productorNombre"],
							 "productorCodigo" => $_POST["productorCodigo"],
							 "productorNacionalidad" => $_POST["productorNacionalidad"]);

		$editor = array("editorNombre"=>$_POST["editorNombre"],
					    "editorCodigo"=>$_POST["editorCodigo"],
						"editorNacionalidad"=>$_POST["editorNacionalidad"]);
		$anio = $_POST["anio"];

		$canciones = array();
		//$canciones["cancionNombre"] = $_POST["cancionNombre"];
		//$canciones["cancionDuracion"] = $_POST["cancionDuracion"];


		for($i=1; $i<$numCanciones+1; $i++){
			$cancion = array();
			$cancion["cancionNombre"] = $_POST["cancionNombre"][$i-1];


			$cancion["compositorNombre"] = $_POST["compositorNombre_" . $i];
			$cancion["compositorCodigo"] = $_POST["compositorCodigo_" . $i];
			$cancion["compositorNacionalidad"] = $_POST["compositorNacionalidad_" . $i];

			$cancion["cancionDuracion"] = $_POST["cancionDuracion"][$i-1];

			$cancion["interpreteNombre"] = $_POST["interpreteNombre_" . $i];
			$cancion["interpreteCodigo"] = $_POST["interpreteCodigo_" . $i];
			$cancion["interpreteNacionalidad"] = $_POST["interpreteNacionalidad_" . $i];

			$canciones[] = $cancion;
		}


		$listadoMedios = new listadoMedios();
		$listadoMedios->addDisco($nombre, $productores, $editor, $anio, $canciones);

		header("Location: index.php?addok=disco");

		break;
	case "addNuevoLibro":

		$titulo = $_POST["titulo"];

		$autores = array("autorNombre"=>$_POST["autorNombre"],
					   "autorCodigo"=>$_POST["autorCodigo"],
					   "autorNacionalidad"=>$_POST["autorNacionalidad"]);

		$lengua = $_POST["lengua"];
		$genero = $_POST["genero"];
		$fecha = $_POST["fecha"];
		$resena = $_POST["resena"];


		$listadoMedios = new listadoMedios();
		$listadoMedios->addLibro($titulo, $autores, $lengua, $genero, $fecha, $resena);

		//redirigimos al usuario a la página principal
		header("Location: index.php?addok=libro");

		break;
	case "addNuevaPelicula":

		$titulo = $_POST["titulo"];
		$duracion = $_POST["duracion"];
		$anio_estreno = $_POST["anio_estreno"];

		$directores = array("directorNombre"=>$_POST["directorNombre"],
					 	    "directorCodigo"=>$_POST["directorCodigo"],
						    "directorNacionalidad"=>$_POST["directorNacionalidad"]);

		$productores = array("productorNombre"=>$_POST["productorNombre"],
						 	 "productorCodigo"=>$_POST["productorCodigo"],
							 "productorNacionalidad"=>$_POST["productorNacionalidad"]);

		$actores = array("actorNombre"=>$_POST["actorNombre"],
						 "actorCodigo"=>$_POST["actorCodigo"],
						 "actorNacionalidad"=>$_POST["actorNacionalidad"]);
		
		

		$listadoMedios = new listadoMedios();
		$listadoMedios->addPelicula($titulo, $duracion, $anio_estreno, $directores, $productores, $actores);

		//redirigimos al usuario a la página principal
		header("Location: index.php?addok=pelicula");
		break;
	default:
		echo "op incorrecta";
		break;
}



