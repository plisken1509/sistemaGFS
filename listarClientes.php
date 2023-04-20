<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT c.id,c.nombre cliente, c.cedula, c.direccion,c.correo,c.clave,e.nombre empresa FROM clientes c
JOIN empresa e ON c.empId=e.id;");
$clientes = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Clientes</h1>
		<div>
			<a class="btn btn-success" href="./formularioCliente.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Cédula</th>
					<th>Cliente</th>
                    <th>Direccion</th>
					<th>Correo</th>
					<th>Clave</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($clientes as $cliente){ ?>
				<tr>
					<td><?php echo $cliente->id ?></td>
					<td><?php echo $cliente->cedula ?></td>
					<td><?php echo $cliente->cliente ?></td>
					<td><?php echo $cliente->direccion ?></td>
					<td><?php echo $cliente->correo ?></td>
                    <td><?php echo $cliente->clave ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editarClientes.php?id=" . $cliente->id?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminarClientes.php?id=" . $cliente->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>