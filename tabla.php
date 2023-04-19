<?php 
    include('conexion.php');
    include('encabezado.php');
    $fecha1=$_REQUEST['fecha1'];
    $fecha2=$_REQUEST['fecha2'];
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>


</body>
</html>
<?php
    
        $query="SELECT * FROM clientes c JOIN productos p JOIN productos_vendidos pv JOIN ventas v where pv.id_producto=p.id and pv.id_venta=v.id and v.id_cliente=c.id and v.fecha BETWEEN '$fecha1' and '$fecha2'";
        //echo $query;
   
    
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
      <th scope=col>Producto</th>
      <th scope=col>Precio</th>
      <th scope=col>Cantidad</th>
      
    </tr>
  </thead>";
    do{
    $cedula=$ver['cedula'];
    $nombre=$ver['nombre'];
    $fecha=$ver['fecha'];
    $descripcion=$ver['descripcion'];
    $precio=$ver['precioVenta'];
    $cantidad=$ver['cantidad'];

    echo '
        <tbody>
        <tr>
        <td>'.$cedula.'</td>
        <td>'.$nombre.'</td>
        <td>'.$fecha.'</td>
        <td>'.$descripcion.'</td>
        <td>'.$precio.'</td>
        <td>'.$cantidad.'</td>
        </tr>

    ';
    }while ($ver=mysqli_fetch_array($enviar)); 
        echo '</tbody></table><a href="exportarExcel.php?fecha1='.$fecha1.'&fecha2='.$fecha2.'" class="btn btn-sm btn-success">Exportar Excel</a>
        <a href="exportarPDF.php?fecha1='.$fecha1.'&fecha2='.$fecha2.'" class="btn btn-sm btn-success" style="background-color:#f60b07">Exportar PDF</a>
        </center></div>';
?>