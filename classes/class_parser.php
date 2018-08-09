<?php
/**
 * Created by PhpStorm.
 * User: iker
 * Date: 25/04/2018
 * Time: 18:25
 */

class parser
{

	//Campos
	public $parser;
	public $data;

	//variables globales
	public $elementoActual; //almacenamos el elemento que estamos recorriendo: disco, libro o pelicula
	public $datosDeAtributos; //recogemos los datos contenidos en atributos
	public $datosDeAtributosAnterior; //recogemos los datos contenidos de los atributos en la primera vuelta por la función DATA de XML
	public $idNodo; //almacenamos el identificador del nodo disco, libro o pelicula
	public $idNodoCancion; //almacenamos el ID de la cancion


	/**
	 * parser constructor.
	 * @param $tipoDeMedio
	 * @throws Exception
	 */
	public function __construct(){

		$this -> parser = xml_parser_create();

		//Habilitamos el uso de un intérprete XML Parser dentro de un objeto
		xml_set_object($this -> parser, $this);

		//Deshabilitamos la opción de poner en mayúsculas
		xml_parser_set_option($this -> parser, XML_OPTION_CASE_FOLDING, false);

		//Activamos la eliminación de espacios blancos
		xml_parser_set_option($this -> parser,XML_OPTION_SKIP_WHITE,1);

	}


	//Funciones para discos

	/**
	 * @param $parser
	 * @param $elemento
	 * @param $atributos
	 */
	public function discosStartXML($parser, $elemento, $atributos){

		//Actualizamos el elemento general
		switch ($elemento) {
			case "discos":
			case "libros":
			case "peliculas":
				$this->elementoActual = $elemento;
				break;
		}

		$this -> datosDeAtributos = "";

		if ($this -> elementoActual == "discos") {

			switch ($elemento) {
				case "disco";
					$this->idNodo = $atributos["id"];
					break;
				case "productores":
					echo "<h3>" . ucfirst($elemento) . ":</h3><ul>";
					break;
				case "compositores":
					echo "<h4>" . ucfirst($elemento) . ":</h4><ul>";
					break;
				case "interpretes";
					echo "<h4>" . ucfirst($elemento) . ":</h4><ul>";
					break;
				case "productor":
				case "compositor":
				case "interprete":
					$this->datosDeAtributos = "Código: " . $atributos["codigo"] . " - Nacionalidad: " . $atributos["nacionalidad"] . " - Nombre: ";
					echo "<li>";
					break;
				case "nombre"://titulo del disco
					$this->datosDeAtributos = "#" . $this->idNodo . " - ";
					echo "<h2>";
					break;
				case "editor":
					echo "<h3>" . ucfirst($elemento) . ":</h3><p>";
					break;
				case "anio":
					echo "<h3>Año de publicación:</h3><p>";
					break;
				case "titulo":
					$this->datosDeAtributos = "#" . $this->idNodoCancion . " - ";
					echo "<h3>";
					break;
				case "duracion":
					echo "<h4>" . ucfirst($elemento) . ":</h4><p>";
					break;
				case "canciones":
					echo "<h3>" . ucfirst($elemento) . ":</h3><ul class='canciones'>";
					break;
				case "cancion":
					$this->idNodoCancion = $atributos["id"];
					echo "<li>";
					break;
			}
		}

	}


	public function discosStopXML($parser, $elemento){

		if ($this -> elementoActual == "discos") {
			switch ($elemento) {
				case "productores";
					echo "</ul>";
					break;
				case "productor";
					echo "</li>";
					break;
				case "compositores";
					echo "</ul>";
					break;
				case "compositor";
					echo "</li>";
					break;
				case "interpretes";
					echo "</ul>";
					break;
				case "interprete";
					echo "</li>";
					break;
				case "editor";
					echo "</p>";
					break;
				case "nombre";
					echo "</h2>";
					break;
				case "titulo";
					echo "</h3>";
					break;
				case "duracion";
				case "anio";
					echo "</p>";
					break;
				case "canciones";
					echo "</ul>";
					break;
				case "cancion";
					echo "</li>";
					break;
			}
		}

	}

	public function discosDataXML($parser, $data){
		$data = trim($data);
		if ($this -> elementoActual == "discos" && $data != "" ) {
			if ($this -> datosDeAtributosAnterior != $this -> datosDeAtributos)
				echo $this -> datosDeAtributos . $data;
			else
				echo $data;
		}

		$this -> datosDeAtributosAnterior = $this -> datosDeAtributos;
	}


	//Funciones para los libros

	/**
	 * @param $parser
	 * @param $elemento
	 * @param $atributos
	 */
	public function librosStartXML($parser, $elemento, $atributos){

		//Actualizamos el elemento general
		switch ($elemento) {
			case "discos":
			case "libros":
			case "peliculas":
				$this->elementoActual = $elemento;
				break;
		}

		$this -> datosDeAtributos = "";

		if ($this -> elementoActual == "libros") {


			switch ($elemento) {
				case "titulo":
					$this->datosDeAtributos = "#" . $this->idNodo . " - ";
					echo "<h2>";
					break;
				case "libro";
					$this->idNodo = $atributos["id"];
					break;
				case "autores":
					echo "<h3>" . ucfirst($elemento) . ":</h3><ul>";
					break;
				case "autor":
					$this->datosDeAtributos = "Código: " . $atributos["codigo"] . " - Nacionalidad: " . $atributos["nacionalidad"] . " - Nombre: ";
					echo "<li>";
					break;
				case "lengua":
				case "genero":
				case "fecha":
				case "resena":
					echo "<h3>" . ucfirst($elemento) . ":</h3><p>";
					break;
			}
		}

	}


