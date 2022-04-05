<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	static public function pagina(){	

		include "views/template.php";
            

	}

	#ENLACES
	#-------------------------------------

	static public function enlacesPaginasController(){

		if(isset( $_GET['action'])){

			$enlaces = $_GET['action'];

		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}
        
        //#registro Usuarios
        public static function registroUsuarioController(){ 
            if(
            isset($_POST["nombre"]) && 
            isset($_POST["email"]) &&
            isset($_POST["paquete"])
            ){
                if(!empty($_POST["nombre"]) &&  !empty($_POST["email"]) && !empty($_POST["paquete"])){
                   if(preg_match('/^[A-Za-z0-9\-\_\.]{3,20}$/',$_POST["nombre"]) &&
                      preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/',$_POST["email"])&&
                      preg_match('/[a-zA-Z]+$/',$_POST["paquete"])){ 
                     
                       
                       
                    $datos = array(
                          "nombre" => $_POST["nombre"] ,
                
                          "email" => $_POST["email"],
                            
                          "paquete" => $_POST["paquete"]
                           );   
                   /* $destinatorio = $_POST["email"];
                    $asunto = "Registro a Sistema de Control Ventas";
                    $nombre= $_POST["nombre"];
                    $carta = "De: $nombre \n";
                    $carta .="Correo:sistemascv4@gmail.com\n";
                    $carta = "Usted ha seleccionado el paquete";
                    $carta = "Si escogio el paquete basico el monto a pagar es de ***";
                    $carta = "Para activar su licencia de SCV debe realizar el pago por medio de sinpe movil al 89838308";
                    $carta = "Mandar al correo: sistemascv4@gmail.com, el comprobante de pago";
                    mail($destinatorio, $asunto, $carta);
                        */                 
                      
                      
                      $respuesta = Datos::registroUsuariosModel($datos,"usuarios");
                      if($respuesta == "success"){
                           
                                header("location:confirmacion_ok");
                                   
                          
                      }else {
                          
                                header("location:registro_error");
                          
                      }
                    }
                }                     
        }
    }


 
    #----------------------
    #vistas usuarios
    public static function vistaUsuariosController(){
        $respuesta = Datos::vistaUsuarioModel("usuarios");
        foreach ($respuesta as $key => $value){
            echo'
              <tr>
                      <td>'.$value["nombre"].'</td>
                      
                      <td>*******</td>
                      <td>'.$value["email"].'</td>
                      <td>
                        <a href="editar&idEditar='.$value["id"].'">
                            <button class="btn btn-success btn-round pu waves-effect waves-light">
                                Editar
                            </button>
                        <a/>
                      </td>
                      <td>
                        <a href="usuarios&idBorrar='.$value["id"].'">
                            <button class="btn btn-danger btn-round pu waves-effect waves-light">
                                Borrar
                            </button>
                        <a/>
                     </td>
              </tr>
            ';
        }
    }
    #Elimar usuario
    public static function borrarUsuariosController() {
        if(isset($_GET["idBorrar"])){
            if(!empty($_GET["idBorrar"])){
                   if(preg_match('/^[0-9]{1,20}$/',$_GET["idBorrar"])){
                          $datos = $_GET["idBorrar"];
                          $respuesta = Datos::borrarUsuarioModel($datos, "usuarios");
                            if( $respuesta == "success"){
                                
                                header("location:eliminado_ok");
                                   
                               
                            } else {
                                
                                     header("location:eliminado_error");
                                  
                                
                            }
                        }
                    }
            }
         }


    #editar usuario
    public static function editarUsuarioController() {
        if(isset($_GET["idEditar"])){
             if(!empty($_GET["idEditar"])){
                   if(preg_match('/^[0-9]{1,20}$/',$_GET["idEditar"])){
                        $datos = $_GET["idEditar"];
                        $respuesta = Datos::editarUsuarioModel($datos, "usuarios");
                        echo '
                            <input type="hidden" name="id" value="'.$respuesta["id"].'"required>      
                            <input type="hidden" id="nombre_validar" value="'.$respuesta["nombre"].'"required> 
                            <input type="hidden" id="email_validar" value="'.$respuesta["email"].'"required> 
                            <div class="form-group col-md-12">
                            <div class="form-group form-default">   
                            <input type="text"  name="nombre" id="nombre_registro" class="form-control"  value="'.$respuesta["nombre"].'" required>
                            <span class="form-bar"></span>
                            <label class="float-label">Usuario</label>
                            </div>
                            <br/>
                            <div class="form-group form-default">
                            <input type="password"  class="form-control" name="password"  required>
                            <span class="form-bar"></span>
                            <label class="float-label">Contraseña</label>
                            <br/>
                            <div class="form-group form-default">
                            <input type="email" placeholder="Email" name="email" id="email_registro" class="form-control"  value="'.$respuesta["email"].'" required>
                            <span class="form-bar"></span>
                            <label class="float-label">Email</label>
                            <br/>
                            <input type="submit" class="btn btn-primary btn-round waves-effect waves-light" value="Enviar">
                        ';  
                    }
                }
            }
        }

            
            
    public static function actualizarUsuarioController() {
         if(
                isset($_POST["id"]) && 
                isset($_POST["nombre"]) &&
              
                isset($_POST["password"]) &&
                isset($_POST["email"])
                ){
                   if(!empty($_POST["id"])&&  !empty($_POST["nombre"]) &&  !empty($_POST["password"])&& !empty($_POST["email"])){
                     if(preg_match('/^[0-9]{1,20}$/',$_POST["id"])&&
                        preg_match('/^[A-Za-z0-9\-\_\.]{3,20}$/',$_POST["nombre"]) &&
                        preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/',$_POST["email"]) &&     
                        preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/',$_POST["password"])){
                          //$password = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                          $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                          $datos = array(
                                "id" => $_POST["id"],
                                "nombre" => $_POST["nombre"],
                                "password" => $password,
                                "email" => $_POST["email"]
                                 );
                          $respuesta = Datos::actulizarUsuarioModel($datos,"usuarios");
                          if($respuesta == "success"){
                              header("location:actualizado_ok");
                                   
                          }else {
                                header("location:actulizado_error");
                                    
                          }
                      }
                  }
          }
      }
              

       #ingreso de usuario
      
 public static function nuevaContraseñaController() {
     
        if(isset($_POST["validacion"]) &&
           isset($_POST["password"]))
             {
            
               if(!empty($_POST["validacion"]) &&  !empty($_POST["password"])){
                   if(isset($_POST["validacion"]) && preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/',$_POST["password"]) ){
                       
                            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                            
                            $datos = array(
                                "validacion" => $_POST["validacion"],
                                "password" => $password
                             );
                            
                            $respuesta = Datos::validarCodigoModel($datos,"usuarios");
                      
                            $respuesta2 = Datos::actulizarContraseñaModel($datos,"usuarios");
                        
                            var_dump($respuesta2);
                            if($respuesta["validacion"] == $datos["validacion"] && $respuesta2 == "success")
                                    {
                                   header("location:ingresar");
                                   
                                    
                            }else {
                                header("location:confirmar_error");
                                
                          }
                }else {
                    header("location:ingresar_error_invalido");
                          
                }
           } else {
               header("location:ingresar_error_vacio");
                         
            
           }
                           
       }
    }      
      

    public static function ingresarUsuarioController() {
        if(isset($_POST["nombre"])&&
            isset($_POST["password"]) ){
               if(!empty($_POST["nombre"]) && !empty($_POST["password"])){
                   if(preg_match('/^[A-Za-z0-9\-\_\.]{3,20}$/',$_POST["nombre"]) &&
                           preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/',$_POST["password"])){
                            $password= $_POST["password"];
                            $datos = array(
                                "nombre" => $_POST["nombre"],
                                "password" => $password
                             );
                            
                            $respuesta = Datos::ingresarUsuarioModel($datos,"usuarios");
                            
                            /*if($respuesta["estado"] == 1){*/
                                if($respuesta["nombre"] == $datos["nombre"] && 
                                        password_verify($_POST["password"], $respuesta["password"]))
                                        {$_SESSION["usuarioActivo"] = true;
                                       header("location:ingresar_ok");

                                }else {
                                    header("location:ingresar_error");


                                }
                            
                            /*}else{
                                header("location:estado_error");
                            }*/
                }else {
                    header("location:ingresar_error_invalido");
                          
                }
           } else {
               header("location:ingresar_error_vacio");
                         
            
           }
                           
       }
    }
    
    
    
    
    #--------------------------------------------
    #VALIDAR USUARIOS
    public static function validarUsuariosController($datos) {
       $respuesta = 0;
        if(!empty($datos) ){
         if(preg_match('/^[A-Za-z0-9\-\_\.]{3,20}$/', $datos) || 
            preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $datos )){
               $respuesta = Datos::validarUsuarioModel($datos);
               if($respuesta[0] > 0){
                   $respuesta = 1;
               } else {
                   $respuesta = 0;
               }
         }
      
    }
    return $respuesta;
    }
    
    public static function vistasobremiController(){
        
        $respuesta = Datos::vistasobremiModel("sobre_mi");
      
        foreach ($respuesta as $key => $value){
         
            echo'
                 <br/>
                <div class="row">
       <div class="col-md-4 offset-md-1">
       <div class="card">
            <div class="card-header">
                <h5>Sobre mí</h5>
                <br/>
            </div>

          
           <div class="list-inline-item">
                                      <div align="center">
                                      <br/>
                                       <img  class="img-fluid img-circle " width="100" height="100" src="images/isacc.jpg" alt="User-Profile-Image">
                                       
                                       </div>
                                        <br/>
                                       <h6 align="center" >Nombre:</h6>
                                       <h6 align="center">'.$value["nombre"].$value["apellidos"].' </h6>
                                       <br/>
                                       <h6 align="center" >Correo:</h6>
                                       <h6 align="center" >'.$value["correo"].' </h6>
                                       <br/>
                                       <h6 align="center">Cedula:</h6>
                                       <h6 align="center">'.$value["cedula"].' </h6>
                                       <br/>
                                       <h6 align="center">Telefono:</h6>
                                       <h6 align="center">'.$value["telefono"].' </h6>
                                        
                                   
                                                
          
           </div>
           
       </div>
           </div>
             
           <div class="card col-4" >
               <div class="card">
               <div class="card-header">
                <h5>Más Información</h5>
                </div>
            </div>
              
               <div>
                        <div class="accordion-panel">
                    <div class="accordion-heading" role="tab" id="headingOne">
                        <h3 class="card-title accordion-title">
                            <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                            data-parent="#accordion" href="#collapseOne"
                            aria-expanded="true" aria-controls="collapseOne">
                            Datos:
                        </a>
                    </h3>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="accordion-content accordion-desc">
                        <p>'
                            .$value["datos"].
                        '</p>
                    </div>
                </div>
            </div>
                  <div class="accordion-panel">
                    <div class="accordion-heading" role="tab" id="headingTwo">
                        <h3 class="card-title accordion-title">
                            <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                            data-parent="#accordion" href="#collapseTwo"
                            aria-expanded="false"
                            aria-controls="collapseTwo">
                            Formación:
                        </a>
                    </h3>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="accordion-content accordion-desc"> <p>'
                    .$value["formacion"].
                        '</p>
                    </div>
                </div>
            </div>
                        <div class="accordion-panel">
                        <div class=" accordion-heading" role="tab" id="headingThree">
                            <h3 class="card-title accordion-title">
                                <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                                data-parent="#accordion" href="#collapseThree"
                                aria-expanded="false"
                                aria-controls="collapseThree">
                               Fortalezas:
                            </a>
                        </h3>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="accordion-content accordion-desc">
                             <p>'
                            .$value["fortalezas"].
                        '</p>
                    </div>
                </div>
            </div>


               </div>
               
            </div>
      
 </div> 
                

              
            ';
        }
        
    }
    

