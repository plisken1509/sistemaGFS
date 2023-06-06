<?php

include("conexion.php");
session_start();
if (isset($_POST['enviar'])) {
    $usuario=$_POST['username'];
    $clave=$_POST['password'];
    $query="select * from empleados where empCedula='$usuario' and empClave='$clave'";
    $enviar=mysqli_query($db,$query);
    $ver=mysqli_num_rows($enviar);
    if($ver>0){
    $_SESSION['usuario']=$usuario;
    $query="select * from empleados where empCedula='$usuario' and empClave='$clave'";
    $enviarC=mysqli_query($db,$query);
    $ver=mysqli_fetch_array($enviarC);
    $_SESSION['nombre']=$ver['empNombre'];
    $_SESSION['cliId']=$ver['empId'];
    $_SESSION['total2']=0;
    header('location:principal.php');
}else{
    echo '<script> alert("Datos Erroneos")</script>';
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>GFS - Reportes</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style6.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
    <script src="bootstrap/js/jquery-3.6.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
            
</head>
<body style="background-image: url(imagenes/fondor.jpg);">
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
                    </div>
                    </li>
                    <li class="nav-item active">
                     <a class="nav-link" href="salir.php"><i class="fas fa-home"></i> Salir <span class="sr-only">(current)</span></a>
                 </li>
                   
             </ul>
         </div>
</nav>
<br>
<div class="container">
    
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <br>
                <h3>Datos Reportes</h3>
                <div class="d-flex justify-content-end social_icon">
                    
                </div>
            </div>
            <div class="card-body">
                <form method="post" name="frmUsuarios" action="tabla.php" target="_BLANK">
                    <label>Fecha Inicio</label><br>
                    <div class="input-group form-group">

                        

                        <input type="date" class="form-control" placeholder="Usuario" name="fecha1" maxlength="30" required>
                        
                    </div>
                    <label>Fecha Fin</label><br>
                    <div class="input-group form-group">
                        
                       
                        <input type="date" class="form-control" placeholder="Password" name="fecha2" maxlength="30" id="password" required>
                    </div>
                    <label>Tipo Consumo</label><br>
                    <div class="input-group form-group">

                        
                        <select class="form-control" name="empleado" name="empleado">
                            <option value="Almuerzo">Almuerzo</option>
                           <option value="Desayuno">Desayuno</option>
                           <option value="Merienda">Merienda</option>
                           <option value="Todos">Todos</option>
                        </select>
                    </div>
                    <label>Empresa</label><br>
                    <div class="input-group form-group">

                        
                        <select class="form-control" name="empresa">
                            <option value="0" selected>Todos</option>
                           <?php
                        $query2="select * from empresa";
                        $enviar2=mysqli_query($db,$query2);
                        $ver2=mysqli_fetch_array($enviar2);
                        do{
                        $id=$ver2['id'];
                        $nombre=$ver2['nombre'];
                        echo '
                            <option value="'.$id.'">'.$nombre.'</option>';
                       
                        
                        
                    }while ($ver2=mysqli_fetch_array($enviar2));

                ?>
                        </select>
                    </div>
                    <div class="form-group">
                        
                        <input type="submit" name="enviar" value="Generar" class="btn float-right login_btn" style="
background-color: #DCEB8E;
">
                    </div>
                </form>
            </div>
            
        </div>
        
    </div>
    
</div>


</body>

</html>
