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


}
?>