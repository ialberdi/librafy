<?php
/**
 * Created by PhpStorm.
 * User: iker
 * Date: 26/03/2018
 * Time: 12:07
 */

class listadoMedios
{
    //Campos
	private $xml_file;
	private $xsd_file;
	private $listaMedios;
	private $listaMediosDOM;

    //Constructor
    public function __construct()
    {
        $this->xml_file = "biblioteca.xml";
        $this->xsd_file = "biblioteca.xsd";

        //instanciamos el objeto DOM y cargamos el contenido del fichero XML para su validación
		$xml = new DOMDocument();
		$xml->load($this->xml_file);

		//primero comprbamos si existe el fichero
		if (file_exists($this->xml_file) && file_exists($this->xsd_file)) {

			if (!$xml->schemaValidate($this->xsd_file)){
				throw new Exception("El documento XML no es válido");
			}else{
				//Cargamos el contenido validado en la variable de clase
				$this->listaMediosDOM = $xml;

				//cargamos el contenido XML sobre el objeto SimpleXML para las funciones de lectura
				$this->listaMedios = simplexml_load_file($this->xml_file);
			}

		} else {
			throw new Exception("Error abriendo los ficheros XML");
		}

	}

	//Destructor de instancia
	public function __destruct() {
		unset($this->domDocument);
	}


    //Métodos

    public function getDiscos(){

        return $this->listaMedios->discos->disco;
    }

    public function getLibros(){

        return $this->listaMedios->libros->libro;
    }

    public function getPeliculas(){

        return $this->listaMedios->peliculas->pelicula;
    }

	//Devuelve los tres últimos discos
	public function getUltimosTresDiscos(){

		$discos = $this->getDiscos();

		$numNodos = count($discos);

		if ($numNodos == 0){

			return false;

		}elseif ($numNodos > 3){
			$a_discos_tmp = array();
			$a_discos_tmp[] = $discos[$numNodos-1];
			$a_discos_tmp[] = $discos[$numNodos-2];
			$a_discos_tmp[] = $discos[$numNodos-3];
		}elseif ($numNodos <= 3){

			if ($numNodos == 3){
				$a_discos_tmp = array();
				$a_discos_tmp[] = $discos[2];
				$a_discos_tmp[] = $discos[1];
				$a_discos_tmp[] = $discos[0];
			}elseif ($numNodos == 2){
				$a_discos_tmp = array();
				$a_discos_tmp[] = $discos[1];
				$a_discos_tmp[] = $discos[0];
			}elseif ($numNodos == 1){
				$a_discos_tmp = array();
				$a_discos_tmp[] = $discos[0];
			}

		}

		return $a_discos_tmp;
	}

	//Devuelve los tres últimos libros
	public function getUltimosTresLibros(){

		$libros = $this->getLibros();

		$numNodos = count($libros);

		if ($numNodos == 0){

			return false;

		}elseif ($numNodos > 3){
			$a_libros_tmp = array();
			$a_libros_tmp[] = $libros[$numNodos-1];
			$a_libros_tmp[] = $libros[$numNodos-2];
			$a_libros_tmp[] = $libros[$numNodos-3];
		}elseif ($numNodos <= 3){

			if ($numNodos == 3){
				$a_libros_tmp = array();
				$a_libros_tmp[] = $libros[2];
				$a_libros_tmp[] = $libros[1];
				$a_libros_tmp[] = $libros[0];
			}elseif ($numNodos == 2){
				$a_libros_tmp = array();
				$a_libros_tmp[] = $libros[1];
				$a_libros_tmp[] = $libros[0];
			}elseif ($numNodos == 1){
				$a_libros_tmp = array();
				$a_libros_tmp[] = $libros[0];
			}

		}

		return $a_libros_tmp;
	}

