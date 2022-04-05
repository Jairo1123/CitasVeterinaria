<?php
require_once "conexion.php";
class Datos extends Conexion{
    
    public static function registroUsuariosModel($datos,$tabla) {
        $stnt= Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,validacion,email,paquete)VALUES(:nombre,:validacion, :email, :paquete)");
        $stnt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stnt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stnt->bindParam(":paquete", $datos["paquete"], PDO::PARAM_STR);
        if($stnt->execute()){
            return "success";
        }else{
            return $stnt->errorInfo();
        }
    }
                                                           

    
    public static function vistaUsuarioModel($tabla) {
        $stnt = Conexion::conectar()->prepare("SELECT id, nombre, email FROM $tabla");
        $stnt ->execute();
        return $stnt->fetchAll();
    }
    
    #Eliminar usuario
    public static function borrarUsuarioModel($datos, $tabla) {
        $stnt= Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stnt->bindParam(":id", $datos, PDO::PARAM_INT);

        if($stnt->execute()){
            return "success";
        }else{
           $stnt->errorInfo();
        }
    }
    #ediar usuario
    public static function editarUsuarioModel($datos, $tabla) {
        $stnt= Conexion::conectar()->prepare("SELECT id,nombre,email FROM $tabla WHERE id= :id");
        $stnt->bindParam(":id", $datos, PDO::PARAM_INT);
        $stnt->execute();
        return $stnt->fetch();
    }
    
    public static function actulizarUsuarioModel($datos, $tabla) {
        $stnt= Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,password = :password,email= :email WHERE id = :id");
        $stnt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stnt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stnt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stnt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        if($stnt->execute()){
            return "success";
        }else{
            return $stnt->errorInfo();
        }
    }
    

  
        public static function actulizarContraseñaModel($datos, $tabla) {
            $stnt= Conexion::conectar()->prepare("UPDATE $tabla SET password = :password, validacion = :validacion  WHERE validacion = :validacion");
            $stnt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
            $stnt->bindParam(":validacion", $datos["validacion"], PDO::PARAM_STR);
            if($stnt->execute()){
                return "success";
            }else{
                return $stnt->errorInfo();
            }
    }
    
    public static function ingresarUsuarioModel($datos, $tabla) {
        $stnt = Conexion::conectar()->prepare("SELECT nombre, password,estado FROM $tabla WHERE nombre = :nombre");
        $stnt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stnt ->execute();
        return $stnt->fetch();
    }
    
    
    public static function validarUsuarioModel($datos) {
        $stnt = Conexion::conectar()->prepare("SELECT count(nombre) FROM usuarios WHERE nombre = :nombre || email = :nombre");
        $stnt->bindParam(":nombre",$datos, PDO::PARAM_STR);
        $stnt->execute();
        return $stnt->fetch();
        
    }
     
    
    public static function vistasobremiModel($tabla) {
        $stnt = Conexion::conectar()->prepare("SELECT id,nombre,apellidos,correo,cedula,telefono,datos,formacion,fortalezas FROM $tabla");
        $stnt ->execute();
        return $stnt->fetchAll();
    }
    
    #proyecto
 
    public static function registroVentasModel($datos,$tabla) {
        $stnt= Conexion::conectar()->prepare("INSERT INTO $tabla(detalle,monto,fecha,estado )VALUES(:detalle,:monto,:fecha,:estado)");
        $stnt->bindParam(":detalle", $datos["detalle"], PDO::PARAM_STR);
        $stnt->bindParam(":monto", $datos["monto"], PDO::PARAM_STR);
        $stnt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stnt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

        if($stnt->execute()){
            return "success";
        }else{
            return $stnt->errorInfo();
        }
    }
    
    public static function vistaVentasModel($tabla) {
        $stnt = Conexion::conectar()->prepare("SELECT  id, detalle, monto,fecha,estado FROM $tabla ORDER BY fecha");
        $stnt ->execute();
        return $stnt->fetchAll();
    }
          
    public static function vistaRangoFechasModel($datos,$tabla) {
        $stnt = Conexion::conectar()->prepare("SELECT *FROM $tabla WHERE fecha BETWEEN :fecha1 AND :fecha2 ORDER BY fecha");
        $stnt->bindParam(":fecha1",$datos["fecha1"], PDO::PARAM_STR);
        $stnt->bindParam(":fecha2", $datos["fecha2"], PDO::PARAM_STR);
        $stnt ->execute();
        return $stnt->fetchAll();
       }
       
    public static function vistaVentas_dia_Model($tabla) {
        ini_set('date.timezone','America/Costa_Rica');
        $fecha_actual= date("Y-m-d");
        $stnt = Conexion::conectar()->prepare("SELECT *FROM $tabla WHERE fecha = :fecha ");
        $stnt->bindParam(":fecha",$fecha_actual, PDO::PARAM_STR);
        $stnt ->execute();
        return $stnt->fetchAll();

    
    }
    
    public static function borrarVentaModel($datos, $tabla) {
        $stnt= Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stnt->bindParam(":id", $datos, PDO::PARAM_INT);

        if($stnt->execute()){
            return "success";
        }else{
           $stnt->errorInfo();
        }
    }
    
    public static function editarventasModel($datos, $tabla) {
        $stnt= Conexion::conectar()->prepare("SELECT id, detalle, monto,fecha,estado FROM $tabla WHERE id= :id");
        $stnt->bindParam(":id", $datos, PDO::PARAM_INT);
        $stnt->execute();
        return $stnt->fetch();
    }
      
    public static function actulizarventasModel($datos, $tabla) {
        $stnt= Conexion::conectar()->prepare("UPDATE $tabla SET detalle=:detalle,monto=:monto,fecha=:fecha,estado=:estado WHERE id = :id");
        $stnt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stnt->bindParam(":detalle", $datos["detalle"], PDO::PARAM_STR);
        $stnt->bindParam(":monto", $datos["monto"], PDO::PARAM_STR);
        $stnt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stnt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        if($stnt->execute()){
            return "success";
        }else{
            return $stnt->errorInfo();
        }
    }
    
    public static function IdventasModel($datos, $tabla) {
        $stnt= Conexion::conectar()->prepare("SELECT id, detalle, monto,fecha,estado FROM $tabla WHERE id = :id");
        $stnt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stnt->execute();
        return $stnt->fetchAll();
    }

       
       

}