<!DOCTYPE html>
<html lang="es">
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
	<meta charset="utf-8">

	

	<title>Control de la clase</title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
	<!-- styles for this template -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/album.css">
	<!-- styles propios-->
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">

	
	<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

	
</head>
<body>
	<header>
		<?php

			switch ($controller) {
				case 'principal':
					require_once('cabecera.php');
					break;
		
				case 'login':
					require_once('cabecera.php');
					break;
		
				case 'alumno':
					require_once("session_iniciada.php");
					require_once('menuAlumno.php');
					break;
			
		
				case 'maestro':
					require_once("session_iniciada.php");
					require_once('menuMaestro.php');
					break;
				
				default:
					require_once('cabecera.php');
					break;
			}


		 ?>
		
	</header>
	<section>
		<?php require_once('routing.php'); ?>
	</section>

	<section>
		<?php require_once('pie.php'); ?>
	</section>

</body>


	<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery-3.3.1.slim.min"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/popper.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>


	<!-- Bootstrap core JS-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <!-- Core theme JS-->
	<script src="assets/js/scripts.js"></script>

</html>