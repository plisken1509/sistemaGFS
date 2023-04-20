<?php
    include("conexion.php");
    $id=$_GET['id'];
    $queryC="delete from clientes where id=$id";
    $enviarC=mysqli_query($db,$queryC);	
    header('location:listarClientes.php');
?>