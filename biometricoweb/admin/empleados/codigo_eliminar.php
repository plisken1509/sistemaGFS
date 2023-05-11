<?php
   $cedula = $_GET["cedula"];

   require("../../conectar.php");

   $query = "DELETE FROM empleados WHERE cedula='$cedula'";

   $result = mysqli_query($connect, $query);
   $query2 = "DELETE FROM marcados WHERE cedula='$cedula'";

   $result2 = mysqli_query($connect, $query2);

   header("location: index.php?eliminar");
function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

