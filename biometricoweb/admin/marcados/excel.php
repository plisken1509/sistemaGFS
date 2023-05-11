<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <!--Importante--->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargar</title>
</head>
<body>
    
<?php

date_default_timezone_set("America/Bogota");
$fecha = date("d/m/Y");
header("Content-Type: text/html;charset=utf-8");
header("Content-Type: application/vnd.ms-excel charset=iso-8859-1");
$filename = "ReporteExcel_" .$fecha. ".xls";
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Disposition: attachment; filename=" . $filename . "");

require("../../conectar.php");

if (isset($_POST["excel"])) {
    if(isset($_POST["fecha"]) && isset($_POST["fecha2"])){
        $fecha=$_POST["fecha"];
        $fecha2=$_POST["fecha2"];
        $sql = "SELECT * FROM marcados INNER JOIN empleados ON marcados.cedula=empleados.cedula WHERE marcados.fecha BETWEEN '$fecha' AND '$fecha2' ORDER BY marcados.fecha_hora DESC";

    }else{
        $sql = "SELECT * FROM marcados INNER JOIN empleados ON marcados.cedula=empleados.cedula  ORDER BY marcados.fecha_hora DESC";
    }
    $result = $conn->query($sql);
}
?>
<h3>Reporte de Ingresos Y Salidas</h3>
<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<thead>
    <tr style="background: #D0CDCD;">
        <th>Foto</th>
        <th>Código</th>
        <th>Nombre y Apellido</th>
        <th>Hora</th>
        <th>Fecha</th>
        <th>Tipo</th>
        <th>Accion</th>
        <th>Lugar</th>
        <th>Hoja de Control</th>
    </tr>
</thead>
<?php
$i =1;
    while ($row = $result->fetch_assoc()) { 
        $datos[]=$row;
        ?>
    <tbody>
        <tr>
            <td>
                <a href="https://www.desarollodesoftwarevn.com/biometricoweb/<?php echo $row['fotos']; ?>">
                    Imagen
                </a>
            </td>
            <td> <?php echo $row["codigo"]; ?></td>
            <td>
                <?php echo $row["nombre"];
                echo " ";
                echo $row["apellido"]; ?>
            </td>
            <td>
                <?php $row["fecha_hora"];
                $date = DateTime::createFromFormat('Y-m-d H:i:s', $row["fecha_hora"]);
                echo $date->format('H:i:s'); // Will print 17:00 
                ?>
            </td>
            <td> <?php echo $row["fecha"]; ?></td>
            <td> <?php echo $row["tipo"]; ?></td>
            <td> <?php echo $row["accion"]; ?></td>
            <td> <?php echo $row["sitio"]; ?></td>
            <?php if($row["tipo"]=="Salida"){  ?>
            <td>
                <a href="https://www.desarollodesoftwarevn.com/biometricoweb/archivos/<?php echo $row['ruta']; ?>">
                    Hoja
                </a>
            </td>
            <?php }else{?>
            <td>
            </td>
            <?php }?>
        </tr>
    </tbody>
    
<?php } ?>
</table>

</body>
</html>
