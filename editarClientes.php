<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM clientes WHERE id = ?;");
$sentencia->execute([$id]);
$cliente = $sentencia->fetch(PDO::FETCH_OBJ);
if($cliente === FALSE){
	echo "¡No existe algún cliente con ese ID!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar cliente con el ID <?php echo $cliente->id; ?></h1>
		<form method="post" action="guardarDatosEditadosClientes.php">
			<input type="hidden" name="id" value="<?php echo $cliente->id; ?>">
	
			<label for="codigo">Cédula:</label>
			<input value="<?php echo $cliente->cedula ?>" class="form-control" name="cedula" required type="text" id="cedula" placeholder="Escribe la cédula">

			<label for="descripcion">Nombre:</label>
			<input value="<?php echo $cliente->nombre ?>" class="form-control" name="nombre" required type="text" id="nombre" placeholder="Escribe el nombre">

			<label for="precioVenta">Correo:</label>
			<input value="<?php echo $cliente->correo ?>" class="form-control" name="correo" required type="email" id="correo" placeholder="Escribe el correo">

			<label for="precioCompra">Password:</label>
			<input value="<?php echo $cliente->password ?>" class="form-control" name="password" required type="password" id="password" placeholder="Escribe el password">

			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listarClientes.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