#Parte de proyecto

#Ingreso de datos de ventas

    public static function registroVentasController(){ 
            if(
            isset($_POST["detalle"]) &&  
            isset($_POST["monto"])&&  
            isset($_POST["fecha"])&&
            isset($_POST["estado"])
            ){
                if(!empty($_POST["detalle"]) && !empty($_POST["monto"])&& !empty($_POST["fecha"])&& !empty($_POST["estado"])){
                    if(preg_match('/^[a-zA-Z]{3,30}$/',$_POST["detalle"])&&
                       preg_match('/^[0-9,]{2,10}$/',$_POST["monto"])&&
                       preg_match('/^[0-9-]+$/',$_POST["fecha"])&&
                       preg_match('/[a-zA-Z]+$/',$_POST["estado"])
                       
                            ){
                      
                        $datos = array(
                          "detalle" => $_POST["detalle"],
                          "monto" => $_POST["monto"],
                          "fecha" => $_POST["fecha"],
                          "estado" => $_POST["estado"]
                           );
                      $respuesta = Datos::registroVentasModel($datos,"ventas");
                      
                      if($respuesta == "success"){
                          
                                header("location:registro_ventas_ok");
                                   
                          
                      }else {
                          
                                header("location:registro_ventas_error");
                      }
                    }  }
                    }
                }          
                
               
    public static function vistaVentasController(){
        
        $respuesta = Datos::vistaVentasModel("ventas");
        $monto_total = array_sum(array_column($respuesta, 'monto'));
        foreach ($respuesta as $key => $value){
            echo'
              <tr>
                      <td>'.$value["id"].'</td>
                      <td>'.$value["detalle"].'</td>
                      <td>'.$value["monto"].'</td>
                      <td>'.$value["fecha"].'</td>
                      <td>'.$value["estado"].'</td>
                      

                     <td>
                      
                        <a href="editar_ventas&idEditar='.$value["id"].'">
                            
                            <button class="btn btn-success btn-round pu waves-effect waves-light">
                                <label>Editar </label>
                            </button>
                        <a/>
                      </td>
                      <td>
                        <a href="ventas&idBorrar='.$value["id"].'">
                            
                            <button class="btn btn-danger btn-round pu waves-effect waves-light">
                                <label>Borrar </label>
                            </button>
                        <a/>
                     </td>
                     
              </tr>
        
            ';
        }
        echo '
                                <div>
                                <h5 class="text-c-blue">TOTAL:</h5>


                                      <div class="row">
                                         <div class="col-md-1 text">
                                    <h5 class="text-c-blue colon" >₡</h5>
                                </div>
                                <div class="col-1">
                                    <h5 class="text-c-blue">'.$monto_total.'</h5>
                            </div>
                            </div>
                              </div>  ';
        
    }

    
    public static function vistaRangoFechasController(){
        
        if(
            isset($_POST["fecha1"]) &&  
            isset($_POST["fecha2"]) 
        ){
            if($_POST["fecha1"] <= $_POST["fecha2"]){
                
                        if(!empty($_POST["fecha1"]) && !empty($_POST["fecha2"])){
                             if(preg_match('/^[0-9-]+$/',$_POST["fecha1"])&&
                                preg_match('/^[0-9-]+$/',$_POST["fecha2"])){
                                $datos = array(
                                "fecha1" => $_POST["fecha1"],
                                "fecha2" => $_POST["fecha2"]
                                 );

                          $respuesta = Datos::vistaRangoFechasModel($datos,"ventas");
                          $monto_total = array_sum(array_column($respuesta, 'monto'));
                          
                            foreach ($respuesta as $key => $value){
                                      
                            echo'
                              <tr>
                                      <td>'.$value["id"].'</td>
                                      <td>'.$value["detalle"].'</td>
                                      <td>'.$value["monto"].'</td>
                                      <td>'.$value["fecha"].'</td>
                                      <td>'.$value["estado"].'</td>
                                      
                                     <td>
                      
                                        <a href="editar_ventas&idEditar='.$value["id"].'">

                                            <button class="btn btn-success btn-round pu waves-effect waves-light">
                                                <label>Editar </label>
                                            </button>
                                        <a/>
                                      </td>
                                      <td>
                                        <a href="ventas&idBorrar='.$value["id"].'">

                                            <button class="btn btn-danger btn-round pu waves-effect waves-light">
                                                <label>Borrar </label>
                                            </button>
                                        <a/>
                                     </td>
                     
                              </tr>
                              
                            ';
                            
                        }
                        echo '
                                <div>
                                <h5 class="text-c-blue">TOTAL:</h5>


                                      <div class="row">
                                         <div class="col-md-1 text">
                                    <h5 class="text-c-blue colon">₡</h5>
                                </div>
                                <div class="col-1">
                                    <h5 class="text-c-blue">'.$monto_total.'</h5>
                            </div>
                            </div>
                              </div>  ';
                                }
                                
            }else{
                    $vista = new MvcController;
                    $mostrar = $vista->vistaVentasController(); 
                    echo $mostrar;
            }       
                } else {
                
                 echo '<script>
                window.location.href = "busqueda_error";
               </script>';
                }
            } elseif (isset($_POST["id"])) {
                
            $vista = new MvcController;
                    $mostrar = $vista->idVentasController(); 
                    echo $mostrar;
        }  
        else {
                $vista = new MvcController;
                    $mostrar = $vista->vistaVentasController(); 
                    echo $mostrar;
    }  

    
        }

         
         
    public static function vistaVentas_diaController(){
        
        $respuesta = Datos::vistaVentas_dia_Model("ventas");
        $monto_total = array_sum(array_column($respuesta, 'monto'));
        foreach ($respuesta as $key => $value){
            echo'
              <tr>
              
                      <td>'.$value["id"].'</td>
                      <td>'.$value["detalle"].'</td>
                      <td>'.$value["monto"].'</td>
                      <td>'.$value["fecha"].'</td>
                      <td>'.$value["estado"].'</td>
                      
                      <td>
                      
                        <a href="editar_ventas&idEditar='.$value["id"].'">
                            
                            <button class="btn btn-success btn-round pu waves-effect waves-light">
                                <label>Editar </label>
                            </button>
                        <a/>
                      </td>
                      <td>
                        <a href="ventas&idBorrar='.$value["id"].'">
                            
                            <button class="btn btn-danger btn-round pu waves-effect waves-light">
                                <label>Borrar </label>
                            </button>
                        <a/>
                     </td>
                     
              </tr>
            ';
        }
        echo '
         <div class="card-block">
                    
                    <h5 class="text-c-blue" >TOTAL:</h5>
                    <div class="row align-items-center">
                        <div class="row align-items-center offset-md-1">
                        <div class="col-4 ">
                            <i class="text-c-blue colon" >₡</i>
                        </div>
                        <div class="col-8">
                            <h5 class="text-c-blue">'.$monto_total.'</h5>
                        </div>
                            
                            </div>
                        <div>
                        ';
    }
  
    
    public static function idVentasController(){
        if(
            isset($_POST["id"]) 
        ){
        if(!empty($_POST["id"])){
            if(preg_match('/^[0-9]{1,20}$/',$_POST["id"])){
                $datos = array(
                "id" => $_POST["id"]
                        );
                
                        $respuesta = Datos::IdventasModel($datos,"ventas");
                        $monto_total = array_sum(array_column($respuesta , 'monto'));
                        if($respuesta <> null){  
                        foreach ($respuesta as $key => $value){
                            echo'
                              <tr>
                                      <td>'.$value["id"].'</td>
                                      <td>'.$value["detalle"].'</td>
                                      <td>'.$value["monto"].'</td>
                                      <td>'.$value["fecha"].'</td>
                                      <td>'.$value["estado"].'</td>
                                      <td>

                                     <td>

                                        <a href="editar_ventas&idEditar='.$value["id"].'">

                                            <button class="btn btn-success btn-round pu waves-effect waves-light">
                                                <label>Editar </label>
                                            </button>
                                        <a/>
                                      </td>
                                      <td>
                                        <a href="ventas&idBorrar='.$value["id"].'">

                                            <button class="btn btn-danger btn-round pu waves-effect waves-light">
                                                <label>Borrar </label>
                                            </button>
                                        <a/>
                                     </td>

                              </tr>

                            ';
                        }
                        echo '
                                                <div>
                                                <h5 class="text-c-blue">TOTAL:</h5>


                                                      <div class="row">
                                                         <div class="col-md-1 text">
                                                    <h5 class="text-c-blue colon" >₡</h5>
                                                </div>
                                                <div class="col-1">
                                                    <h5 class="text-c-blue">'.$monto_total.'</h5>
                                            </div>
                                            </div>
                                              </div>  ';
                                   
                        
                        
                        } else {
                            
                        echo '<script>
                                        window.location.href = "busqueda_venta_error";
                                        
                                       </script>';
                      } 
            
                      }    
                      
                  }else {
                        echo '<script>
                                        window.location.href = "No_inserto_datos";
                                       </script>';
                      }
             }
           }

  
    public static function borrarVentasController() {
        if(isset($_GET["idBorrar"])){
            if(!empty($_GET["idBorrar"])){
                   if(preg_match('/^[0-9]{1,20}$/',$_GET["idBorrar"])){
                          $datos = $_GET["idBorrar"];
                          $respuesta = Datos::borrarVentaModel($datos, "ventas");
                            if( $respuesta == "success"){
                                
                                header("location:Venta_eliminada");
                                   
                               
                            } else {
                                
                                     header("location:Venta_eliminada_error");
                                  
                                
                            }
                        }
                    }
            }
         }
 
 
    public static function editarventasController() {
               if(isset($_GET["idEditar"])){
                    if(!empty($_GET["idEditar"])){
                          if(preg_match('/^[0-9]{1,20}$/',$_GET["idEditar"])){
                               $datos = $_GET["idEditar"];
                               $respuesta = Datos::editarventasModel($datos, "ventas");
                               echo '
                                   <input type="hidden" name="id" value="'.$respuesta["id"].'"required>      
                                   <br/>
                                    <div class="form-group col-md-12">
                                    <div class="form-group form-default">
                                    <input  class="form-control" id="detalle" value="'.$respuesta["detalle"].'" type="text" name="detalle" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Detalle</label>
                                    </div>

                                    <br/>
                                    <div class="form-group form-default">
                                    <input class="form-control" id="monto" type="text" value="'.$respuesta["monto"].'" name="monto" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Monto</label>
                                    </div>
                                    <br/>
                       
                                    <div class="form-group form-default">
                                    <input  class="form-control" type="date" id="fecha" name="fecha" value="'.$respuesta["fecha"].'" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Fecha</label>
                                    </div>
                                    <br/>

                                    <div class="form-group form-default">
                                    <select class="form-control" value="'.$respuesta["estado"].'" id="estado" name="estado">

                                            <option    value="Pendiente">Pendiente</option>
                                            <option   value="Pagado">Pagado</option>
                                        </select>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Estado</label>
                                    </div>
                                    <br/>
                                    <input type="submit" class="btn btn-primary btn-round waves-effect waves-light" value="Enviar">
                                  
                               ';  
                           }
                       }
                   }
               }

 
    public static function actualizarVentasController(){ 
                   if(
                   isset($_POST["id"]) &&
                   isset($_POST["detalle"]) &&  
                   isset($_POST["monto"])&&  
                   isset($_POST["fecha"])&&
                   isset($_POST["estado"])
                   ){
                       if(!empty($_POST["id"])&&!empty($_POST["detalle"]) && !empty($_POST["monto"])&& !empty($_POST["fecha"])&& !empty($_POST["estado"])){
                           if(preg_match('/^[0-9]{1,20}$/',$_POST["id"])&&
                              preg_match('/^[a-zA-Z]{3,30}$/',$_POST["detalle"])&&
                              preg_match('/^[0-9,]{2,10}$/',$_POST["monto"])&&
                              preg_match('/^[0-9-]+$/',$_POST["fecha"])&&
                              preg_match('/[a-zA-Z]+$/',$_POST["estado"])
                       
                            ){     
                             $datos = array(
                                 "id" => $_POST["id"],
                                 "detalle" => $_POST["detalle"],
                                 "monto" => $_POST["monto"],
                                 "fecha" => $_POST["fecha"],
                                 "estado" => $_POST["estado"]
                                  );
                             $respuesta = Datos::actulizarventasModel($datos,"ventas");
                           
                                if($respuesta == "success"){
                                    header("location:actualizado_ventas_ok");

                                }else {
                                      header("location:actualizado_ventas_error");

                                }
                               }
                       }
                           }
                       }          


    public static function montodasController(){
        
        $respuesta = Datos::vistaVentasModel("ventas");
        $monto_total = array_sum(array_column($respuesta, 'monto'));
 
        echo '<h5 class="text-c-purple">'.$monto_total.'</h5>';
    }

    public static function usuariosController(){

            $respuesta = Datos::vistaUsuarioModel("usuarios");
            $usuario_total = count(array_column($respuesta, 'nombre'));

            echo '<h5 class="text-c-green">'.$usuario_total.'</h5>';
    }


}    
?>