<?php 
/**
* 
*/
class UsuarioController
{

	function __construct()
	{
		
	}

	function login($arg){
		$noencontrado = $arg;

		require_once('views/login/login.php');


	}


	function search(){

		
		if (!empty($_POST['usuario']) && !empty($_POST['contra'])) {
			$usuario=htmlentities(addslashes($_POST["usuario"])); /*Recuperamos la informaci�n de login que recibimos del formulario. addslashes � Escapa un string con barras invertidas*/ 
			$contra=htmlentities(addslashes($_POST["contra"])); /*Recuperamos la informaci�n del password que recibimos. htmlentities � Convierte todos los caracteres aplicables a entidades HTML.*/
			$usu=user::searchByUser($usuario,$contra);

			$perfil=$usu->getPerfil();

			//$numero_registro=$usu->rowCount();/*rowcount revisa el numero de regitros en un array*/
        
			if($perfil){ /*Analizamos que la consulta no este vacia*/
				
				session_start();  /*Iniciamos sesion*/
            	$_SESSION["Usuario"]=$usu->getUsuario(); /*Almacenamos en la variable superglobal $_SESSION el dato de login que recibimos del formulario*/
				
				if($perfil == 'Alumno'){

					$noencontrado = false;
					header("location:index.php?controller=alumno&action=index");
				}
				if($perfil == 'Maestro'){
					$noencontrado = false;
            		header("location:index.php?controller=maestro&action=index");
				}

				if($perfil == 'Administrador'){
					$noencontrado = false;
            		header("location:index.php?controller=Admin&action=index");
				}


        	}else{
				$log=new UsuarioController();
				$action = 'login';
				$log->{$action}(true);
				
			}
		}else{
			
			$log=new UsuarioController();
			$action = 'login';
			$log->{$action}(false); }
	}


	function logout() {

		session_start();
		
		session_destroy(); /*Desactiva el usuario actual. Destruye toda la información registrada de una sesión*/
		
		header("location:index.php?controller=login&&action=login&&logout=true");
	
	}
	

	function error(){
		require_once('views/Login/error.php');
	}



}

?>