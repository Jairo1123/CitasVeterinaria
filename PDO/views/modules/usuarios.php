<?php
if(isset($_SESSION)){
    if(!$_SESSION["usuarioActivo"]){
        header("location:ingresar_error");
        exit();
    } 
}else {
      header("location:ingresar_error");
        exit();  
    }


 $usuarios = new MvcController();
 $usuarios->borrarUsuariosController();
 $usuarios->editarUsuarioController();        
 ?>


      <?php
        include 'include/cabecera.php';
       include "navegacion.php";
      ?>
<style>

    </style>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <!-- Basic table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Usuarios registrados</h5>
                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                                        <li><i class="fa fa-trash close-card"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Usuarios</th>
                                                                <th>Cedula</th>
                                                                <th>Contraseña</th>
                                                                <th>Correo Electrónico</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $usuarios->vistaUsuariosController();
                                                                ?>
                                                        </tbody>
                                                    </table>
                                                    <?php
    
                                                        if(isset($_GET["action"])){

                                                            if ($_GET["action"] == "eliminado_ok") {
                                                                    echo  "Usuario eliminado correctamente";
                                                            }elseif ($_GET["action"] == "eliminado_error") {
                                                                    echo "Ocurrío un error al eliminar el Usuario";
                                                            }elseif ($_GET["action"] == "actulizado_ok") {
                                                                    echo "Usuario actulizado correctamente";
                                                            }elseif ($_GET["action"] == "actulizado_error") {
                                                                    echo "Ocurrío un error al actulizar el usuario";        
                                                            }elseif ($_GET["action"] == "ingresar_ok") {
                                                                    echo "Bienvenido"; 
                                                            }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Basic table card end -->

                                    </div>
                                    <!-- Page-body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->

                            <div id="styleSelector">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <script type="text/javascript" src="js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- waves js -->
    <script src="pages/waves/js/waves.min.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="js/modernizr/modernizr.js "></script>
    <!-- Custom js -->
    <script src="js/pcoded.min.js"></script>
    <script src="js/vertical-layout.min.js "></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>


</body>

</html>
