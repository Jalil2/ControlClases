



<div class="container">
	<div class = "text-center">
		<h4><br/> Información Personal</h4>
	</div>

	<form action="?controller=maestro&&action=update" method="POST">

		<input type="hidden" name="id" value="<?php echo $maestro->getId() ?>" >
		<input type="hidden" name="Dirfoto" value="<?php echo $maestro->getFoto() ?>" >
	
      	<div class="row">
         	<div class="col-md-4">
            	<div class="card mb-4 shadow-sm">
             		<img class="bd-placeholder-img mx-auto" width="100%" height="225" src="<?php echo $directory . $maestro->getFoto(); ?>">
              		<div class="card-body">
                		<div class="d-flex justify-content-between align-items-center">
                  			<div class="btn">
                    			<button type="button" class="btn btn-sm btn-secondary" disabled>Cambiar</button>
                    				<button type="button" class="btn btn-sm btn-secondary" disabled>Eliminar</button>
								</div>
							</div>
						</div>
                  	</div>
                </div>
            </div>
		<div class ="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="text">Id: </label>
					<input type="text" name="idMaestro" id="idMaestro" class="form-control" value="<?php echo $maestro->getId() ?>" disabled>
				</div>
				<div class="form-group">
					<label for="text">Nombre: </label>
					<input type="text" name="nombres" id="nombres" class="form-control" value="<?php echo $maestro->getNombres() ?>" disabled>
				</div>
				<div class="form-group">
					<label for="text">Apellidos</label>
					<input type="text" name="apellidos" id="apellidos" class="form-control" value="<?php echo $maestro->getApellidos(); ?>" disabled>
				</div>
				<div class="check-box">
					<label>Activo <input type="radio" name="estado" <?php echo $maestro->getEstado() ?> disabled></label>
				</div>
			</div>
		</div>
		<div class ="row justify-content-center">
			<div class="col-md-6">
				<button type="submit" class="btn btn-primary" disabled>Actualizar</button>
			<div class="col-md-6">
		</div>

      <?php  $dirint->close(); ?>

  	</div>

	</form>
</div>
	