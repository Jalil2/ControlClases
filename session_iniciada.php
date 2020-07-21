<?php

    session_start(); /*Iniciamos sesión*/
    
    if(!isset($_SESSION["Usuario"])){/* Revisa si el usuario esta activo*/
        
      header("location:index.php?controller=login&action=login"); /*Redireccciona a index.php (Login), si el usuario no se encuentra activo.*/
         
    }

?>