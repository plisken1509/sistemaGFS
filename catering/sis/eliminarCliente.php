<?php
    include("conexion.php");
    $id=$_GET[''];
    $queryC="delete from clientes where id=$id";
    $enviarC=mysqli_query($db,$queryC);	
    header('location:listarClientes.php');
?>