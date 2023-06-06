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
        <div align="center" >
            <br><br><br>
            <h1>REGISTRAR PERSONAL</h1><img src="img/registrar.png" width="64px">
            <form class="form-signin" action="codigo_registrar.php" method="POST" enctype="multipart/form-data" style=" background: rgb(0,51,26);
background: linear-gradient(357deg, rgba(0,51,26,1) 0%, rgba(0,102,51,1) 50%, rgba(0,25,13,1) 100%); color: white;">
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
                    <?php
                    if (isset($_GET["imagen"])) {
                    ?>
                        <div class="alert alert-danger">
                            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo "Error al cargar la imagen"; ?> !
                        </div>
                    <?php
                    }
                    ?>
                </div>

                <input type="text" class="form-control" maxlength="10" onkeypress="return isNumberKey(event)" name="cedula" placeholder="Cedula" required="" autofocus="" />
                <input type="text" class="form-control" maxlength="40" name="nombre" placeholder="Nombre" required="" />
                <input type="text" class="form-control" maxlength="40" name="apellido" placeholder="Apellido" required="" />
                <input type="text" class="form-control" maxlength="15" name="codigo" placeholder="Codigo" required="" />
                <label style="color:white;">Foto (JPG, PNG, GIF MAX 1 MB) </label>
                <input class="form-control" type="file" name="foto" accept="image/*" placeholder="Foto" required="" />
                <br>
                <button class="btn btn-lg btn-block star" style="background-color:#cb9a33;" type="submit">Aceptar</button>

                <button class="btn btn-lg btn-block" style="background-color:#f84d41;" onclick="location.href = 'index.php';" type="button">Cancelar</button>
            </form>

        </div>
    </header>

    <?php require("comunes/footer.php"); ?>

    <?php require("comunes/scripts.php"); ?>
    <script type="text/javascript">
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }
    </script>
</body>

</html>