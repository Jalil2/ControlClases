<?php 

/**
* 
*/
class Db
{
	private static $instance=NULL;
	
	function __construct(){}

	public static function  getConnect(){
		if (!isset(self::$instance)) {
			$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
			self::$instance= new PDO('mysql:host=sql106.epizy.com;dbname=epiz_26120430_control','epiz_26120430','FJqgX2aC6Nwjx');

		} 

		return self::$instance;
	}
}

 ?>