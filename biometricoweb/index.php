<!DOCTYPE html>
<html lang="en">
<?php
require("comunes/head.php");
require("conectar.php");
require("determinar_movimiento.php");
?>
<style>
  body {
    background-image: url(img/fondo.png);
    background-position: center;
    background-repeat: no-repeat;
    background-size: 100%;
    background-attachment: fixed;
  }
</style>
<?php require("comunes/nav.php"); ?>
<body>
  

 <header style="background-image: url(img/fondo.png);">
    <div align="center">
      <br><br><br><br><br>
      <form class="form-signin" action="index.php" method="POST" enctype="multipart/form-data" style=" background: rgb(0,51,26);
background: linear-gradient(357deg, rgba(0,51,26,1) 0%, rgba(0,102,51,1) 50%, rgba(0,25,13,1) 100%); ">

        <div style="text-align:center;padding:1em 0;">
         <h3 style="color: #b39523;">Gourmet Food Service</h3>
        </div>
          <?php
          if (isset($_GET["error"])) {
              echo '<script language="javascript">
                alert("No hay empleado registrado con esa cedula ");
                </script>';
              }
          ?>
          <?php
          if (isset($movimiento) and ($movimiento == 0)) {
              $row2["fecha_hora"];
              $date = DateTime::createFromFormat('Y-m-d H:i:s', $row2["fecha_hora"]);
              echo '<script language="javascript">
                alert("Código: '.$row["codigo"].'\n'.$tipo.': '.$date->format('H:i:s').'\nPor: '.$accion.'\n");
                </script>';
          }
          if (isset($movimiento) and ($movimiento == 1)) {
              $row2["fecha_hora"];
              $date = DateTime::createFromFormat('Y-m-d H:i:s', $row2["fecha_hora"]);
              echo '<script language="javascript">
                alert("Código: '.$row["codigo"].'\n'.$tipo.': '.$date->format('H:i:s').'\nPor: '.$accion.'\n");
                </script>';
          }
          ?>
        <select name="dispositivosDeVideo" id="dispositivosDeVideo"></select>
        </br></br>
        <div class="row" style="color:white">
          <div class="col-sm-6">
            <p> Cámara:</p>
            <video class="img-rounded" style="width:148px" muted="muted" id="video"></video>
            <canvas id="canvas" style="display: none;"></canvas>

          </div>
          <div class="col-sm-6">
            <div id="duracion"></div>
          </div>
        </div>
        <button id="btnDetenerGrabacion" class="btn btn-black">Hacer foto</button>
        </br>
        <div class="row" style="color:white">
            <div class="col-sm-6">
                <input class="form-control" type="radio" name="tipo" id="entrada" value="Entrada">
                <label>Entrada</label>
            </div>
            <div class="col-sm-6">
                <input class="form-control"type="radio" name="tipo" id="salida" value="Salida">
                <label>Salida</label>
            </div>
        </div>
        </br>
        <select id="actividad" name="actividad" class="form-control">
          <option value="Telefonica">Telefonica</option>
          
        </select>
        <br>
        <div id="otro">
          <input class="form-control" type="hidden" maxlength="100" type="text" id="sitio" name="sitio" placeholder="Lugar" required="" autofocus="" /> <br>
        </div>
        <div id="firma">
        </div>
        <input type="text" class="form-control" name="cedula" id="cedula" maxlength="10" onkeypress="return isNumberKey(event)" placeholder="Cedula" required="" autofocus="" />
        <button id="enviar" name="enviar" class="btn btn-lg btn-primary btn-block" type="submit" onclick="return confirmar()">Aceptar</button>
      </form>
    </div>
  </header>
  <?php require("comunes/footer.php"); ?>
  <?php require("comunes/scripts.php"); ?>
  <script type="text/javascript">
    function isNumberKey(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
      }
      return true;
    }
    

    const init = () => {
      const tieneSoporteUserMedia = () =>
        !!(navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia)

      if (typeof MediaRecorder === "undefined" || !tieneSoporteUserMedia())
        return alert("Tu navegador web no cumple los requisitos; por favor, actualiza a un navegador como Firefox o Google Chrome");

      function _getUserMedia() {
        return (navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia).apply(navigator, arguments);
      }
      const $dispositivosDeVideo = document.querySelector("#dispositivosDeVideo"),
        $canvas = document.querySelector("#canvas"),
        $duracion = document.querySelector("#duracion"),
        $video = document.querySelector("#video"),
        $cedula = document.querySelector("#cedula"),
        $btnDetenerGrabacion = document.querySelector("#btnDetenerGrabacion"),
        $actividad = document.querySelector("#actividad"),
        $sitio = document.querySelector("#sitio"),
        $enviar = document.querySelector("#enviar"),
        $firma = document.querySelector("#firma"),
        $otro = document.querySelector("#otro");
        
      $actividad.disabled = true;
      $cedula.disabled = true;
      $sitio.disabled = true;
      $enviar.disabled = true;
      


let rd = document.getElementById("entrada");
    $firma.innerHTML = `<input type="hidden" name="archivo" value="Error" />`;
      rd.checked = true;

      $("#actividad").change(function() {
        var valor = $("#actividad").val();
        if (valor == "Otros") {
          $otro.innerHTML = `<input class="form-control" maxlength="100" type="text" id="extra" name="extra" placeholder="Especifique la actividad" required="" autofocus=""/> <br>`;
        } else if (valor == "Acción Tutorial") {
          $otro.innerHTML = `<input class="form-control" maxlength="100" type="text" id="sitio" name="sitio" placeholder="Lugar" required="" autofocus=""/> <br>`;
        } else {
          $otro.innerHTML = ``;
        }
      });
      

      $(function() {
        $('input:radio[name="tipo"]').change(function() {
            if ($(this).val() == 'Salida') {
                $firma.innerHTML = `<input class="form-control" type="file" name="archivo" accept="image/*" placeholder="Foto" required=""  /> <br>`;
            } else {
                $firma.innerHTML = `<input type="hidden" name="archivo" value="Error" />`;
            }
        });
      });

      const limpiarSelect = elemento => {
        for (let x = elemento.options.length - 1; x >= 0; x--) {
          elemento.options.remove(x);
        }
      }
      let tiempoInicio, mediaRecorder, idIntervalo;
      const llenarLista = () => {
        navigator
          .mediaDevices
          .enumerateDevices()
          .then(dispositivos => {
            limpiarSelect($dispositivosDeVideo);
            dispositivos.forEach((dispositivo, indice) => {
              if (dispositivo.kind === "videoinput") {
                const $opcion = document.createElement("option");
                $opcion.text = dispositivo.label || `Cámara ${indice + 1}`;
                $opcion.value = dispositivo.deviceId;
                $dispositivosDeVideo.appendChild($opcion);
              }
            })
          })
      };


      $dispositivosDeVideo.addEventListener("change", function() {
        $video.pause();
        mediaRecorder.stop();
        mediaRecorder = null;
        inicializeVideo();

      });



      function inicializeVideo() {
        _getUserMedia({
            video: true
          },
          function(stream) {
            if (!$dispositivosDeVideo.options.length) return alert("No hay cámara");

            navigator.mediaDevices.getUserMedia({
                video: {
                  deviceId: $dispositivosDeVideo.value, // Indicar dispositivo de vídeo
                }
              })
              .then(stream => {
                // Poner stream en vídeo
                $video.srcObject = stream;
                $video.play();
                // Comenzar a grabar con el stream
                mediaRecorder = new MediaRecorder(stream);
                mediaRecorder.start();

                $btnDetenerGrabacion.addEventListener("click", function() {
                  $video.pause();
                  let contexto = $canvas.getContext("2d");
                  $canvas.width = $video.videoWidth;
                  $canvas.height = $video.videoHeight;
                  contexto.drawImage($video, 0, 0, $canvas.width, $canvas.height);
                  let foto = $canvas.toDataURL(); //Esta es la foto, en base 64
                  $duracion.innerHTML = "Enviando foto. Por favor, espera...";
                  fetch("foto_render.php", {
                      method: "POST",
                      body: encodeURIComponent(foto),
                      headers: {
                        "Content-type": "application/x-www-form-urlencoded",
                      }
                    })
                    .then(resultado => {
                      return resultado.text()
                    })
                    .then(nombreDeLaFoto => {
                      console.log("La foto fue enviada correctamente");
                      $duracion.innerHTML = `<p>Foto Realizada</p> <img class="img-rounded" style="width:148px" src="./${nombreDeLaFoto}" />
                      <input type="hidden" id="img" name="img" value="${nombreDeLaFoto}"/>
                      `;
                    })

                      $actividad.disabled = false;
                      $cedula.disabled = false;
                      $sitio.disabled = false;
                      $enviar.disabled = false;
                  $video.play();

                });
              })
              .catch(error => {
                console.log(error)
              });
          },
          function(error) {
            console.log("Permiso denegado o error: ", error);
            $estado.innerHTML = "No se puede acceder a la cámara, o no diste permiso.";
          });
      }
      $btnDetenerGrabacion.addEventListener("click", function() {
        detenerGrabacion();
        $video.pause();
        mediaRecorder.stop();
        mediaRecorder = null;
        inicializeVideo();
      });
      llenarLista();
      inicializeVideo();
    }
    document.addEventListener("DOMContentLoaded", init);


    function confirmar() {

      var respuesta = confirm("¿Desea enviar estos datos?");
      if (respuesta == true) {
        return true;
      } else {
        return false;
      }
    }
  </script>
</body>

</html>