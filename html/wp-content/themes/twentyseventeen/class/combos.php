<?php
require_once('bd.php');


class Combos
{  
    public function __construct(){        

    }

    public function listarquenecesitas(){
        $bd = new Bd();                       
        $sql = "SELECT * FROM quenecesitas";
        $result = $bd->consultar($sql);
        return $result;            
    }

    public function consultar_tipos($quenecesitas){
        $bd = new Bd();                       
        $sql = "SELECT n.idtipo, t.nombre FROM tipodeproyecto as t , necesitas_tipo as n where idnecesitas ='".$quenecesitas."' AND n.idtipo=t.id";        
        $result = $bd->consultar($sql);
        return $result;            
    }

    public function listarservicios(){
        $bd = new Bd();                       
        $sql = "SELECT * FROM servicios";
        $result = $bd->consultar($sql);
        return $result;            
    }

    public function listarcostos(){
        $bd = new Bd();                       
        $sql = "SELECT * FROM costos";
        $result = $bd->consultar($sql);
        return $result;            
    }

     public function consultar_precio($quenecesitas, $tipoproyecto, $servicios, $costos){
        $bd = new Bd();                       
        $sql = "SELECT preciomx, precioeuro FROM precios where quenecesitas='".$quenecesitas."' AND tipoproyecto='".$tipoproyecto."' AND servicios='".$servicios."' AND costos='".$costos."'";
        $result = $bd->consultar($sql);
        return $result;            
    }

    public function get_quenecesitas($id){
        $bd = new Bd();                       
        $sql = "SELECT valor FROM quenecesitas where id=$id";
        $result = $bd->consultar($sql);
        return $result; 
    }

     public function get_tipoproyecto($id){
        $bd = new Bd();                       
        $sql = "SELECT nombre FROM tipodeproyecto where id=$id";
        $result = $bd->consultar($sql);
        return $result; 
    }

       public function get_servicios($id){
        $bd = new Bd();                       
        $sql = "SELECT nombre FROM servicios where id=$id";
        $result = $bd->consultar($sql);
        return $result; 
    }

     public function get_costos($id){
        $bd = new Bd();                       
        $sql = "SELECT nombre FROM costos where id=$id";
        $result = $bd->consultar($sql);
        return $result; 
    }

    public function registrar_contacto($nombre, $quenecesitas, $email, $telefono, $mensaje){
        $bd = new Bd();
        $datos = array (        
        'nombre' => $nombre, 
        'quenecesitas' => $quenecesitas, 
        'email' => $email, 
        'telefono' => $telefono, 
        'mensaje' => $mensaje
        );             
        $ins = $bd->insertar("formcontacto", $datos, array());           
        return $ins;  
    }

     public function registrar_publicarproyecto($nombre, $quenecesitas, $email, $telefono, $descripcion, $archivo){
        $bd = new Bd();
        $datos = array (
        'quenecesitas' => $quenecesitas, 
        'nombre' => $nombre,
        'email' => $email, 
        'telefono' => $telefono, 
        'descripcion' => $descripcion,
        'nombrearchivo' => $archivo
        );                   
        $ins = $bd->insertar("formpublicarproyecto", $datos, array());           
        return $ins;  
    }

     public function registar_solicitarpresupuesto($tipoproyecto, $claseweb, $servicios, $presupuesto, $nombre, $email, $telefono){
        $bd = new Bd();
        $datos = array (         
        'tipoproyecto' => $tipoproyecto,
        'claseweb' => $claseweb,
        'servicios' => $servicios, 
        'presupuesto' => $presupuesto, 
        'nombre' => $nombre,
        'email' => $email,
        'telefono' => $telefono
        );                   
        $ins = $bd->insertar("formsolicitarpresupuesto", $datos, array());           
        return $ins;  
    }




}
?>