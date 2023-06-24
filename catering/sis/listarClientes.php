<?php
    include ('conexion.php');
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
  <head></head>
      <center>
    <main>
        <b><h1 style="background-color: white;color:#156f15;">Listado de Clientes</h1></b>
        <br>
        <div class="row">
        <div class="col-md-5">
            <form action="recibe_excel.php" method="POST" enctype="multipart/form-data">
                <div class="file-input text-center">
                    <input  type="file" name="dataCliente" id="file-input" class="file-input__input" accept=".csv"/>
                    <label class="file-input__label" for="file-input">
                    <i class="zmdi zmdi-upload zmdi-hc-2x"></i>
                    <span>Elegir Archivo CSV</span></label
                    >
                </div>
                <div class="text-center mt-5">
                    <input type="submit" name="subir" class="btn-enviar" value="Subir Archivo CSV"/>
                </div>
            </form>
        </div>
        </div>




        <?php 
                /* Pruebas excel */
               
    
    $sqlProductos         = ("SELECT * FROM clientes ORDER BY id ASC");
    $queryDataProductos   = mysqli_query($db, $sqlProductos);
    $totalProducts        = mysqli_num_rows($queryDataProductos);
                /* Fin Pruebas */



            $query="select c.id,c.cedula,c.nombre,c.direccion,e.nombre as empresa from clientes c,empresa e where c.empId=e.id order by c.id";
            $enviar=mysqli_query($db,$query);
            $ver=mysqli_fetch_array($enviar);
            echo "<div class=container><center><table class= table responsive >
            <thead class=thead-dark>
                <tr>
                <th scope=col>ID</th>
                <th scope=col>Cédula</th>
                <th scope=col>Nombre</th>
                <th scope=col>Direccion</th>
                <th scope=col>Empresa</th>
                <th scope=col>Accion</th>
                </tr>
            </thead>";
            do{
                $id=$ver['id'];
                $cedula=$ver['cedula'];
                $nombre=$ver['nombre'];
                $direccion=$ver['direccion'];
                $empresa=$ver['empresa'];

            echo '
                <tbody>
                <tr>
                    <td>'.$id.'</td>
                    <td>'.$cedula.'</td>
                    <td>'.$nombre.'</td>
                    <td>'.$direccion.'</td>
                    <td>'.$empresa.'</td>


                    <td><a href="editarCliente.php?id='.$id.'"><input type="button" value="Editar" name="Eliminar"class="btn btn-sm btn-warning"></a>
                        <a href="EliminaCliente.php?id='.$id.'"><input type="button" value="Eliminar" name="Eliminar"class="btn btn-sm btn-danger" onclick="return ConfirmarEliminar()"></a>
                    </td>
                </tr>

            ';
            }while ($ver=mysqli_fetch_array($enviar)); 
                echo '</tbody></table></center></div>';
        ?>
        
    </main>
    </center>
    <script type="text/javascript">
        function ConfirmarEliminar()
        {
            var respuesta= confirm("Esta seguro de Eliminar el Cliente");
            if(respuesta==true)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    </script>
</body>

