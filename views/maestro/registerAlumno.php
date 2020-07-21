<div class="container">
  <h2>Registro de Alumno</h2>
  <form action="?controller=maestro&&action=saveAlumno" method="POST" enctype="multipart/form-data">

   <div class="form-group">
      <label for="text">Perfil:</label>
      <input type="text" class="form-control" id="perfil" placeholder="Alumno" name="perfil" value="Alumno" disabled>
    </div>
    <div class="form-group">
      <label for="text">Correo:</label>
      <input type="mail" class="form-control" id="usuario" placeholder="Correo" name="usuario">
    </div>

    <div class="form-group">
      <label for="text">Contraseña:</label>
      <input type="text" class="form-control" id="pass" placeholder="Contraseña" name="pass">
    </div>

    <div class="form-group">
      <label for="text">Nombres:</label>
      <input type="text" class="form-control" id="nombres" placeholder="Ingresar nombre de alumno" name="nombres">
    </div>

    <div class="form-group">
      <label for="text">Apellidos:</label>
      <input type="text" name="apellidos" class="form-control" placeholder="Ingresar apellido del Alumno">
    </div>

    <div class="form-group">
      <label for="imagen">Foto</label>
      <input type="file" class="form-control-file" name="imagen" id="imagen">
    </div>

    <div class="check-box">
      <label>Activo <input type="checkbox" name="estado[]" id="estado" value="1">  </label>      
    </div>
    
    <br/>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
</div>