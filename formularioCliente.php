<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo cliente</h1>
	<form method="post" action="nuevoCliente.php">
		<label for="cedula">Cédula:</label>
		<input class="form-control" name="cedula" required type="text" id="cedula" placeholder="Escribe la cédula">

		<label for="nombre">Nombre:</label>
		<input class="form-control" name="nombre" required type="text" id="nombre" placeholder="Escribe el Nombre">

		<label for="correo">Correo:</label>
		<input class="form-control" name="correo" required type="email" id="correo" placeholder="Escribe el Correo">

		<label for="password">Password:</label>
		<input class="form-control" name="password" required type="password" id="password" placeholder="Escribe el Password">

		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>