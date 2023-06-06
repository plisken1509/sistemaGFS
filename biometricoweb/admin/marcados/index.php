<!DOCTYPE html>
<html lang="en">

<?php
require("comunes/head.php");
require("permisos.php");

?>
<style type="text/css">
    button:hover{
        background-image: radial-gradient(circle at 48.93% 43.96%, #f6fbff 0, #e7e9f1 16.67%, #d4d4d4 33.33%, #bbbbb3 50%, #a1a393 66.67%, #8a907a 83.33%, #788267 100%); 
        color: black; !important;
        
    }
    .star{
        background-image: radial-gradient(circle at 50% 50%, #ffe740 0, #d4c432 25%, #9e9e24 50%, #6e7817 75%, #46570d 100%);
    }
</style>
<body style="background-color:#9b9b9a;">

    <?php require("comunes/nav_admin.php"); ?>

    <!-- Header -->
    <header>
        <div align="center">
            <br><br><br>

            <h1>REGISTROS</h1>
            <div style="text-align:center;padding:1em 0;">
                
            </div>
            <form class="form-signin" action="index.php" method="POST" style=" background: rgb(0,51,26);
background: linear-gradient(357deg, rgba(0,51,26,1) 0%, rgba(0,102,51,1) 50%, rgba(0,25,13,1) 100%); ">
                <p style="color:white;">Desde: <input style="color:black;" type="date" id="desde" required="" name="fecha"></p>
                <p style="color:white;">Hasta: <input style="color:black;" type="date" id="hasta" required="" name="fecha2"></p>

                <button class="btn btn-lg btn-block star"  type="submit">Aceptar</button>
            </form>
            <form class="form-signin" action="excel.php" method="POST" style=" background: rgb(0,51,26);
background: linear-gradient(357deg, rgba(0,51,26,1) 0%, rgba(0,102,51,1) 50%, rgba(0,25,13,1) 100%); ">
                <?php
                if (isset($_POST["fecha"]) && isset($_POST["fecha2"])) {
                    $fecha = $_POST["fecha"];
                    $fecha2 = $_POST["fecha2"];

                ?>
                    <input type="hidden" id="fecha" name="fecha" value="<?php echo $fecha; ?> ">
                    <input type="hidden" id="fecha2" name="fecha2" value="<?php echo $fecha2; ?> ">

                <?php
                } else if(isset($_POST["fecha"]) && empty($_POST["fecha2"])){
                    $fecha = $_POST["fecha"];
                    ?>
                    <input type="hidden" id="fecha" name="fecha" value="<?php echo $fecha; ?> ">
                <?php 
                }
                ?>
                <button id="excel" name="excel" class="btn btn-lg btn-block star" type="submit">Generar Excel</button>
            </form>
            <div style="color:black;font-weight: 900;font-size: 20px">
                <?php
                if (isset($_POST["fecha"]) && isset($_POST["fecha2"])) {
                    $fecha = $_POST["fecha"];
                    echo "Desde: ".$newDate = date("d-m-Y", strtotime($fecha));
                    $fecha2 = $_POST["fecha2"];
                    echo "<br>Hasta: ".$newDate = date("d-m-Y", strtotime($fecha2));
                    $sql = "SELECT * FROM marcados INNER JOIN empleados ON marcados.cedula=empleados.cedula  WHERE marcados.fecha  BETWEEN '$fecha' AND '$fechabackground-image: radial-gradient(circle at 50% 50%, #ffe740 0, #d4c432 25%, #9e9e24 50%, #6e7817 75%, #46570d 100%);2' ORDER BY marcados.fecha_hora DESC";

                }else{
                    $sql = "SELECT * FROM marcados INNER JOIN empleados ON marcados.cedula=empleados.cedula   ORDER BY marcados.fecha_hora DESC";

                }
                 ?>
            </div>
            <?php
            require("../../conectar.php");
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            ?>
                <br>
                <div align="center">
                    <table class="table" >
                        <thead style=" background: rgb(0,51,26);
background: linear-gradient(357deg, rgba(0,51,26,1) 0%, rgba(0,102,51,1) 50%, rgba(0,25,13,1) 100%); color: white;">
                            <tr>
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
                        <tbody style="background-color:white;">
                            <?php
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $datos[] = $row;
                            ?>
                                <tr>
                                    <td>
                                        <img src="../../<?php echo $row['fotos']; ?>" class="img-rounded" width="64px" height="64px" />
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
                                        <img src="../../archivos/<?php echo $row['ruta']; ?>" class="img-rounded" width="64px" height="64px" />
                                    </td>
                                    <?php }else{?>
                                    <td>
                                    </td>
                                    <?php }?>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php
            } else {
            ?>
                <div style="color:#0a4c9a;;font-weight: 900;font-size:20px">
                <?php
                if (isset($_POST["fecha"])) {
                    echo "No hubo resultados";
                }
                echo "";
            }

            $conn->close();
                ?>
                </div>
        </div>
    </header>

   

    <?php require("comunes/scripts.php"); ?>



</body>

</html>