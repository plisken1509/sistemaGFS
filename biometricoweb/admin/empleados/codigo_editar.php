<?php
if (empty($_POST["nombre"]) or (empty($_POST["apellido"]))) {
   header("location: editar.php?error");
} else {

   $cedula = $_GET["cedula"];
   $nombre = test_input($_POST["nombre"]);
   $apellido = test_input($_POST["apellido"]);
   $codigo = test_input($_POST["codigo"]);

   require("../../conectar.php");

   $query = "UPDATE empleados SET nombre='$nombre', apellido='$apellido', codigo='$codigo' WHERE cedula='$cedula'";

   $result = mysqli_query($connect, $query);

   header("location: index.php?editado");
}


function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