	//Devuelve las tres últimas películas
	public function getUltimasTresPeliculas(){

		$peliculas = $this->getPeliculas();

		$numNodos = count($peliculas);

		if ($numNodos == 0){

			return false;

		}elseif ($numNodos > 3){
			$a_peliculas_tmp = array();
			$a_peliculas_tmp[] = $peliculas[$numNodos-1];
			$a_peliculas_tmp[] = $peliculas[$numNodos-2];
			$a_peliculas_tmp[] = $peliculas[$numNodos-3];
		}elseif ($numNodos <= 3){

			if ($numNodos == 3){
				$a_peliculas_tmp = array();
				$a_peliculas_tmp[] = $peliculas[2];
				$a_peliculas_tmp[] = $peliculas[1];
				$a_peliculas_tmp[] = $peliculas[0];
			}elseif ($numNodos == 2){
				$a_peliculas_tmp = array();
				$a_peliculas_tmp[] = $peliculas[1];
				$a_peliculas_tmp[] = $peliculas[0];
			}elseif ($numNodos == 1){
				$a_peliculas_tmp = array();
				$a_peliculas_tmp[] = $peliculas[0];
			}

		}

		return $a_peliculas_tmp;
	}

    /* Calcula el identificador ID más alto para los discos */
	public function getMayorIDListadoDiscos(){
		$maxId = 0;
		foreach ($this->getDiscos() as $item) {
			$id = (integer)$item["id"][0]; //convertimos el dato al tipo numerico para poder compararlo
			if ($id > $maxId){
				$maxId = $id;
			}
		}
		return $maxId;
	}

	/* Calcula el identificador ID más alto para los libros */
	public function getMayorIDListadoLibros(){
		$maxId = 0;
		foreach ($this->getLibros() as $item) {
			$id = (integer)$item["id"][0]; //convertimos el dato al tipo numerico para poder compararlo
			if ($id > $maxId){
				$maxId = $id;
			}
		}
		return $maxId;
	}

	/* Calcula el identificador ID más alto para las peliculas */
	public function getMayorIDListadoPeliculas(){
		$maxId = 0;
		foreach ($this->getPeliculas() as $item) {
			$id = (integer)$item["id"][0]; //convertimos el dato al tipo numerico para poder compararlo
			if ($id > $maxId){
				$maxId = $id;
			}
		}
		return $maxId;
	}

