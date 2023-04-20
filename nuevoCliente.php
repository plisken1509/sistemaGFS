<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["cedula"]) || !isset($_POST["nombre"]) || !isset($_POST["correo"]) || !isset($_POST["password"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$cedula = $_POST["cedula"];
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$password = $_POST["password"];

$sentencia = $base_de_datos->prepare("INSERT INTO clientes(cedula, nombre, correo, password) VALUES (?, ?, ?, ?);");
$resultado = $sentencia->execute([$cedula, $nombre, $correo, $password]);

if($resultado === TRUE){
	header("Location: ./listarClientes.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>