	public function librosStopXML($parser, $elemento){

		if ($this -> elementoActual == "libros") {
			switch ($elemento) {
				case "titulo":
					echo "</h2>";
					break;
				case "autores";
					echo "</ul>";
					break;
				case "autor":
					echo "</li>";
					break;
				case "lengua":
				case "genero":
				case "fecha":
				case "resena":
					echo "</p>";
					break;
			}
		}

	}

	public function librosDataXML($parser, $data){
		$data = trim($data);
		if ($this -> elementoActual == "libros" && $data != "" ) {
			if ($this -> datosDeAtributosAnterior != $this -> datosDeAtributos)
				echo $this -> datosDeAtributos . $data;
			else
				echo $data;
		}

		$this -> datosDeAtributosAnterior = $this -> datosDeAtributos;
	}


	//Funciones para las películas

	/**
	 * @param $parser
	 * @param $elemento
	 * @param $atributos
	 */
	public function peliculasStartXML($parser, $elemento, $atributos){

		//Actualizamos el elemento general
		switch ($elemento) {
			case "discos":
			case "libros":
			case "peliculas":
				$this->elementoActual = $elemento;
				break;
		}

		$this -> datosDeAtributos = "";

		if ($this -> elementoActual == "peliculas") {

			switch ($elemento) {
				case "titulo":
					$this->datosDeAtributos = "#" . $this->idNodo . " - ";
					echo "<h2>";
					break;
				case "pelicula";
					$this->idNodo = $atributos["id"];
					break;
				case "directores":
				case "productores":
				case "actores":
					echo "<h3>" . ucfirst($elemento) . ":</h3><ul>";
					break;
				case "director":
				case "productor":
				case "actor":
					$this->datosDeAtributos = "Código: " . $atributos["codigo"] . " - Nacionalidad: " . $atributos["nacionalidad"] . " - Nombre: ";
					echo "<li>";
					break;
				case "duracion":
				case "anio_estreno":
					echo "<h3>" . ucfirst($elemento) . ":</h3><p>";
					break;
			}
		}

	}


	public function peliculasStopXML($parser, $elemento){

		if ($this -> elementoActual == "peliculas") {
			switch ($elemento) {
				case "titulo":
					echo "</h2>";
					break;
				case "directores";
				case "productores";
				case "actores";
					echo "</ul>";
					break;
				case "director":
				case "productor":
				case "actor":
					echo "</li>";
					break;
				case "duracion":
				case "anio_estreno":
					echo "</p>";
					break;
			}
		}

	}

	public function peliculasDataXML($parser, $data){
		$data = trim($data);
		if ($this -> elementoActual == "peliculas" && $data != "" ) {
			if ($this -> datosDeAtributosAnterior != $this -> datosDeAtributos)
				echo $this -> datosDeAtributos . $data;
			else
				echo $data;
		}

		$this -> datosDeAtributosAnterior = $this -> datosDeAtributos;
	}



	public function imprimeDiscos()
	{
		//inicializamos el elemento actual que queremos recorrer
		$this -> elementoActual = "discos";

		//Especificamos el handler de elementos
		xml_set_element_handler($this -> parser,  "discosStartXML","discosStopXML" );

		//Especificamos el handler de datos
		xml_set_character_data_handler($this -> parser, "discosDataXML");

		$fp = fopen("biblioteca.xml", "r");
		while (($this ->data = fread($fp, 4096))) {

			if (!xml_parse($this -> parser, $this -> data, feof($fp))) {

			xml_parse($this -> parser, $this -> data, feof($fp)) or
				sprintf('XML error at line %d column %d',
				xml_get_current_line_number($this->parser),
				xml_get_current_column_number($this->parser));
			}

		}
	}

	public function imprimeLibros()
	{
		//inicializamos el elemento actual que queremos recorrer
		$this -> elementoActual = "libros";

		//Especificamos el handler de elementos
		xml_set_element_handler($this -> parser,  "librosStartXML","librosStopXML" );

		//Especificamos el handler de datos
		xml_set_character_data_handler($this -> parser, "librosDataXML");

		$fp = fopen("biblioteca.xml", "r");
		while (($this ->data = fread($fp, 4096))) {

			if (!xml_parse($this -> parser, $this -> data, feof($fp))) {

				xml_parse($this -> parser, $this -> data, feof($fp)) or
				sprintf('XML error at line %d column %d',
					xml_get_current_line_number($this->parser),
					xml_get_current_column_number($this->parser));
			}

		}
	}

	public function imprimePeliculas()
	{
		//inicializamos el elemento actual que queremos recorrer
		$this -> elementoActual = "peliculas";

		//Especificamos el handler de elementos
		xml_set_element_handler($this -> parser,  "peliculasStartXML","peliculasStopXML" );

		//Especificamos el handler de datos
		xml_set_character_data_handler($this -> parser, "peliculasDataXML");

		$fp = fopen("biblioteca.xml", "r");
		while (($this ->data = fread($fp, 4096))) {

			if (!xml_parse($this -> parser, $this -> data, feof($fp))) {

				xml_parse($this -> parser, $this -> data, feof($fp)) or
				sprintf('XML error at line %d column %d',
					xml_get_current_line_number($this->parser),
					xml_get_current_column_number($this->parser));
			}

		}
	}

	//Destructor de instancia
	public function __destruct() {
		xml_parser_free($this -> parser);
	}

}