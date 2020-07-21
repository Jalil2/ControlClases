<?php 

include 'alumno.php';

class Maestro
{
	private $id;
	private $id_login;
	private $usuario;
	private $pass;
	private $perfil;
	private $nombres;
	private $apellidos;
	private $estado;
	private $foto;
	

	
	function __construct($id, $id_login, $usuario, $pass, $perfil, $nombres, $apellidos, $estado, $foto)
	{
		$this->setId($id);
		$this->setId_login($id_login);
		$this->setUsuario($usuario);
		$this->setPass($pass);
		$this->setPerfil($perfil);
		$this->setNombres($nombres);
		$this->setApellidos($apellidos);
		$this->setEstado($estado);
		$this->setFoto($foto);		
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}


	public function setId_login($id_login){
		$this->id_login = $id_login;
	}

	public function getId_login(){
		return $this->id_login;
	}

	public function setUsuario($usuario){
		$this->Usuario = $usuario;
	}
	public function getUsuario(){
		return $this->Usuario;
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
	public function setNombres($nombres){
		$this->nombres = $nombres;
	}

	public function getNombres(){
		return $this->nombres;
	}

	public function getApellidos(){
		return $this->apellidos;
	}

	public function setApellidos($apellidos){
		$this->apellidos = $apellidos;
	}

	public function getEstado(){

		return $this->estado;
	}

	public function setEstado($estado){
		
		if (strcmp($estado, 'on')==0) {
			$this->estado=1;
		} elseif(strcmp($estado, '1')==0) {
			$this->estado='checked';
		}elseif (strcmp($estado, '0')==0) {
			$this->estado='of';
		}else {
			$this->estado=0;
		}

	}

	public function setFoto($foto){
		$this->foto = $foto;
	}

	public function getFoto(){

		return $this->foto;
	}

	public static function save($maestro){
		$db=Db::getConnect();


		$insert=$db->prepare('INSERT INTO maestro VALUES (NULL, :nombres,:apellidos,:estado, :Dirfoto)');
		$insert->bindValue('nombres',$maestro->getNombres());
		$insert->bindValue('apellidos',$maestro->getApellidos());
		$insert->bindValue('estado',$maestro->getEstado());
		$insert->bindValue('Dirfoto',$maestro->getFoto());
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
		$listaMaestro=[];

		$select=$db->query('SELECT * FROM maestro order by id');

		foreach($select->fetchAll() as $maestro){
			$listaMaestro[]=new Maestro($maestro['id'],$maestro['nombres'],$maestro['apellidos'],$maestro['estado'],$maestro['Dirfoto']);
		}
		return $listaMaestro;
	}

	public static function searchByUser($user){
		$db=Db::getConnect();

		$user_maestro = $user;

		$sql="SELECT * FROM maestro WHERE Usuario=:user";

		$select=$db->prepare($sql);
		$select->bindValue(":user",$user_maestro);
		$select->execute();

		$maestroDb=$select->fetch();

		$maestro = new Maestro ($maestroDb['id'],$maestroDb['id_login'],$maestroDb['Usuario'],$maestroDb['Pass'],$maestroDb['Perfil'],$maestroDb['nombres'], $maestroDb['apellidos'], $maestroDb['estado'],$maestroDb['Dirfoto']);

		return $maestro;

	}

	public static function update($maestro){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE alumno SET nombres=:nombres, apellidos=:apellidos, estado=:estado WHERE id=:id');
		$update->bindValue('nombres', $maestro->getNombres());
		$update->bindValue('apellidos',$maestro->getApellidos());
		$update->bindValue('estado',$maestro->getEstado());
		$update->bindValue('id',$maestro->getId());
		$update->execute();
	}

	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM alumno WHERE id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}


	public static function foto(){
		$db=Db::getConnect();
		$fotoAlumnos=[];

		$select=$db->query('SELECT * FROM alumno order by id');

		foreach($select->fetchAll() as $maestro){
			$fotoAlumnos[]=new Alumno($maestro['id'],$maestro['nombres'],$maestro['apellidos'],$maestro['estado'],$maestro['Dirfoto']);
		}

		return $fotoAlumnos;
	}

}

?>