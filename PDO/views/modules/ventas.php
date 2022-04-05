<?php

$registro_ventas = new MvcController();
$registro_ventas ->registroVentasController();
$registro_ventas->borrarVentasController();

?>

      <?php
        include 'include/cabecera.php';
       include "navegacion.php";
       
      ?>
    <style>
        .colon{
            position: relative;
            left: 26px;
        }
         .pu {
            height: 25px;
         }
         label{
             position: relative;
             bottom: 7px;
         }
    </style>
       <br/>
       
       <div class="row">
       <div class="col-md-4 offset-md-1">
       <div class="card">
            <div class="card-header">
                <h5>Registro Ventas</h5>
                
            </div>

         <form class="form-material" method="post">
        <br/>
            
        <div class="form-group col-md-12">
        <div class="form-group form-default">
        <input  class="form-control" id="detalle" type="text" name="detalle" required>
        <span class="form-bar"></span>
        <label class="float-label">Detalle</label>
        </div>
            
        <br/>
        <div class="form-group form-default">
        <input class="form-control" id="monto" type="text" name="monto" required>
        <span class="form-bar"></span>
        <label class="float-label">Monto</label>
        </div>
        <br/>
        <?php
        ini_set('date.timezone','America/Costa_Rica');
        $fecha_actual= date("Y-m-d");
        ?>
        <div class="form-group form-default">
        <input  class="form-control" type="date" id="fecha" name="fecha" value="<?= $fecha_actual?>" required>
        <span class="form-bar"></span>
        <label class="float-label">Fecha</label>
        </div>
        <br/>
        
        <div class="form-group form-default">
        <select class="form-control" id="estado" name="estado">
                
                <option    value="Pendiente">Pendiente</option>
                <option   value="Pagado">Pagado</option>
            </select>
        <span class="form-bar"></span>
        <label class="float-label">Estado</label>
        </div>
        <br/>
        <button class="btn btn-primary btn-round waves-effect waves-light" type="submit" >Registar venta</button>
            
      
         </form>
           </div>
       </div>
           </div>
             
           <div class="card col-6" >
               <div class="card-header ">
                <h5>Ventas del día</h5>
                
            </div>
      
        <div class="card-block table-border-style">
        <div class="table-responsive">
        <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Detalle</th>
                                <th>Monto</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                    <tbody>
                    <?php
                        
                        $registro_ventas->vistaVentas_diaController();
                        ?>
                    </tbody>
                    </table>
                        
                                <?php
    
                                                        if(isset($_GET["action"])){

                                                            if ($_GET["action"] == "Venta_eliminada") {
                                                                    echo  "Venta Eliminada";
                                                            }
                                                    }
                                                    ?> 
            </div>
             </div>
                    </div>     
                    </div>
                </div>
            </div>
        
 </div> 

      <?php
       include 'include/fooder.php';
      ?>
