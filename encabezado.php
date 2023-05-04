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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
	<script src="select2/select2.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg" style="background-color: #62e758; padding: 3rem 1rem;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="logo2.png" height="90px" width="180px;" /></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" href="catering/sis/principal.php" style="font-size: 15px;"><i class="fas fa-home"></i> Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 15px;">
            Empresa
          </a>
          <ul class="dropdown-menu">
                <a class="dropdown-item" href="catering/sis/listarEmpresas.php">Administrar</a>
                <a class="dropdown-item" href="catering/sis/nuevoEmpresa.php">Nuevo</a>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 15px;">
            Clientes
          </a>
          <ul class="dropdown-menu">
                <a class="dropdown-item" href="catering/sis/listarClientes.php">Administrar</a>
                <a class="dropdown-item" href="catering/sis/nuevoCliente.php">Nuevo</a>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 15px;">
            Servicios
          </a>
          <ul class="dropdown-menu">
                <a class="dropdown-item" href="catering/sis/desayunos.php">Desayuno</a>
                <a class="dropdown-item" href="catering/sis/almuerzos.php">Almuerzo</a>
                <a class="dropdown-item" href="catering/sis/meriendas.php">Merienda</a>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 15px;">
            Cafetería
          </a>
          <ul class="dropdown-menu">
                <a class="dropdown-item" href="listar.php">Productos</a>
                <a class="dropdown-item" href="listarClientes.php">Clientes</a>
                <a class="dropdown-item" href="vender.php">Vender</a>
                <a class="dropdown-item" href="ventas.php">Ventas</a>
                <a class="dropdown-item" href="reportes.php">Reportes Excel</a>
                <a class="dropdown-item" href="reporteVentas.php">Reportes PDF</a>
          </ul>
        </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 15px;">
            Reportes
          </a>
          <ul class="dropdown-menu">
            <a class="dropdown-item" href="catering/sis/consumos.php">Reporte Diario</a>   
          </ul>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="catering/sis/salir.php" style="font-size: 15px;"><i class="fas fa-home"></i> Salir <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
	<div class="container">
		<div class="row">