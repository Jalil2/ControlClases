
<div class="container-fluid">
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    <div class="col-md-4">
    <br/>
    <br/>
      <section>
        <form method="post" action="?controller=login&action=search" role="login">
        <div class="text-center mb-4">
          <img src="assets/img/login-icon-2.png" class="img-responsive" alt="" width="72" height="72"/>
          <h1 class="h3 mb-3 font-weight-normal">Iniciar sesión</h1>
        </div> 
    <?php 
    echo "<div class='text-center'>"; 
		if($noencontrado == true){ 
      echo "<p class = 'text-danger' >La cuenta o contraseña es incorrecta<p>";
    }
    echo "</div>"; 
    ?>
        <div class="form-label-group"> 
          <input type="text" name="usuario" placeholder="usuario" minlength="4" maxlength="30" required class="form-control input-lg"/>
          <label for="usuario"></label>
        </div>
        <div class="form-label-group">  
          <input type="password" name="contra" class="form-control input-lg" id="contra" minlength="4" maxlength="16" placeholder="Password" required="" />
          <label for="password"></label>
        </div>  
          <div class="pwstrength_viewport_progress"></div>
          <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Recordarme
        </label>
  </div>
          <button type="submit" name="enviar" value="LOGIN" class="btn btn-lg btn-primary btn-block">Entrar</button> 
        </form>
      </section>  
      </div>
      <div class="col-md-4"></div>
  </div> 
</div>
</br></br></br></br></br></br></br></br>

