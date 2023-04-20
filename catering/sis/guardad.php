<?php
     require __DIR__ . '/imprimir/autoload.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
    include ('conexion.php');
    $tipo=$_REQUEST['tipo'];
    $cedula=$_REQUEST['cedula'];
    $completo="";
    $re="";
    if ($tipo=="A") {
        $completo="Almuerzo";
        $re="almuerzos.php";
    }if ($tipo=="D") {
        $completo="Desayuno";
        $re="desayunos.php";
    }if ($tipo=="M") {
        $completo="Merienda";
        $re="meriendas.php";
    }
    $query="select * from clientes where cedula='$cedula'";
    $enviar=mysqli_query($db,$query);
    $ver=mysqli_num_rows($enviar);
    if($ver>0){
        $query2="select * from clientes where cedula='$cedula'";
        $enviar2=mysqli_query($db,$query2);
        $ver2=mysqli_fetch_array($enviar2);
        $clienteID=$ver2['id'];
        $query3="select * from consumos where cliId='$clienteID' and fecha=CURRENT_DATE and tipo='$completo'";
        $enviar3=mysqli_query($db,$query3);
        $ver3=mysqli_num_rows($enviar3);
        //echo $query3;
        if($ver3>0){
            //echo "ya consumio hoy";
            echo"<script>
                    alert('ya consumio hoy');
                    window.location = '$re';
                  </script>";
            
        }else{
            $query4="insert into consumos values(0,'$clienteID',now(),CURTIME(),'$completo','3.50')";
            $enviar4=mysqli_query($db,$query4);
            echo"<script>
                    window.location = '$re';
                  </script>";
            /*$nombre_impresora = "POS80 Printer"; 
            $connector = new WindowsPrintConnector($nombre_impresora);
            $printer = new Printer($connector);
            $printer->text("****Gourmet Food Service****\n\nCliente: $nombrebd\nCedula: $cedula\n\n$completo: $3.50\n\n\n\n\n****GRACIAS****");
            $printer->feed();
            $printer->cut();
            $printer->pulse();
            $printer->close();*/
        }

    }else{
        echo"<script>
                    alert('Usuario No Registrado');
                    window.location = '$re';
                  </script>";
    }
    //header('location:'.$re); 
?>