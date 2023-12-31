<?php

include "consultas.php";


function pintaCategorias($defecto)
{
	// Completar...	
	$categorias = getCategorias();

	while ($fila = mysqli_fetch_assoc($categorias)) {
		if ($fila["CategoryID"] == $defecto) {
			echo "<option value='" . $fila["CategoryID"] . "'selected>" . $fila["Name"] . "</option>";
		} else {
			echo "<option value='" . $fila["CategoryID"] . "'>" . $fila["Name"] . "</option>";
		}
	}
}


function pintaTablaUsuarios()
{
	// Completar...		
	$usuarios = getListaUsuarios();
	if (is_string($usuarios)) {
		echo $usuarios;
	} else {
		echo "
			<table>\n
				<tr>\n
					<th>Nombre</th>\n
					<th>Email</th>\n
					<th>Autorizado</th>\n		   
				</tr>\n";
	}
	while ($fila = mysqli_fetch_assoc($usuarios)) {
		echo " <tr>\n
			  <td>" . $fila["FullName"] . "</td>\n
			  <td>" . $fila["Email"] . "</td>\n";

		if ($fila["Enabled"] == 1) {
			echo "<td class='rojo'>" . $fila["Enabled"] . "</td>\n";
		} else {
			echo "<td>" . $fila["Enabled"] . "</td>\n";
		}
	}
	echo "</table>";
}


function pintaProductos($orden)
{ // Completar...	
	$productos = getProductos($orden);
	echo "<table>\n
				<tr>\n
					<th><a href='articulos.php?orden=ProductID'>ID</
					a></th>\n
					<th><a href='articulos.php?orden=Name'>Nombre</a
					></th>\n
					<th><a href='articulos.php?orden=Cost'>Coste</
					a></th>\n
					<th><a href='articulos.php?orden=Price'>Precio</
					a></th>\n
					<th><a href='articulos.php?orden=categoria'>Categoria</a></th>\n
					<th>Acciones</th>
				</tr>\n";



	while ($fila = mysqli_fetch_assoc($productos)) {
		echo "<tr>\n
			<td>" . $fila["ProductID"] . "</td>\n
			<td>" . $fila["Name"] . "</td>\n
			<td>" . $fila["Cost"] . "</td>\n
			<td>" . $fila["Price"] . "</td>\n
			<td>" . $fila["Categoria"] . "</td>\n";

		if (getPermisos() == 1) {
			echo "<td><a href='formArticulos.php?Editar=" . $fila['ProductID'] . "'>Editar</a>
					- <a href='formArticulos.php?Borrar=" . $fila['ProductID'] . "'>Borrar</a></td>\n
				</tr>\n";
		} else {
			echo "</tr>\n";
		}

	}
	echo "</table>";
}

?>