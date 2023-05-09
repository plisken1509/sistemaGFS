<?php
    include ('conexion.php');
    if (isset($_REQUEST['status'])) {
        if ($_REQUEST['status']=="1") {
            $star='<div class="alert alert-success" role="alert">
  Consumo Registrado  
</div>';    
        }if ($_REQUEST['status']=="2") {
            $star='<div class="alert alert-warning" role="alert">
  Usuario no Registrado  
</div>';    
        }if ($_REQUEST['status']=="3") {
            $star='<div class="alert alert-danger" role="alert">
  Consumo no Registrado  
</div>';    
        }if ($_REQUEST['status']=="5") {
            $star='<div class="alert alert-success" role="alert">
  Extras Registrados  
</div>';    
        }
        
    }else{
        $star="";
    }
?>
<script type="text/javascript" src="este.js"></script> 

<link rel="stylesheet" href="css/estilos.css">

    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
    <script src="bootstrap/js/jquery-3.6.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> -->

    <title>Servicio de Almuerzos</title>
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
                    </div>
                    </li>
                    <li class="nav-item active">
                     <a class="nav-link" href="salir.php"><i class="fas fa-home"></i> Salir <span class="sr-only">(current)</span></a>
                 </li>
                   
             </ul>
         </div>
</nav>
  <head></head>
      <center>
    <main style="background-image:url(https://thumbs.dreamstime.com/b/fondo-negro-de-cocina-con-especias-y-plato-vista-superior-espacio-libre-para-el-texto-estilo-r%C3%BAstico-183926482.jpg);background-size: 100% 100%;">
        <b><h1 style="background-color: white;color:#156f15;">Consumo Almuerzos</h1></b>
        <br>
        
        
        <div style="width: 40%; float:left"> 
            <form id="login_form" class="form_class" action="guardad.php?tipo=A" method="post">

                <div class="form_div">
                    <?php echo $star ?>
                    <label>Cedula:</label>
                    <input class="field_class" name="cedula" id="cedula" type="text" placeholder="Cedula" autofocus required>
                    <button class="submit_class" type="submit" form="login_form">Consumir</button>
                </div>
                <div class="info_div">
                    <?php
                        $query="select * from consumos where fecha=CURDATE() and tipo='Almuerzo'";
                        $enviar=mysqli_query($db,$query);
                        $ver=mysqli_num_rows($enviar);
                        echo "Consumos Hoy: ".$ver;
                    ?>
                </div>
                <div class="info_div" style="text-align: left;">
                <center><h3>Extras</h3></center>
                <input class="form-check-input" type="checkbox" value="almuerzo" name="almuerzoExtra" style="align:left;">
                <label class="form-check-label" for="flexCheckCheckedDisabled">
    Almuerzo Extra
  </label>
  <br>
  <input class="form-check-input" type="checkbox" value="empaque" name="empaque">
                <label class="form-check-label" for="flexCheckCheckedDisabled">
    Empaque
  </label>    
                </div>
                
            </form>
        </div>
        <?php
            $query="";            
            $query="SELECT cl.cedula cedula,cl.nombre cliente,emp.nombre empresa,cl.centro_costos as codigo,c.fecha fecha, c.hora hora, c.tipo tipo  from consumos c,clientes cl, empresa emp where c.cliId=cl.id and emp.id=cl.empId and c.fecha=CURDATE() ORDER BY hora DESC";
            $enviar=mysqli_query($db,$query);
            $ver=mysqli_fetch_array($enviar);
            $contar=mysqli_num_rows($enviar);
        ?>
<div style="width: 700px;height: 350px; float:left;overflow:scroll;">
        <?php
            $enviar=mysqli_query($db,$query);
            $ver=mysqli_fetch_array($enviar);
            $contar=mysqli_num_rows($enviar);
            
            echo "<div class=container><center><table class=table style='background-color: white' 
                <thead class=thead-dark>
            <tr>
              <th scope=col>Cedula</th>
              <th scope=col>Nombre</th>
              <th scope=col>Empresa</th>
              <th scope=col>Fecha</th>
              <th scope=col>Hora</th>
              <th scope=col>Tipo</th>
              
            </tr>
          </thead>";
if($contar>0) {


    do {

        $cedula=$ver['cedula'];
        $cliente=$ver['cliente'];
        $empresa=$ver['empresa'];
        $fecha=$ver['fecha'];
        $hora=$ver['hora'];
        $tipo=$ver['tipo'];


        echo '
                <tbody>
                <tr>
                
                <td>'.$cedula.'</td>
                <td>'.$cliente.'</td>
                <td>'.$empresa.'</td>
                <td>'.$fecha.'</td>
                <td>'.$hora.'</td>
                <td>'.$tipo.'</td>
                
                
                </tr>
        
            ';

    } while ($ver=mysqli_fetch_array($enviar));
    echo '</tbody></table>';
}
        ?>
</div>
    </main>
    </center>
   
</body>
