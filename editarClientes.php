<?php
	 include ('conexion.php');
	 $id=$_GET['id'];
	 $query="select * from clientes where id=$id";
	 $enviar=mysqli_query($db,$query);
	 $ver=mysqli_fetch_array($enviar);
?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar cliente con el ID <?php echo $ver['id'] ?></h1>
		<form action="guardarDatosEditadosClientes.php" class="form_class" method="post">
			<input type="hidden" name="id" id="id" value="<?php echo $ver['id'] ?>">
			<label for="cedula">Cédula:</label>
			<input class="form-control" value="<?php echo $ver['cedula'] ?>" name="cedula" required type="text" id="cedula" placeholder="Escribe la cédula">

			<label for="nombre">Nombre:</label>
			<input class="form-control" value="<?php echo $ver['nombre'] ?>" name="nombre" required type="text" id="nombre" placeholder="Escribe el Nombre">

			<label for="nombre">Direccion:</label>
			<input class="form-control" value="<?php echo $ver['direccion'] ?>" name="direccion" required type="text" id="direccion" placeholder="Escribe la Dirección">

			<label for="correo">Correo:</label>
			<input class="form-control" name="correo" value="<?php echo $ver['correo'] ?>" required type="email" id="correo" placeholder="Escribe el Correo">

			<label for="correo">Empresa:</label>
			<select class="form-control" name="empresa" id="empresa">
                <?php
                    $query2="select c.empId,e.nombre from clientes c,empresa e where c.empId=e.id";
                    $enviar2=mysqli_query($db,$query2);
                    $ver2=mysqli_fetch_array($enviar2);
                    do{
                        $id=$ver2['empId'];
                        $nombre=$ver2['nombre'];
                        if ($ver['empId']==$id) {
                        echo '
                            <option value="'.$id.'" selected>'.$nombre.'</option>';
                        }else{
                        echo '
                            <option value="'.$id.'">'.$nombre.'</option>';
                        
                        }
                    }while ($ver2=mysqli_fetch_array($enviar2));

                ?>
                </select>

			<label for="clave">Password:</label>
			<input class="form-control" name="clave" value="<?php echo $ver['clave'] ?>" required type="password" id="clave" placeholder="Escribe la Clave">

			<br><br><button class="submit_class" name="editar" type="submit">Guardar</button>
		</form>
	</div>
<?php include_once "pie.php" ?>
