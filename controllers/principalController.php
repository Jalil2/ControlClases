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
		require_once('views/principal/bienvenido.php');
	}

	function error(){
		require_once('views/principal/error.php');
	}

	
}

?>