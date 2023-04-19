<?php 
    include('conexion.php');
    include('encabezado.php');
 
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>


</body>
</html>
<?php
    
        $query="SELECT * FROM clientes c JOIN ventas v where v.id_cliente=c.id ";
   
    
//echo $query;
    $enviar=mysqli_query($db,$query);
    $ver=mysqli_fetch_array($enviar);
    echo "<center><h1>Registros de Ventas</h1></center>";
    echo "<div class=container><center><table class=table >
        <thead class=thead-dark>
    <tr>
      <th scope=col>Cedula</th>
      <th scope=col>Nombre</th>
      <th scope=col>Fecha</th>
      <th scope=col>Total Venta</th>
      <th scope=col>Accion</th>
      
      
    </tr>
  </thead>";
    do{
        $codigo=$ver['id'];
    $cedula=$ver['cedula'];
    $nombre=$ver['nombre'];
    $fecha=$ver['fecha'];
    $total=$ver['total'];

    echo '
        <tbody>
        <tr>
        <td>'.$cedula.'</td>
        <td>'.$nombre.'</td>
        <td>'.$fecha.'</td>
        <td>'.$total.'</td>
        <td><a href="exportarPDF.php?id=$codigo" class="btn btn-sm btn-success" style="background-color:#f60b07">Exportar PDF</a></td>
        </tr>

    ';
    }while ($ver=mysqli_fetch_array($enviar)); 
        echo '</tbody></table>
        
        </center></div>';
?>