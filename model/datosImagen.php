<?php

/* Recbimos los datos de la imagen*/
    
    if($tamano_imagen<=1000000){/*Limitamos el tamaño del archivo*/
    
        if($tipo_imagen=="image/jpeg" || $tipo_imagen=="image/png" || $tipo_imagen=="image/gif"){
    
    /*Ruta de la carpeta destino en servidor*/ 
    $carpeta_destino=$_SERVER["DOCUMENT_ROOT"] . '/repository/alumnos/fotos/';
    
    /*Movemos la imagen del directorio temporal al directorio escogido*/
    move_uploaded_file($_FILES["imagen"]["tmp_name"],$carpeta_destino.$nombre_imagen);
        }else{echo("<h3>Solo se puede subir imagenes jpg, gif, png</h3>");}
    
    }else{
        
            echo("<h3>El tamaño es demaciado grande</h3>");
        
    }




?>