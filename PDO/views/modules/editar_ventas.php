<?php
  $editar_ventas = new MvcController();
  $editar_ventas->actualizarVentasController();
     
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
                                                    <h5>Actualizar Venta</h5>

                                                </div>
                                                <form class="form-material" method="post">

                                                            <?php 
                                                            
                                                                $editar_ventas->editarventasController();
                                                                
                                                            ?> 
                                                   
                                                        </form>
                                               
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