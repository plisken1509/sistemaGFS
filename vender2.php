<script type="text/javascript">
        function ConfirmarEliminar()
        {
            var cliente= document.getElementById("controlBuscador1").value;
			
            if(cliente>0)
            {
                return true;
            }
            else
            {
				alert("Seleccione un Cliente");
                return false;
            }
        }
    </script>
<?php
session_start();

if (!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;



 	$conexion=mysqli_connect('localhost','root','','ventas');
	$sql="SELECT id,descripcion from productos";
	$result=mysqli_query($conexion,$sql);

	$sql1="SELECT id,nombre from clientes";
	$result1=mysqli_query($conexion,$sql1);
?>
<link rel="stylesheet" href="css/estilos.css">

    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/fontawesome-all.min.css">
	
    <link rel="stylesheet" href="catering/sis/bootstrap/css/bootstrap.min.css">
    
    <script src="catering/sis/bootstrap/js/jquery-3.6.1.min.js"></script>
    <script src="catering/sis/bootstrap/js/bootstrap.min.js"></script>
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
<div class="col-xs-12">
	<h1>Vender</h1>
	<?php
	if (isset($_GET["status"])) {
		if ($_GET["status"] === "1") {
	?>
			<div class="alert alert-success">
				<strong>¡Correcto!</strong> Venta realizada correctamente
			</div>
		<?php
		} else if ($_GET["status"] === "2") {
		?>
			<div class="alert alert-info">
				<strong>Venta cancelada</strong>
			</div>
		<?php
		} else if ($_GET["status"] === "3") {
		?>
			<div class="alert alert-info">
				<strong>Ok</strong> Producto quitado de la lista
			</div>
		<?php
		} else if ($_GET["status"] === "4") {
		?>
			<div class="alert alert-warning">
				<strong>Error:</strong> El producto que buscas no existe
			</div>
		<?php
		} else if ($_GET["status"] === "5") {
		?>
			<div class="alert alert-danger">
				<strong>Error: </strong>El producto está agotado
			</div>
		<?php
		} else {
		?>
			<div class="alert alert-danger">
				<strong>Error:</strong> Algo salió mal mientras se realizaba la venta
			</div>
	<?php
		}
	}
	?>
	<br>
	<!-- Buscador -->
	
	<section style="text-align: center;">
	<form method="post" action="agregarAlCarrito.php">
		<select id="controlBuscador" name="codigo" id="codigo" style="width: 50%">
			<?php while ($ver=mysqli_fetch_row($result)) {?>
			<option value="<?php echo $ver[0] ?>">
				<?php echo $ver[1] ?>
			</option>
			<?php  }?>
		</select>
		<input type="submit" value="Agregar" id="button">
	</form>
	</section>
	
	<!--FIN Buscador -->
	<br><br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Código</th>
				<th>Descripción</th>
				<th>Precio de venta</th>
				<th>Cantidad</th>
				<th>Total</th>
				<th>Quitar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($_SESSION["carrito"] as $indice => $producto) {
				$granTotal += $producto->total;
			?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->descripcion ?></td>
					<td><?php echo $producto->precioVenta ?></td>
					<td>
						<form action="cambiar_cantidad.php" method="post">
							<input name="indice" type="hidden" value="<?php echo $indice; ?>">
							<input min="1" name="cantidad" class="form-control" required type="number" value="<?php echo $producto->cantidad; ?>">
						</form>
					</td>
					<td><?php echo $producto->total ?></td>
					<td><a class="btn btn-danger" href="<?php echo "quitarDelCarrito.php?indice=" . $indice ?>"><i class="fa fa-trash"></i></a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

	<h3>Total: <?php echo $granTotal; ?></h3>
	<form action="./terminarVenta.php" method="POST" al>
	<section style="text-align: center;">
		<select id="controlBuscador1" name="cliente" id="cliente" style="width: 50%">
			<option value="0">Seleccione Cliente:</option>
			<?php while ($ver1=mysqli_fetch_row($result1)) {?>			
			<option value="<?php echo $ver1[0] ?>">
				<?php echo $ver1[1] ?>
			</option>
			<?php  }?>
		</select>
		<br><br>
		<input name="total" type="hidden" value="<?php echo $granTotal; ?>">
	</section>
		<center>
			<button type="submit" class="btn btn-success" onclick="return ConfirmarEliminar()">Terminar venta</button>
			<a href="./cancelarVenta.php" class="btn btn-danger">Cancelar venta</a>
		</center>
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#controlBuscador').select2();
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#controlBuscador1').select2();
	});
</script>
<?php include_once "pie.php" ?>