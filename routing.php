<?php 

$controllers=array(
	'principal'=>['index','error'],
	'login'=>['login','search','logout','error'],
	'alumno'=>['index','cuenta','update','save','show','search','error'],
	'maestro'=>['index', 'cuenta','register','save','show', 'showAlumnos_Maestro','searchAlumnoId','registerAlumno','saveAlumno','updateshow','updateAlumno','update','delete','deleteAlumno','search','logout','error'],
);

if (array_key_exists($controller,  $controllers)) {
	if (in_array($action, $controllers[$controller])) {
		call($controller, $action);
	}
	else{
		call('principal','error');
	}		
}else{
	call('principal','error');
}

function call($controller, $action){
	require_once('controllers/'.$controller.'Controller.php');

	switch ($controller) {
		case 'principal':
		require_once('model/principal.php');
		$controller= new UsuarioController();
		break;

		case 'login':
		require_once('model/login.php');
		$controller= new UsuarioController();
		break;

		case 'alumno':
		require_once('model/alumno.php');
		$controller= new UsuarioController();
		break;

		case 'maestro':
		require_once('model/maestro.php');
		$controller= new UsuarioController();
		break;
		
		default:
				# code...
		break;
	}

	if($action == 'login'){
		$controller->{$action}(false);
	}else{
		$controller->{$action}();
	}
		
}

?>