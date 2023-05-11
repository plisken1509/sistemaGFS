<?php
if (isset($_POST["cedula"]) && isset($_POST["img"]) && isset($_POST["actividad"])) {
  $actividad = $_POST["actividad"];
  if (empty($_POST["sitio"])) {
    $sitio = "Ninguno";
  } else {
    $sitio = $_POST["sitio"];
  }
  if ($actividad == "Otros") {
    $accion = $_POST["extra"];
  } else {
    $accion = $actividad;
  }
  if($_POST["archivo"]=="Error"){
    $userpic="";
  }else{
    $imgFile = $_FILES['archivo']['name'];
    $tmp_dir = $_FILES['archivo']['tmp_name'];
    $imgSize = $_FILES['archivo']['size'];
    $upload_dir = 'archivos/'; // upload directory
    $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
    // valid image extensions
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
    // rename uploading image
    $userpic = rand(1000, 1000000) . "." . $imgExt;
    // allow valid image file formats
    if (in_array($imgExt, $valid_extensions)) {
        move_uploaded_file($tmp_dir, $upload_dir . $userpic);
    } 
  }
  $cedula = test_input($_POST["cedula"]);
  $sql = "SELECT * FROM empleados WHERE cedula='$cedula'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $sql = "SELECT * FROM empleados WHERE cedula = '$cedula'";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $count = mysqli_num_rows($result);
  $img = $_POST["img"];
  $fecha = date('Y-m-d');
  if ($count > 0) {
    require("conectar.php");
    $tipo = $_POST["tipo"];
    if ($tipo == "Entrada") {
      $query = "INSERT INTO marcados (cedula,  tipo,  fotos, fecha, sitio, accion, ruta) VALUES ('$cedula', '$tipo',  '$img', '$fecha', '$sitio','$accion','$userpic')";
      $result = mysqli_query($connect, $query);
      $movimiento = 0;
      $sql2 = "SELECT * FROM marcados ORDER by ID DESC LIMIT 1";
      $result2 = $conn->query($sql2);
      $row2 = $result2->fetch_assoc();
      $row2["fecha_hora"];
        $date = DateTime::createFromFormat('Y-m-d H:i:s', $row2["fecha_hora"]);
        $hora=$date->format('H:i:s');
        echo '<script language="javascript">
        alert("Cedula: '.$cedula.'\n
            Nombre y Apellido: '.$row["nombre"].'\n
            Código: '.$row["codigo"].'\n
            '.$tipo.': '.$hora.'\n
            Por: '.$accion.'\n
        ");
        </script>';
    } else {
      $query = "INSERT INTO marcados (cedula,  tipo,  fotos, fecha, sitio,  accion, ruta) VALUES ('$cedula', '$tipo', '$img', '$fecha', '$sitio', '$accion','$userpic')";
      $result = mysqli_query($connect, $query);
      $movimiento = 1;
      $sql2 = "SELECT * FROM marcados ORDER by ID DESC LIMIT 1";
      $result2 = $conn->query($sql2);
      $row2 = $result2->fetch_assoc();
      $row2["fecha_hora"];
        $date = DateTime::createFromFormat('Y-m-d H:i:s', $row2["fecha_hora"]);
        $hora=$date->format('H:i:s');
        echo '<script language="javascript">
        alert("Cedula: '.$cedula.'\n
            Nombre y Apellido: '.$row["nombre"].'\n
            Código: '.$row["codigo"].'\n
            '.$tipo.': '.$hora.'\n
            Por: '.$accion.'\n
        ");
        </script>';
    }
  } else {
    echo '<script language="javascript">
                alert("No hay empleado registrado con esa cedula ");
                </script>';
  }
}
if (!isset($_POST["cedula"])) {
  echo "Acceso prohibido";
}
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}