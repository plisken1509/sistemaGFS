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
            <h1>EDITAR PERSONAL</h1><img src="img/editar.png" width="64px">
            <form style=" background: rgb(0,51,26);
background: linear-gradient(357deg, rgba(0,51,26,1) 0%, rgba(0,102,51,1) 50%, rgba(0,25,13,1) 100%); color: white;" class="form-signin" action="codigo_editar.php?cedula=<?php echo $cedula; ?>" method="POST" enctype="multipart/form-data">
                <div style="text-align:center;color:red;font-weight:900">
                    <?php
                    if (isset($_GET["error"])) {
                    ?>
                        <div class="alert alert-danger">
                            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo "Debe ingresar todos los datos"; ?> !
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre" required="" value="<?php echo $row["nombre"]; ?>" />
                <input type="text" value="<?php echo $row["apellido"]; ?>" class="form-control" name="apellido" placeholder="Apellido" required="" />
                <input type="text" value="<?php echo $row["codigo"]; ?>" class="form-control" name="codigo" placeholder="codigo" required="" />
                <br>
                <button class="btn btn-lg btn-block star" style="background-color:#cb9a33;" type="submit">Aceptar</button>

                <button class="btn btn-lg btn-block" style="background-color:#f84d41" onclick="location.href = 'index.php';" type="button">Cancelar</button>
            </form>

        </div>
    </header>

    <?php require("comunes/footer.php"); ?>

    <?php require("comunes/scripts.php"); ?>

</body>

</html>