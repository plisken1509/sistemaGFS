   <!-- Navigation -->
   <nav style=" background: rgb(0,51,26);
background: linear-gradient(357deg, rgba(0,51,26,1) 0%, rgba(0,102,51,1) 50%, rgba(0,25,13,1) 100%); color: white;" id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
       <div class="container">
           <!-- Brand and toggle get grouped for better mobile display -->
           <ul class="nav nav-pills">
               <li>
                   <img style="width:60px" src="../../img/logo.png" />
               </li>
               <li class="navbar-brand">
                   <p style="color:white;"><?php include("nombre.php"); ?></p>
               </li>

               <li class="dropdown pull-right">
                   <h4 style="color:white;" href="#" data-toggle="dropdown" class="dropdown-toggle">Admin <b class="caret"></b></h4>
                   <ul class="dropdown-menu">
                       <li><a href="../empleados">Personal</a></li>
                       <li><a href="../marcados">Registros</a></li>
                       <li><a href="../cerrar_sesion.php">Salir</a></li>
                   </ul>
               </li>
           </ul>
       </div>
       <!-- /.container-fluid -->
   </nav>