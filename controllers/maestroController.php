<?php 


class UsuarioController
{
	
	function __construct()
	{
		
	}

	function index(){
		if (!empty($_SESSION["Usuario"])) {
			$usuario=$_SESSION["Usuario"];
			$maestro=Maestro::searchByUser($usuario);
			$listaMaestros[]=$maestro;
		}

		$_SESSION["Id"] = $maestro->getId(); 
		require_once('views/maestro/viewMaestro.php');

	}

	function cuenta(){

		$usuario=$_SESSION["Usuario"];
		$maestro=Maestro::searchByUser($usuario);
		$listaMaestro[]=$maestro;

		$directory="repository/maestros/fotos/";
		$dirint = dir($directory);

	
		require_once('views/maestro/cuentaMaestro.php');
	}


	function save(){

		if(!isset($_FILES["imagen"]["name"])){
			$nombre_imagen="no_photo.gif";
		}else{

			$nombre_imagen=$_FILES["imagen"]["name"];
			$tipo_imagen=$_FILES["imagen"]["type"];
			$tamano_imagen=$_FILES["imagen"]["size"];

			include('model/datosImagen.php');
		}

		if (!isset($_POST['estado'])) {
			$estado="of";
		}else{
			$estado="on";
		}
		$maestro= new Maestro(null, $_POST['nombres'],$_POST['apellidos'],$estado,$nombre_imagen);

		Maestro::save($Maestro);

		$this->show();
	}

	function register(){
		require_once('views/maestro/registerAlumno.php');
	}

	function saveAlumno(){
		$id_maestro = $_SESSION["Id"]; 
		$_POST['perfil'] = 'Alumno';

		if(!isset($_FILES["imagen"]["name"])){
			$nombre_imagen="no_photo.gif";
		}else{

			$nombre_imagen=$_FILES["imagen"]["name"];
			$tipo_imagen=$_FILES["imagen"]["type"];
			$tamano_imagen=$_FILES["imagen"]["size"];

			include('model/datosImagen.php');
		}

		if (isset($_POST['estado'])) {
			$estado="1";
		}else{
			$estado="0";
		}
		
		$alumno= new Alumno(NULL, $_POST['usuario'], $_POST['pass'], $_POST['perfil'], $_POST['nombres'],$_POST['apellidos'],$estado,$id_maestro,$nombre_imagen);

		Alumno::save($alumno);

		$this->showAlumnos_Maestro();
	}

	function show(){
		$user = $_SESSION["Usuario"];
		$listaAlumno=Maestro::all();

		require_once('views/maestro/show.php');
	}

	function showAlumnos_Maestro(){
		$usuario=$_SESSION["Usuario"];
		$id_maestro = $_SESSION["Id"]; 	
		$listaAlumno=Alumno::allAlumnosMaestro($id_maestro);

		require_once('views/maestro/show.php');
	}

	function updateshow(){
		$id=$_GET['idAlumno'];
		$alumno=Alumno::searchById($id);

		$directory="repository/alumnos/fotos/";
		$dirint = dir($directory);

		require_once('views/maestro/updateshow.php');
	}
	

	function update(){
		$maestro = new Maestro($_POST['id'],$_POST['nombres'],$_POST['apellidos'],$_POST['estado'],$_POST['Dirfoto']);
		Maestro::update($maestro);
		$this->perfil();
	}

	
	function updateAlumno(){ 
		$_POST['perfil'] = 'Alumno';


		if(!isset($_FILES["imagen"]["name"])){
			$nombre_imagen="no_photo.gif";
		}else{

			$nombre_imagen=$_FILES["imagen"]["name"];
			$tipo_imagen=$_FILES["imagen"]["type"];
			$tamano_imagen=$_FILES["imagen"]["size"];

			include('model/datosImagen.php');
		}

		if (isset($_POST['estado'])) {
			$estado="1";
		}else{
			$estado="0";
		}
		
		$alumno = new Alumno($_POST['id'],$_POST['usuario'], $_POST['pass'], $_POST['perfil'], $_POST['nombres'], $_POST['apellidos'], $_POST['estado'], $_POST['maestro'], $nombre_imagen);
		
		Alumno::update($alumno);

		$this->showAlumnos_Maestro();
	}


	function delete(){
		$id=$_GET['id'];
		Maestro::delete($id);
		$this->show();
	}

	function deleteAlumno(){
		$id=$_GET['idAlumno'];
		Alumno::delete($id);
		$this->showAlumnos_Maestro();
	}

	function search(){
		if (!empty($_POST['id'])) {
			$id=$_POST['id'];
			$maestro=Maestro::searchById($id);
			$listaMaestro[]=$maestro;

			require_once('views/maestro/show.php');

		} else {
			$listaMaestro=Maestro::all();

			require_once('views/maestro/show.php');
		}	
		
	}

	function searchAlumnoId(){
		if (!empty($_POST['id'])) {
			$id=$_POST['id'];
			$id_maestro = $_SESSION["Id"]; 	
			$alumno=Alumno::searchByIdAlumno($id,$id_maestro);
			$listaAlumno[]=$alumno;

			require_once('views/maestro/show.php');

		} else {
			$listaAlumno=Alumno::all();

			require_once('views/maestro/show.php');
		}	
		
	}




	function error(){
		require_once('views/maestro/error.php');
	}

}

?>