<?php
    include 'include/cabecera.php';
    include 'navegacion.php';
    $todo = new MvcController();
?>
    <style>
        .pm{
            margin-bottom: -1.5rem;
            font-size: -0.5rem;
        }
        .h4, h4 {
        font-size: 0.9rem;
    }
        .pc{
            position: relative;
            bottom: -4px;
            right: 12px;
        }
       
    </style>
                        <div class="pcoded-inner-content">
                          
                            <div class="main-body">
                                <div class="page-wrapper">
                                  
                                    <div class="page-body">
                                        <div class="row">
                                        
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-purple pc">₡</h4>
                                                                <h4 class="text-c-purple pm"><?=$todo->montodasController();?></h4>
                                                                <h6 class="text-muted m-b-0"></h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-bar-chart f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-purple">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">Dinero Total</p>
                                                            </div>
                                                            
                                                        </div>
            
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-green"><?= $todo->usuariosController();?></h4>
                                                                <h6 class="text-muted m-b-0"></h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-file-text-o f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-green">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">Usuarios</p>
                                                            </div>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-12">
                                                <div class="card  ">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                
                                                                <h4 class="text-c-red pm">
                                                                     <?php
                                                                    ini_set('date.timezone','America/Costa_Rica');
                                                                    $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                                                                    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                                                                    echo $diassemana[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
                                                                    ?>
                                                                </h4>
                                                                <h6 class="text-muted m-b-0"></h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-calendar-check-o f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-red">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">Fecha</p>
                                                            </div>
                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                   
                
            
       
    

<?php
    include 'include/fooder.php';

?>