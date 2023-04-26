<?php
/*
	Pequeño, muy pequeño sistema de ventas en PHP con MySQL

	@author parzibyte

	No olvides visitar parzibyte.me/blog para más cosas como esta
*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ventas</title>
	
	<link rel="stylesheet" href="./css/fontawesome-all.min.css">
	<link rel="stylesheet" href="./css/2.css">
	<link rel="stylesheet" href="./css/estilo.css">

	<link rel="stylesheet" type="text/css" href="select2/select2.min.css">
	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
	<script src="select2/select2.min.js"></script>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
    <script src="bootstrap/js/jquery-3.6.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	
	<nav class="navbar navbar-expand-lg navbar-light "style="background-color: #62e758;" >
      
      <a class="navbar-brand"><img src="logo2.png" height="90px" width="180px;" /></a>
         <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div id="my-nav" class="collapse navbar-collapse">
             <ul class="navbar-nav mr-auto">
                 <li class="nav-item active">
                     <a class="nav-link" href="catering/sis/principal.php"><i class="fas fa-home"></i> Inicio <span class="sr-only">(current)</span></a>
                 </li>
                 <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                       <i class="fas fa-school"></i> Empresa
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="catering/sis/listarEmpresas.php">Administrar</a>
                        <a class="dropdown-item" href="catering/sis/nuevoEmpresa.php">Nuevo</a>
                    </div>
                    </li>
                    <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                       <i class="fas fa-school"></i> Clientes
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="catering/sis/listarClientes.php">Administrar</a>
                        <a class="dropdown-item" href="catering/sis/nuevoCliente.php">Nuevo</a>
                        
                        
                    </div>
                    </li>
                 <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                       <i class="fas fa-school"></i> Servicios
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="catering/sis/desayunos.php">Desayuno</a>
                        <a class="dropdown-item" href="catering/sis/almuerzos.php">Almuerzo</a>
                        <a class="dropdown-item" href="catering/sis/meriendas.php">Merienda</a>
                        
                    </div>
                    </li>
                    <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                       <i class="fas fa-school"></i> Cafeteria
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="listar.php">Productos</a>
                        <a class="dropdown-item" href="listarClientes.php">Clientes</a>
                        <a class="dropdown-item" href="vender.php">Vender</a>
                        <a class="dropdown-item" href="ventas.php">Ventas</a>
                        <a class="dropdown-item" href="reportes.php">Reportes Excel</a>
                        <a class="dropdown-item" href="reporteVentas.php">Reportes PDF</a>
                        
                    </div>
                    </li>
                    <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                       <i class="fas fa-address-book"></i> Reportes
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="catering/sis/consumos.php">Reporte Diario</a>    
                    </div>
                    </li>
                    <li class="nav-item active">
                     <a class="nav-link" href="catering/sis/salir.php"><i class="fas fa-home"></i> Salir <span class="sr-only">(current)</span></a>
                 </li>
                   
             </ul>
         </div>
</nav>
	<div class="container">
		<div class="row">