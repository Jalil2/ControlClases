

<div class="container">
	<h2>Lista Alumnos</h2>
	<form class="form-inline" action="?controller=alumno&action=search" method="post">
		<div class="form-group row">
			<div class="col-xs-4">
				<input class="form-control" id="id" name="id" type="text" placeholder="Busqueda por ID">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-xs-4">
				<button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-search"> </span> Buscar</button>
			</div>
		</div>
	</form>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Estado</th>
					<th></th>
				</tr>
				<tbody>
					<?php foreach ($listaAlumnos as $alumno) {?>

					
					<tr>
						<td> <a href="?controller=alumno&&action=updateshow&&idAlumno=<?php  echo $alumno->getId()?>"> <?php echo $alumno->getId(); ?></a> </td>
						<td><?php echo $alumno->getNombres(); ?></td>
						<td><?php echo $alumno->getApellidos(); ?></td>
						<td><?php if ( $alumno->getEstado()=='checked'):?>
							Activo
						<?php  else:?>
							Inactivo
						<?php endif; ?></td>
						<td><a href="?controller=alumno&&action=updateshow&&idAlumno=<?php  echo $alumno->getId()?>"><button type="button" class="btn btn-info">Actualizar</button></a>
					</tr>
					<?php } ?>
				</tbody>

			</thead>
		</table>

	</div>	

</div>

<script type="text/javascript">

	function Confirm() 
	{
		//Ingresamos un mensaje a mostrar
		var mensaje = confirm("Confirmar Eliminación");
		//Detectamos si el usuario acepto el mensaje
		if (!mensaje) {
		return false;
		}
		//Detectamos si el usuario denegó el mensaje
    	else{ return true;}
	}
</script>