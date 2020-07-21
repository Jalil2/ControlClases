<?php 
/**
* 
*/
class UsuarioController
{
	
	function __construct()
	{
		
	}

	function index(){

		if (!empty($_SESSION["Usuario"])) {
			$usuario=$_SESSION["Usuario"];
			$alumno=Alumno::searchByUser($usuario);
			$listaAlumnos[]=$alumno;
		}

		require_once('views/alumno/viewalumno.php');
	}

	function cuenta(){

		$usuario=$_SESSION["Usuario"];
		$alumno=Alumno::searchByUser($usuario);
		$listaAlumnos[]=$alumno;

		$directory="repository/alumnos/fotos/";
		$dirint = dir($directory);

	
		require_once('views/alumno/cuentaAlumno.php');
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
		$alumno= new Alumno(null, $_POST['nombres'],$_POST['apellidos'],$estado,$nombre_imagen);

		Alumno::save($alumno);

		$this->show();
	}

	function show(){
		$user = $_SESSION["Usuario"];
		$listaAlumnos=Alumno::all();

		require_once('Views/Alumno/show.php');
	}

	function updateshow(){
		$id=$_GET['idAlumno'];
		$alumno=Alumno::searchById($id);
		require_once('views/alumno/updateshow.php');
	}
	

	function update(){ 
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
	}


	function delete(){
		$id=$_GET['id'];
		Alumno::delete($id);
		$this->show();
	}

	function search(){
		if (!empty($_POST['id'])) {
			$id=$_POST['id'];
			$alumno=Alumno::searchById($id);
			$listaAlumnos[]=$alumno;

			require_once('views/alumno/show.php');

		} else {
			$listaAlumnos=Alumno::all();

			require_once('views/alumno/show.php');
		}	
		
	}


	function error(){
		require_once('views/alumno/error.php');
	}

}

?>