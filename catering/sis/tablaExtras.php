<?php 
	include('conexion.php');
	$fecha1=$_REQUEST['fecha1'];
	$fecha2=$_REQUEST['fecha2'];
    $empresa=$_REQUEST['empresa'];
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
    <script src="bootstrap/js/jquery-3.6.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light "style="background-color: #62e758;" >
      
      <a class="navbar-brand"><img src="../../logo2.png" height="90px" width="180px;" /></a>
         <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div id="my-nav" class="collapse navbar-collapse">
             <ul class="navbar-nav mr-auto">
                 <li class="nav-item active">
                     <a class="nav-link" href="principal.php"><i class="fas fa-home"></i> Inicio <span class="sr-only">(current)</span></a>
                 </li>
                 <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                       <i class="fas fa-school"></i> Empresa
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="listarEmpresas.php">Administrar</a>
                        <a class="dropdown-item" href="nuevoEmpresa.php">Nuevo</a>
                    </div>
                    </li>
                    <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                       <i class="fas fa-school"></i> Clientes
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="listarClientes.php">Administrar</a>
                        <a class="dropdown-item" href="nuevoCliente.php">Nuevo</a>
                        
                        
                    </div>
                    </li>
                 <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                       <i class="fas fa-school"></i> Servicios
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="desayunos.php">Desayuno</a>
                        <a class="dropdown-item" href="almuerzos.php">Almuerzo</a>
                        <a class="dropdown-item" href="meriendas.php">Merienda</a>
                        
                    </div>
                    </li>
                    <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                       <i class="fas fa-school"></i> Cafeteria
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="../../listar.php">Productos</a>
                        <a class="dropdown-item" href="../../listarClientes.php">Clientes</a>
                        <a class="dropdown-item" href="../../vender.php">Vender</a>
                        <a class="dropdown-item" href="../../ventas.php">Ventas</a>
                        <a class="dropdown-item" href="../../reportes.php">Reportes Excel</a>
                        <a class="dropdown-item" href="../../reporteVentas.php">Reportes PDF</a>
                        
                    </div>
                    </li>
                    <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                       <i class="fas fa-address-book"></i> Reportes
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="consumos.php">Reporte Diario</a>
                        <a class="dropdown-item" href="extras.php">Reporte Extras</a>     
                        <a class="dropdown-item" href="consumosGlobales.php">Reporte Global</a> 
                    </div>
                    </li>
                    <li class="nav-item active">
                     <a class="nav-link" href="salir.php"><i class="fas fa-home"></i> Salir <span class="sr-only">(current)</span></a>
                 </li>
                   
             </ul>
         </div>
</nav>

</body>
</html>
<?php
	$query="";
    if ($empresa>0) {
        $query="SELECT cl.cedula cedula,cl.nombre cliente,emp.nombre empresas,c.descripcion as codigo,c.fecha fecha, c.precio as precio  from extras c,clientes cl, empresa emp where c.cliId=cl.id and emp.id=cl.empId and c.fecha BETWEEN '$fecha1' and '$fecha2' and emp.id='$empresa'";
        
    }else{
        $query="SELECT cl.cedula cedula,cl.nombre cliente,emp.nombre empresas,c.descripcion as codigo,c.fecha fecha, c.precio as precio  from extras c,clientes cl, empresa emp where c.cliId=cl.id and emp.id=cl.empId and c.fecha BETWEEN '$fecha1' and '$fecha2'";
    }
    
	
//echo $query;
    $enviar=mysqli_query($db,$query);
    $ver=mysqli_fetch_array($enviar);
    $contar=mysqli_num_rows($enviar);
	echo "<center><h1>Registros de Extras</h1></center>";
	echo "<div class=container><center><table class=table >
        <thead class=thead-dark>
    <tr>
      <th scope=col>Cedula</th>
      <th scope=col>Nombre</th>
      <th scope=col>Empresa</th>
      <th scope=col>Extra</th>
      <th scope=col>Fecha</th>
      <th scope=col>Precio</th>
      
    </tr>
  </thead>";
if($contar>0) {
    do {

        $cedula=$ver['cedula'];
        $cliente=$ver['cliente'];
        $empresas=$ver['empresas'];
        $codigo=$ver['codigo'];
        $fecha=$ver['fecha'];
        $precio=$ver['precio'];

        echo '
		<tbody>
		<tr>
		
		<td>'.$cedula.'</td>
		<td>'.$cliente.'</td>
        <td>'.$empresas.'</td>
        <td>'.$codigo.'</td>
		<td>'.$fecha.'</td>
		<td>'.$precio.'</td>
		
		</tr>

	';
    } while ($ver=mysqli_fetch_array($enviar));
    echo '</tbody></table>
		Total Extras: '.$contar.'<br>
		<a href="exportarExcelExtras.php?fecha1='.$fecha1.'&fecha2='.$fecha2.'&empresa='.$empresa.'" class="btn btn-sm btn-success">Exportar Excel</a></center></div>';
}
?>
