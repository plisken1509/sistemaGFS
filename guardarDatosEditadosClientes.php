<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["cedula"]) || 
	!isset($_POST["nombre"]) || 
	!isset($_POST["correo"]) || 
	!isset($_POST["password"]) || 
	!isset($_POST["id"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id = $_POST["id"];
$cedula = $_POST["cedula"];
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$password = $_POST["password"];

$sentencia = $base_de_datos->prepare("UPDATE clientes SET cedula = ?, nombre = ?, correo = ?, password = ? WHERE id = ?;");
$resultado = $sentencia->execute([$cedula, $nombre, $correo, $password, $id]);

if($resultado === TRUE){
	header("Location: ./listarClientes.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>