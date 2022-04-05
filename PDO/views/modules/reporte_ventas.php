<?php

$registro_ventas = new MvcController();
$registro_ventas->borrarVentasController();



      include 'include/cabecera.php';
      include "navegacion.php";
?>
<style>
    .colon{
        position: relative;
        left: 85px;
    }
    .pk{
        width: 140px;
    }
    .pz{
        position: relative;
        left: 200px;
        bottom: 82px;
    }
    .po{
        position: relative;
        left: 360px;
        bottom: 137px;
    }
    .pu {
   height: 25px;
    }
    .pi{
        position: relative;
        bottom: 250px;
    }
    .zi{
        position: relative;
        left: 705px;
        width: 140px;
        bottom: 216px;
    }
    .ps{
        position: relative;
        left: 867px;
        bottom: 253px;
    }
    .ze{
        left: 690px; 
        bottom: 227px;
    }
    label{
        position: relative;
        bottom: 7px;
    }
  
</style>
<div class="page-wrapper">
    <div class="main-body">
         <div class="page-wrapper">
            <div class="page-body">
            <div class="card">
                <div class="card-header">
                    <h5>Reporte de Ventas</h5>
                    <br/>
                       <?php
    
                                                        if(isset($_GET["action"])){

                                                            if ($_GET["action"] == "busqueda_venta_error") {
                                                                    echo  "No existe Venta";
                                                            }elseif ($_GET["action"] == "busqueda_error") {
                                                                    echo "La fecha desde tiene que ser menor a la fecha hasta";
                                                            }elseif ($_GET["action"] == "No_inserto_datos") {
                                                                    echo "No inserto datos";
                                                            }elseif ($_GET["action"] == "Venta_eliminada") {
                                                                    echo  "Venta Eliminada";
                                                            }
                                                    }
                                                    ?>
                    <form  class="form-horizontal" method="POST">
                                          <div class="form-group">
                                              <br/>
                                          <label class="col-md-4 control-label">Fecha Desde:</label>
                                          <input class="form-control pk" type="date"    name="fecha1"/>
                                          </div> 
                                          <div class="form-group pz">
                                          <label >Hasta:</label>
                                          <input class="form-control pk" type="date"   name="fecha2"/>
                                          </div>
                                          <div class="form-group">
                                          <button class="btn btn-primary btn-round waves-effect waves-light po" type="submit">Buscar</button>
                                          </div> 
                                            
                                        </form>
                 
                         <form  class="form-horizontal" method="POST">
                                        <label class="col-md-4 control-label  ze">Número de Venta:</label>
                                        <input class="form-control zi" type="tex" placeholder="ID"   name="id"/>
                                        <button  class="btn btn-primary btn-round waves-effect waves-light ps" type="submit">Buscar</button>
                                        </form>
                    
                                       </div>
                                        <div class="card-block table-border-style ">
                                            <div class="table-responsive pi">
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
                                                                                       
                                                                $registro_ventas->vistaRangoFechasController();
                                                                                                  
                                                            ?>
                                                    </tbody>
                                                </table>
                                              
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