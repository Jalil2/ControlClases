<?php 
require_once('model/connection.php'); //Realiza la conexión a la base de datos


	if (isset($_GET['controller'])&&isset($_GET['action'])) {
		$controller=$_GET['controller'];
		$action=$_GET['action'];
	}else{
		$controller='principal';
		$action='index';
	}

	require_once('views/layouts/layout.php');	
 ?>