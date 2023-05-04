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
        $query2="select *,c.nombre as ncliente,c.id as cid from clientes c, empresa e where c.cedula='$cedula' and c.empId=e.id";
        echo $query2;
        $enviar2=mysqli_query($db,$query2);
        /* $clienteID=$ver2['id'];
        $nombre=$ver2['nombre'];*/
	    
        $enviar2=mysqli_query($db,$query2);
        $ver2=mysqli_fetch_array($enviar2);
        $clienteID=$ver2['cid'];
        $cod=$ver2['nombre'];
        $nombre=$ver2['ncliente']; 
        $consumos=$ver2['consumos'];
        $query3="select * from consumos where cliId='$clienteID' and fecha=CURRENT_DATE and tipo='$completo'";
        echo $query3;
        $enviar3=mysqli_query($db,$query3);
        $ver3=mysqli_num_rows($enviar3);
        if($ver2['estado']==0){
            echo"<script>
                    alert('Usuario dado de baja');
                    window.location = '$re';
                  </script>";
    }
        else{
            if($ver3>0){
                //echo "ya consumio hoy";
                if ($consumos>99) {
                   $query4="insert into consumos values(0,'$clienteID',now(),CURTIME(),'$completo','0.00')";
                $enviar4=mysqli_query($db,$query4);
                $query20="select max(id) as ul from consumos";
                $enviar20=mysqli_query($db,$query20);
                $ver20=mysqli_fetch_array($enviar20);
                $ultimo=$ver20['ul'];
                $query21="select * from consumos where id=$ultimo";
                $enviar21=mysqli_query($db,$query21);
                $ver21=mysqli_fetch_array($enviar21);
                $ultimo2=$ver21['fecha'];
                echo"<script>
                        window.location = '$re?status=1';
                      </script>";
                $nombre_impresora = "POS-80C"; 
                $connector = new WindowsPrintConnector($nombre_impresora);
                $printer = new Printer($connector);
                $printer->text("****Gourmet Food Service****\nCliente: $nombre\nCedula: $cedula\nEmpresa: $cod\nFecha: $ultimo2\n\n$completo \n****GRACIAS****");
                $printer->feed();
                $printer->cut();
                $printer->pulse();
                $printer->close(); 
                }else{


                echo"<script>
                        window.location = '$re?status=3';
                      </script>";
                }
            }else{
                $query4="insert into consumos values(0,'$clienteID',now(),CURTIME(),'$completo','0.00')";
                $enviar4=mysqli_query($db,$query4);
                $query20="select max(id) as ul from consumos";
                $enviar20=mysqli_query($db,$query20);
                $ver20=mysqli_fetch_array($enviar20);
                $ultimo=$ver20['ul'];
                $query21="select * from consumos where id=$ultimo";
                $enviar21=mysqli_query($db,$query21);
                $ver21=mysqli_fetch_array($enviar21);
                $ultimo2=$ver21['fecha'];
                echo"<script>
                        window.location = '$re?status=1';
                      </script>";
                $nombre_impresora = "POS-80C"; 
                $connector = new WindowsPrintConnector($nombre_impresora);
                $printer = new Printer($connector);
                $printer->text("****Gourmet Food Service****\nCliente: $nombre\nCedula: $cedula\nEmpresa: $cod\nFecha: $ultimo2\n\n$completo \n****GRACIAS****");
                $printer->feed();
                $printer->cut();
                $printer->pulse();
                $printer->close();
            }
        }
        //echo $query3;


    }else{
        
        echo"<script>
                    window.location = '$re?status=2';
                  </script>";
    }
    //header('location:'.$re); 
?>