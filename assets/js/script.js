<script type="text/javascript">

	function Confirm() 
	{
		//Ingresamos un mensaje a mostrar
		var mensaje = confirm("Confirmar Eliminaci�n");
		//Detectamos si el usuario acepto el mensaje
		if (!mensaje) {
		return false;
		}
		//Detectamos si el usuario deneg� el mensaje
    	else{ return true;}
	}
</script>