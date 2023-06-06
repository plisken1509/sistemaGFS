<!DOCTYPE html>
<html lang="en">

<?php
require("comunes/head.php");
require("permisos.php");
require("conectar.php");

if (!isset($_GET["cedula"])) {
    header("location:index.php?error");
} else {
    $cedula = $_GET["cedula"];

    $sql = "SELECT * FROM empleados WHERE cedula='$cedula'";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    $count = mysqli_num_rows($result);

    if ($count == 0) {
        header("location:index.php?error");
    }
}
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

            <div style="color:black">
                <?php echo "Cedula: " . $cedula;
                echo "<br>"; ?>
                <?php echo "Nombre y Apellido: " . $row["nombre"];
                echo " ";
                echo $row["apellido"];
                echo "<br>";  ?>
                <img src="fotos/<?php echo $row['foto']; ?>" class="img-rounded" width="64px" height="64px" />
                <?php echo "<br>"; ?>
            </div>

            <form style=" background: rgb(0,51,26);
background: linear-gradient(357deg, rgba(0,51,26,1) 0%, rgba(0,102,51,1) 50%, rgba(0,25,13,1) 100%); color: white;" class="form-signin" action="consultar_marcados.php?cedula=<?php echo $cedula; ?>" method="POST">
                <p style="color:white;">Fecha: <input style="color:black;" type="date"  required="" name="fecha"></p>

                <button class="btn btn-lg btn-block star" style="background-color:#cb9a33;" type="submit">Aceptar</button>
                <button class="btn btn-lg btn-block" style="background-color:#f84d41" onclick="location.href = 'index.php';" type="button">Cancelar</button>

            </form>
            <br>

            <div style="color:black;font-weight: 900;font-size: 20px"> 
            <?php if (isset($_POST["fecha"])) {
                $fecha = $_POST["fecha"];
                echo $newDate = date("d-m-Y", strtotime($fecha));
                $sql = "SELECT * FROM marcados INNER JOIN empleados ON marcados.cedula=empleados.cedula WHERE  marcados.cedula='$cedula' AND marcados.fecha='$fecha'ORDER BY marcados.fecha_hora DESC";
            } else {
                $sql = "SELECT * FROM marcados INNER JOIN empleados ON marcados.cedula=empleados.cedula WHERE  marcados.cedula='$cedula' ORDER BY marcados.fecha_hora DESC";
            }?>
            </div>
            <?php

            require("../../conectar.php");



            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            ?>
                <div align="center">
                    <table class="table">
                        <thead style=" background: rgb(0,51,26);
background: linear-gradient(357deg, rgba(0,51,26,1) 0%, rgba(0,102,51,1) 50%, rgba(0,25,13,1) 100%); color: white;">
                            <tr>
                                <th>Hora</th>
                                <th>Fecha</th>
                                <th>Tipo</th>
                                <th>Accion</th>
                                <th>Lugar</th>
                            </tr>
                        </thead>
                        <tbody style="background-color:white;">
                            <?php
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td>
                                        <?php $row["fecha_hora"];
                                        $date = DateTime::createFromFormat('Y-m-d H:i:s', $row["fecha_hora"]);
                                        echo $date->format('H:i:s'); // Will print 17:00 

                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $row["fecha"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["tipo"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["accion"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["sitio"]; ?>
                                    </td>
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
                <div style="color:red;font-weight: 900;font-size:20px">
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

    <?php require("comunes/footer.php"); ?>

    <?php require("comunes/scripts.php"); ?>

</body>

</html>