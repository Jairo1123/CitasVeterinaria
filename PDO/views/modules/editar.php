<?php
if(isset($_SESSION)){
    if(!$_SESSION["usuarioActivo"]){
        header("location:ingresar_error");
        exit();
    }
    } else {
        header("location:ingresar_error");
        exit();
    } 

  $editar = new MvcController();
  $editar->actualizarUsuarioController();
 
?>

<?php
      include 'include/cabecera.php';
      include "navegacion.php";
      ?>
                     
                        <div class="pcoded-inner-content">
                       
                            <div class="main-body">
                                <div class="page-wrapper">
                               
                                    <div class="page-body">
                                     
                                           <div class="row">
                                           <div class="col-md-8 offset-md-1">
                                           <div class="card">
                                                <div class="card-header">
                                                    <h5>Actualizar Usuarios</h5>

                                                </div>
                                                <form class="form-material" method="post">

                                                            <?php 
                                                            
                                                                $editar->editarUsuarioController();
                                                                
                                                            ?> 
                                                   
                                                        </form>
                                               <div for="mensaje_error"></div>
                                           </div>
                                       </div>
                                       </div>

                                    </div>
                                   
                                </div>
                            </div>
                           

                            <div id="styleSelector">

                            </div>
                        </div>
                
<?php
       include 'include/fooder.php';
 ?>