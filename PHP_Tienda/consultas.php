<?php

include "conexion.php";

function tipoUsuario($nombre, $correo)
{
	// Completar...
	$con = crearConexion();

	if (esSuperadmin($nombre, $correo)) {
		return "superadmin";

	} else {

		$sql = "SELECT FullName, Email, Enabled FROM user WHERE FullName = '$nombre' AND Email = '$correo'";
		$result = mysqli_query($con, $sql);
		cerrarConexion($con);

		if ($datos = mysqli_fetch_array($result)) {
			if ($datos["Enabled"] == 0) {
				return "registrado";

			} else if ($datos["Enabled"] == 1) {
				return "autorizado";

			} else {
				return "no registrado";
			}
		}
	}
}


function esSuperadmin($nombre, $correo)
{
	// Completar...
	$con = crearConexion();

	$sql = "SELECT user.UserID FROM user INNER JOIN setup on user.UserID = setup.SuperAdmin 
		WHERE user.FullName = '$nombre' AND user.Email = '$correo'";
	$result = mysqli_query($con, $sql);

	if ($datos = mysqli_fetch_assoc($result)) {
		return true;
	} else {
		return false;
	}

}


function getPermisos()
{
	// Completar...	
	$db = crearConexion();
	$sql = "SELECT Autenticación FROM setup";
	$result = mysqli_fetch_assoc(mysqli_query($db, $sql));

	cerrarConexion($db);

	return $result["Autenticación"];

}


function cambiarPermisos()
{
	// Completar...	
	$db = crearConexion();
	$permisos = getPermisos();

	if ($permisos == 1) {
		$sql = "UPDATE setup SET Autenticación = 0";
	} else {
		$sql = "UPDATE setup SET Autenticación = 1";
	}
	mysqli_query($db, $sql);

	cerrarConexion($db);


}


function getCategorias()
{
	// Completar...	
	$db = crearConexion();
	$sql = "SELECT CategoryID, Name FROM category";
	$result = mysqli_query($db, $sql);

	cerrarConexion($db);

	return $result;
}


function getListaUsuarios()
{
	// Completar...	
	$db = crearConexion();
	$sql = "SELECT FullName, Email, Enabled FROM user";
	$result = mysqli_query($db, $sql);

	cerrarConexion($db);

	return $result;


}


function getProducto($ID)
{
	// Completar...	

	$db = crearConexion();
	$sql = "SELECT * FROM product WHERE productID = $ID";
	$result = mysqli_query($db, $sql);

	cerrarConexion($db);

	return $result;
}


function getProductos($orden)
{
	// Completar...	
	$db = crearConexion();
	$sql = "SELECT product.ProductID, product.Name, product.Cost, product.Price, category.Name as Categoria
	FROM product INNER JOIN category ON category.CategoryID = product.CategoryID ORDER BY $orden";
	$result = mysqli_query($db, $sql);

	cerrarConexion($db);
	return $result;
}


function anadirProducto($nombre, $coste, $precio, $categoria)
{
	// Completar...	
	$db = crearConexion();
	$sql = "INSERT INTO product (Name, Cost, Price, CategoryID) VALUES ('$nombre', $coste, $precio, $categoria)";
	$result = mysqli_query($db, $sql);

	cerrarConexion($db);

	return $result;


}


function borrarProducto($id)
{
	// Completar...	
	$db = crearConexion();
	$sql = "DELETE FROM product WHERE ProductID = $id";
	$result = mysqli_query($db, $sql);

	cerrarConexion($db);

	return $result;
}

 
function editarProducto($id, $nombre, $coste, $precio, $categoria)
{
	// Completar...	
	$db = crearConexion();
	$sql = "UPDATE product set Name = '$nombre', Cost = $coste, Price = $precio, CategoryID = $categoria WHERE ProductID = $id";
	$result = mysqli_query($db, $sql);
	cerrarConexion($db);

	return $result;
}

?>