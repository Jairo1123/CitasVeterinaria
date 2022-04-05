<?php
require_once "../controllers/controller.php";
require_once "../models/crud.php";
class ajax{
    public $validar_usuario;
    


    public function validarUsuariosAjax() {
        $datos = $this->validar_usuario;
        
     $respuesta = MvcController::validarUsuariosController($datos);
       // $respuesta = "Success";
        echo $respuesta;
    }   
    
 }
 
 if( isset( $_POST["nombre"])){
     $a= new ajax();
     $a->validar_usuario = $_POST["nombre"];
     $a->validarUsuariosAjax();
 } 
?>