	public function addDisco($nombre, $productores, $editor, $anio, $canciones){


		$nuevoDisco = $this->listaMediosDOM->createElement("disco");
		$nuevoDisco->setAttribute("id", $this->getMayorIDListadoDiscos()+1);

		$elementoDiscos = $this->listaMediosDOM->getElementsByTagName('discos');
		$elementoDiscos->item(0)->appendChild($nuevoDisco);

		$nuevoDisco->appendChild($this->listaMediosDOM->createElement("nombre", $nombre ));


		$elementoProductores = $this->listaMediosDOM->createElement("productores");
		$nuevoDisco->appendChild($elementoProductores);

		$contadorProductores = 0;
		foreach($productores["productorNombre"] as $productor => $valor) {

			$elementoProductor = $this->listaMediosDOM->createElement("productor", $productores["productorNombre"][$contadorProductores]);
			$elementoProductores->appendChild($elementoProductor);

			$elementoProductor->setAttribute("codigo", $productores["productorCodigo"][$contadorProductores]);
			$elementoProductor->setAttribute("nacionalidad", $productores["productorNacionalidad"][$contadorProductores]);
			$contadorProductores++;
		}


		$elementoEditor = $this->listaMediosDOM->createElement("editor", $editor["editorNombre"] );
		$nuevoDisco->appendChild($elementoEditor);
		$elementoEditor->setAttribute("codigo", $editor["editorCodigo"]);
		$elementoEditor->setAttribute("nacionalidad", $editor["editorNacionalidad"]);

		$nuevoDisco->appendChild($this->listaMediosDOM->createElement("anio", $anio ));



		$elementoCanciones = $this->listaMediosDOM->createElement("canciones");
		$nuevoDisco->appendChild($elementoCanciones);
		$contador = 1;
		foreach($canciones as $cancion => $valor) {
			$elementoCancion = $this->listaMediosDOM->createElement("cancion");
			$elementoCanciones->appendChild($elementoCancion);
			$elementoCancion->setAttribute("id", $contador++);

			$elementoCancion->appendChild($this->listaMediosDOM->createElement("titulo", $valor["cancionNombre"]));


			$elementoCompositores = $this->listaMediosDOM->createElement("compositores");
			$elementoCancion->appendChild($elementoCompositores);
			$contadorCompositor = 0;
			foreach($valor["compositorNombre"] as $compositor => $compositorValor) {
				$elementoCompositor = $this->listaMediosDOM->createElement("compositor", $compositorValor);
				$elementoCompositores->appendChild($elementoCompositor);
				$elementoCompositor->setAttribute("codigo", $valor["compositorCodigo"][$contadorCompositor]);
				$elementoCompositor->setAttribute("nacionalidad", $valor["compositorNacionalidad"][$contadorCompositor]);
				$contadorCompositor++;
			}


			$elementoCancion->appendChild($this->listaMediosDOM->createElement("duracion", $valor["cancionDuracion"]));


			$elementoInterpretes = $this->listaMediosDOM->createElement("interpretes");
			$elementoCancion->appendChild($elementoInterpretes);
			$contadorInterprete = 0;
			foreach($valor["interpreteNombre"] as $interprete => $interpreteValor) {
				$elementoInterprete = $this->listaMediosDOM->createElement("interprete", $interpreteValor);
				$elementoInterpretes->appendChild($elementoInterprete);
				$elementoInterprete->setAttribute("codigo", $valor["interpreteCodigo"][$contadorInterprete]);
				$elementoInterprete->setAttribute("nacionalidad", $valor["interpreteNacionalidad"][$contadorInterprete]);
				$contadorInterprete++;
			}

		}

		$strXml = $this->listaMediosDOM->saveXML();
		$this->listaMediosDOM->formatOutput = true;
		$this->listaMediosDOM->loadXML($strXml);
		$this->listaMediosDOM->saveXML();

		$this->listaMediosDOM->preserveWhiteSpace = false;
		$this->listaMediosDOM->formatOutput = true;
		$this->listaMediosDOM->recover = true;

		$this->listaMediosDOM->formatOutput = true;
		$this->listaMediosDOM->loadXML($strXml);
		$this->listaMediosDOM->saveXML();


		// save the document
		$this->listaMediosDOM->save($this->xml_file);


	}

	public function addLibro($titulo, $autores, $lengua, $genero, $fecha, $resena){

		$nuevoLibro = $this->listaMediosDOM->createElement("libro");
		$nuevoLibro->setAttribute("id", $this->getMayorIDListadoLibros()+1);

		$elementoLibros = $this->listaMediosDOM->getElementsByTagName('libros');
		$elementoLibros->item(0)->appendChild($nuevoLibro);


		$nuevoLibro->appendChild($this->listaMediosDOM->createElement("titulo", $titulo ));

		$elementoAutores = $this->listaMediosDOM->createElement("autores");
		$nuevoLibro->appendChild($elementoAutores);

		$contadorAutores = 0;
		foreach($autores["autorNombre"] as $autor) {

			$elementoAutor = $this->listaMediosDOM->createElement("autor", $autores["autorNombre"][$contadorAutores]);
			$elementoAutores->appendChild($elementoAutor);

			$elementoAutor->setAttribute("codigo", $autores["autorCodigo"][$contadorAutores]);
			$elementoAutor->setAttribute("nacionalidad", $autores["autorNacionalidad"][$contadorAutores]);
			$contadorAutores++;
		}

		$nuevoLibro->appendChild($this->listaMediosDOM->createElement("lengua", $lengua ));
		$nuevoLibro->appendChild($this->listaMediosDOM->createElement("genero", $genero ));
		$nuevoLibro->appendChild($this->listaMediosDOM->createElement("fecha", $fecha ));

		$elementoResena = $nuevoLibro->appendChild($this->listaMediosDOM->createElement("resena"));
		$elementoResena->appendChild(
			$this->listaMediosDOM->createCDATASection($resena)
		);


		//Guardamos el nuevo contenido en el fichero XML
		$strXml = $this->listaMediosDOM->saveXML();
		$this->listaMediosDOM->formatOutput = true;
		$this->listaMediosDOM->loadXML($strXml);
		$this->listaMediosDOM->saveXML();

		$this->listaMediosDOM->preserveWhiteSpace = false;
		$this->listaMediosDOM->formatOutput = true;
		$this->listaMediosDOM->recover = true;

		$this->listaMediosDOM->formatOutput = true;
		$this->listaMediosDOM->loadXML($strXml);
		$this->listaMediosDOM->saveXML();


		// save the document
		$this->listaMediosDOM->save($this->xml_file);
	}

