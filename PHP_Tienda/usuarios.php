<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<title>Usuarios</title>
</head>

<body>

	<?php

	include "funciones.php";

	if (!isset($_COOKIE["datos"]) or ($_COOKIE["datos"] != "superadmin")) {
		echo "No tienes permisos para estar aquí";
	} else {

		if (isset($_GET["cambiar"])) {
			cambiarPermisos();
		}
	}

	?>

	<p>Los permisos actualies están a <span>
			<?php echo getPermisos(); ?>
		</span> </p>

	<form action="usuarios.php" action="GET">
		<P><input type="submit" name="cambiar" value="cambiar permisos"> </P>

	</form>

	<?php

	pintaTablaUsuarios();

	?>

	<a href="index.php">Volver al inicio</a>



</body>

</html>