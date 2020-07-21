

<div class="container">
	<h2>Pefil de: <?php echo $alumno->getNombres(); ?></h2>
	<form action="?controller=maestro&&action=updateAlumno" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $alumno->getId() ?>" >
		<input type="hidden" name="maestro" value="<?php echo $alumno->getMaestro() ?>" >
		<input type="hidden" name="Dirfoto" value="<?php echo $alumno->getFoto() ?>" >

		<div class="row">
        	<div class="col-md-4">
            	<div class="card mb-4 shadow-sm">
             	<img class="bd-placeholder-img mx-auto" width="100%" height="225" src="<?php echo $directory . $alumno->getFoto(); ?>">
                </div>
            </div>
        </div>

		<div class="form-group">
			<label for="imagen">Cambiar foto: <?php $alumno->getFoto(); ?></label>
			<input type="file" class="form-control-file" name="imagen" id="imagen">
    	</div>
		
		<div class="form-group">
			<label for="text">Perfil:</label>
			<input type="text" class="form-control" id="perfil" placeholder="Alumno" name="perfil" value="<?php echo $alumno->getPerfil() ?>" disabled>
		</div>
		
		<div class="form-group">
			<label for="text">Correo:</label>
			<input type="mail" class="form-control" id="usuario" placeholder="Correo" name="usuario" value="<?php echo $alumno->getUsuario() ?>">
		</div>

		<div class="form-group">
			<label for="text">Contraseña:</label>
			<input type="text" class="form-control" id="pass" placeholder="Contraseña" name="pass" value="<?php echo $alumno->getPass() ?>">
		</div>

		<div class="form-group">
			<label for="text">Nombre: </label>
			<input type="text" name="nombres" id="nombres" class="form-control" value="<?php echo $alumno->getNombres() ?>">
		</div>

		<div class="form-group">
			<label for="text">Apellidos</label>
			<input type="text" name="apellidos" id="apellidos" class="form-control" value="<?php echo $alumno->getApellidos(); ?>">
		</div>

		<div class="check-box">
			<label>Activo <input type="checkbox" id='estado' name="estado" value='1' <?php if($alumno->getEstado() == '1'){echo 'checked';} ?>></label>
		</div>

		

		<button type="submit" class="btn btn-primary">Guardar Cambios</button>
		<a href="?controller=maestro&action=showAlumnos_Maestro" id="cancelar" name="cancelar" class="btn btn-secondary">Cancelar</a>

		<?php  $dirint->close(); ?>
		
	</form>

</div>
	