	public function addPelicula($titulo, $duracion, $anio_estreno, $directores, $productores, $actores){

		$nuevaPelicula = $this->listaMediosDOM->createElement("pelicula");
		$nuevaPelicula->setAttribute("id", $this->getMayorIDListadoPeliculas()+1);

		$elementoPeliculas = $this->listaMediosDOM->getElementsByTagName('peliculas');
		$elementoPeliculas->item(0)->appendChild($nuevaPelicula);


		$nuevaPelicula->appendChild($this->listaMediosDOM->createElement("titulo", $titulo ));
		$nuevaPelicula->appendChild($this->listaMediosDOM->createElement("duracion", $duracion ));
		$nuevaPelicula->appendChild($this->listaMediosDOM->createElement("anio_estreno", $anio_estreno ));

		//Directores
		$elementoDirectores = $this->listaMediosDOM->createElement("directores");
		$nuevaPelicula->appendChild($elementoDirectores);

		$contadorDirectores = 0;
		foreach($directores["directorNombre"] as $director) {

			$elementoDirector = $this->listaMediosDOM->createElement("director", $directores["directorNombre"][$contadorDirectores]);
			$elementoDirectores->appendChild($elementoDirector);

			$elementoDirector->setAttribute("codigo", $directores["directorCodigo"][$contadorDirectores]);
			$elementoDirector->setAttribute("nacionalidad", $directores["directorNacionalidad"][$contadorDirectores]);
			$contadorDirectores++;
		}

		//Productores
		$elementoProductores = $this->listaMediosDOM->createElement("productores");
		$nuevaPelicula->appendChild($elementoProductores);

		$contadorProductores = 0;
		foreach($productores["productorNombre"] as $productor) {

			$elementoProductor = $this->listaMediosDOM->createElement("productor", $productores["productorNombre"][$contadorProductores]);
			$elementoProductores->appendChild($elementoProductor);

			$elementoProductor->setAttribute("codigo", $productores["productorCodigo"][$contadorProductores]);
			$elementoProductor->setAttribute("nacionalidad", $productores["productorNacionalidad"][$contadorProductores]);
			$contadorProductores++;
		}

		//Actores
		$elementoActores = $this->listaMediosDOM->createElement("actores");
		$nuevaPelicula->appendChild($elementoActores);

		$contadorActores = 0;
		foreach($actores["actorNombre"] as $actor) {

			$elementoActor = $this->listaMediosDOM->createElement("actor", $actores["actorNombre"][$contadorActores]);
			$elementoActores->appendChild($elementoActor);

			$elementoActor->setAttribute("codigo", $actores["actorCodigo"][$contadorActores]);
			$elementoActor->setAttribute("nacionalidad", $actores["actorNacionalidad"][$contadorActores]);
			$contadorActores++;
		}

		//Guardamos el nuevo contenido en el fichero XML
		$strXml = $this->listaMediosDOM->saveXML();
		$this->listaMediosDOM->formatOutput = true;
		$this->listaMediosDOM->loadXML($strXml);
		$this->listaMediosDOM->saveXML();

		$this->listaMediosDOM->preserveWhiteSpace = false;
		$this->listaMediosDOM->formatOutput = true;
		$this->listaMediosDOM->recover = true;

		$this->listaMediosDOM->formatOutput = true;
		$this->listaMediosDOM->loadXML($strXml);
		$this->listaMediosDOM->saveXML();


		// save the document
		$this->listaMediosDOM->save($this->xml_file);
		
	}

}