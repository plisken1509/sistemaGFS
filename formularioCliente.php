<?php include_once "encabezado.php" ?>
<?php
    include ('conexion.php');
    if (isset($_GET['enviar'])) {
		$nombre=$_REQUEST['nombre'];
		$cedula=$_REQUEST['cedula'];
		$empresa=$_REQUEST['empresa'];
		$direccion=$_REQUEST['direccion'];
		$correo=$_REQUEST['correo'];
		$clave=$_REQUEST['clave'];
		$query="insert into clientes values(0,'$empresa','$cedula','$nombre','$direccion','$correo','1','1','$clave','1')";
		$enviar=mysqli_query($db, $query);    
		if($enviar === TRUE){
			header("Location: ./listarClientes.php");
			exit;
		}
		else echo "Algo salió mal. Por favor verifica que la tabla exista";
		echo'<script>alert("Cliente Ingresado")</script>';
		}
?>

<div class="col-xs-12">
	<h1>Nuevo cliente</h1>
	<form id="login_form" class="form_class" method="get">
		<label for="cedula">Cédula:</label>
		<input class="form-control" name="cedula" required type="text" id="cedula" placeholder="Escribe la cédula">

		<label for="nombre">Nombre:</label>
		<input class="form-control" name="nombre" required type="text" id="nombre" placeholder="Escribe el Nombre">

		<label for="nombre">Direccion:</label>
		<input class="form-control" name="direccion" required type="text" id="direccion" placeholder="Escribe la Dirección">

		<label for="correo">Correo:</label>
		<input class="form-control" name="correo" required type="email" id="correo" placeholder="Escribe el Correo">

		<label for="correo">Empresa:</label>
		<select class="form-control" name="empresa">
                <?php 
					include('conexion.php');
                    $query1="select * from empresa";
                    $enviar1=mysqli_query($db,$query1);
                    $ver1=mysqli_fetch_array($enviar1);
                    do{
                        $id=$ver1['id'];
                        $nombre=$ver1['nombre'];
                        if ($ver1['id']==$id) {
                          echo '
                              <option value="'.$id.'" selected>'.$nombre.'</option>';
                        }else{
                          echo '
                              <option value="'.$id.'">'.$nombre.'</option>';
                        
                        }
                    }while ($ver1=mysqli_fetch_array($enviar1));
					
                ?>
        </select>

		<label for="clave">Password:</label>
		<input class="form-control" name="clave" required type="password" id="clave" placeholder="Escribe la Clave">

		<br><br><button class="submit_class" name="enviar" type="submit">Guardar</button>
	</form>
</div>
<?php include_once "pie.php" ?>