<?php 
/**
* 
*/
class Alumno
{
	private $id;
	private $usuario;
	private $pass;
	private $perfil;
	private $nombres;
	private $apellidos;
	private $estado;
	private $maestro;
	private $foto;
	

	
	function __construct($id, $usuario, $pass, $perfil, $nombres, $apellidos, $estado, $maestro, $foto)
	{
		$this->setId($id);
		$this->setUsuario($usuario);
		$this->setPass($pass);
		$this->setPerfil($perfil);
		$this->setNombres($nombres);
		$this->setApellidos($apellidos);
		$this->setEstado($estado);
		$this->setMaestro($maestro);
		$this->setFoto($foto);	
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	public function getUsuario(){
		return $this->usuario;
	}

	public function setPass($pass){
		$this->pass = $pass;
	}

	public function getPass(){
		return $this->pass;
	}

	public function setPerfil($perfil){
		$this->perfil = $perfil;
	}

	public function getPerfil(){
		return $this->perfil;
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

	public function getMaestro(){
		return $this->maestro;
	}

	public function setMaestro($maestro){
		$this->maestro = $maestro;
	}

	public function getEstado(){

		return $this->estado;
	}

	public function setEstado($estado){
		
		if (strcmp($estado, 'of')==0) {
			$this->estado='0';
		} elseif(strcmp($estado, '1')==0) {
			$this->estado='1';
		} elseif(strcmp($estado, 'on')==0) {
			$this->estado='1';
		}elseif (strcmp($estado, '0')==0) {
			$this->estado='0';
		}else {
			$this->estado='0';
		}

	}

	public function setFoto($foto){
		$this->Dirfoto = $foto;
	}

	public function getFoto(){

		return $this->Dirfoto;
	}

	public static function save($alumno){
		$db=Db::getConnect();
		//var_dump($alumno);
		//die();
		

		$insert=$db->prepare('INSERT INTO alumno VALUES (NULL, :Usuario, :Pass, :Perfil, :nombres,:apellidos,:estado, :Maestro, :Dirfoto)');
		$insert->bindValue('Usuario',$alumno->getUsuario());
		$insert->bindValue('Pass',$alumno->getPass());
		$insert->bindValue('Perfil',$alumno->getPerfil());
		$insert->bindValue('nombres',$alumno->getNombres());
		$insert->bindValue('apellidos',$alumno->getApellidos());
		$insert->bindValue('estado',$alumno->getEstado());
		$insert->bindValue('Maestro',$alumno->getMaestro());
		$insert->bindValue('Dirfoto',$alumno->getFoto());
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
		$listaAlumnos=[];

		$select=$db->query('SELECT * FROM alumno order by id');

		foreach($select->fetchAll() as $alumno){
			$listaAlumnos[]=new Alumno($alumno['id'],$alumno['Usuario'], $alumno['Pass'], $alumno['Perfil'], $alumno['nombres'],$alumno['apellidos'],$alumno['estado'], $alumno['Maestro'],$alumno['Dirfoto']);
		}
		return $listaAlumnos;
	}


	public static function allAlumnosMaestro($maestro){
		$db=Db::getConnect();
		$listaAlumnos=[];

		$select=$db->query("SELECT * FROM alumno WHERE Maestro = $maestro order by id");

		foreach($select->fetchAll() as $alumno){
			$listaAlumnos[] = new Alumno($alumno['id'],$alumno['Usuario'], $alumno['Pass'], $alumno['Perfil'], $alumno['nombres'],$alumno['apellidos'],$alumno['estado'], $alumno['Maestro'],$alumno['Dirfoto']);
		}
		return $listaAlumnos;
	}



	public static function searchByIdAlumno($id,$maestro){
		$db=Db::getConnect();

		$sql="SELECT * FROM alumno WHERE id=:id AND Maestro = :maestro";
		$select=$db->prepare($sql);
		$select->bindValue(":id",$id);
		$select->bindValue(":maestro",$maestro);
		$select->execute();

		$alumnoDb=$select->fetch();

		$alumno = new Alumno($alumnoDb['id'],$alumnoDb['Usuario'], $alumnoDb['Pass'], $alumnoDb['Perfil'], $alumnoDb['nombres'],$alumnoDb['apellidos'],$alumnoDb['estado'], $alumnoDb['Maestro'],$alumnoDb['Dirfoto']);

		$select->closeCursor();

		return $alumno;

	}

	public static function searchById($id){
		$db=Db::getConnect();

		$sql="SELECT * FROM alumno WHERE id=:id";
		$select=$db->prepare($sql);
		$select->bindValue(":id",$id);
		$select->execute();

		$alumnoDb=$select->fetch();

		$alumno = new Alumno($alumnoDb['id'],$alumnoDb['Usuario'], $alumnoDb['Pass'], $alumnoDb['Perfil'], $alumnoDb['nombres'],$alumnoDb['apellidos'],$alumnoDb['estado'], $alumnoDb['Maestro'],$alumnoDb['Dirfoto']);

		$select->closeCursor();

		return $alumno;

	}

	public static function searchByUser($user){
		$db=Db::getConnect();

		$sql="SELECT * FROM alumno WHERE Usuario=:user";
		$select=$db->prepare($sql);
		$select->bindValue(":user",$user);
		$select->execute();

		$alumnoDb=$select->fetch();

		$alumno = new Alumno($alumnoDb['id'],$alumnoDb['Usuario'], $alumnoDb['Pass'], $alumnoDb['Perfil'], $alumnoDb['nombres'],$alumnoDb['apellidos'],$alumnoDb['estado'], $alumnoDb['Maestro'],$alumnoDb['Dirfoto']);

		$select->closeCursor();

		return $alumno;

	}


	public static function update($alumno){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE alumno SET Usuario=:Usuario, Pass=:Pass, Perfil=:Perfil, nombres=:nombres, apellidos=:apellidos, estado=:estado, Maestro=:Maestro, Dirfoto=:Dirfoto  WHERE id=:id');
		$update->bindValue(':Usuario',$alumno->getUsuario());
		$update->bindValue(':Pass',$alumno->getPass());
		$update->bindValue(':Perfil',$alumno->getPerfil());
		$update->bindValue(':nombres', $alumno->getNombres());
		$update->bindValue(':apellidos',$alumno->getApellidos());
		$update->bindValue(':estado',$alumno->getEstado());
		$update->bindValue(':Maestro',$alumno->getMaestro());
		$update->bindValue(':Dirfoto',$alumno->getFoto());
		$update->bindValue(':id',$alumno->getId());
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

		foreach($select->fetchAll() as $alumno){
			$fotoAlumnos[] = new Alumno($alumno['id'],$alumno['Usuario'], $alumno['Pass'], $alumno['Perfil'], $alumno['nombres'],$alumno['apellidos'],$alumno['estado'], $alumno['Maestro'],$alumno['Dirfoto']);
		}

		return $fotoAlumnos;
	}

}

?>