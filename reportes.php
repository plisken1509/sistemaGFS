<?php
include'conexion.php';
include'encabezado.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reportes</title>
    <meta charset="utf-8">
  
   
  
</head>
<body>
<div class="container">
    
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <br>
                <h3>Datos</h3>
                <div class="d-flex justify-content-end social_icon">
                    
                </div>
            </div>
            <div class="card-body">
                <form method="post" name="frmUsuarios" action="tabla.php" target="_BLANK">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            
                        </div>
                        <input type="date" class="form-control" placeholder="Usuario" name="fecha1" maxlength="30" required>
                        
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            
                        </div>
                        <input type="date" class="form-control" placeholder="Password" name="fecha2" maxlength="30" id="password" required>
                    </div>
                    <div class="input-group form-group">
                        
                    </div>
                    <div class="form-group">
                        
                        <input type="submit" name="reporte" value="Consultar" class="btn float-right login_btn" style="background-color:skyblue;">
                    </div>
                </form>
            </div>
            
        </div>
        
    </div>
    
</div>

</body>
</html>
