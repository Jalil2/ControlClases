<?php 
/**
* 
*/
class user
{
	private $id;
	private $usuario;
	private $pass;
	private $perfil;

	function __construct($id,$usuario, $pass, $perfil)
	{
		$this->setId($id);
		$this->setUsuario($usuario);
		$this->setPass($pass);
		$this->setPerfil($perfil);
		
	}

	public function getId(){
		return $this->Id;
	}

	public function setId($id){
		$this->Id = $id;
	}

	public function getUsuario(){
		return $this->Usuario;
	}

	public function setUsuario($usuario){
		$this->Usuario = $usuario;
	}

	public function getPass(){
		return $this->Pass;
	}

	public function setPass($pass){
		$this->Pass = $pass;
	}

	public function getPerfil(){
		return $this->Perfil;
	}

	public function setPerfil($perfil){
		$this->Perfil = $perfil;
	}

	
	public static function searchByUser($usuario,$contra){

		$db=Db::getConnect();

        $sql="SELECT * FROM perfil_usuarios WHERE Usuario= :usuario and Pass= :contra"; /*consulta la tabla login y el resultado lo guarda en la variable $sql*/ 
        
        $resultado=$db->prepare($sql);

        $resultado->bindValue(":usuario", $usuario); /*bindValue vincula un valor a un par�metro*/
        $resultado->bindValue(":contra", $contra);
		$resultado->execute();

		$usuarioDb=$resultado->fetch();

		$result= new user ($usuarioDb['Id'],$usuarioDb['Usuario'], $usuarioDb['Pass'], $usuarioDb['Perfil']);

		$resultado->closeCursor();
		
		return $result;


	}


}

?>