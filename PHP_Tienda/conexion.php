<?php

function crearConexion()
{
	// Cambiar en el caso en que se monte la base de datos en otro lugar
	$host = "localhost";
	$user = "root";
	$pass = "";
	$baseDatos = "pac3_daw";

	// Completar...

	$result = mysqli_connect($host, $user, $pass, $baseDatos);

	return $result;
}


function cerrarConexion($conexion)
{
	// Completar...
	mysqli_close($conexion);
}


?>