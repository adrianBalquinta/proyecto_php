<?php


//require_once 'db_connect.php';

class sqlcomentario{
    var $con;

    function sqlcomentario($con){
        $this->con = $con;
    }
    
    function getComentarioDelProducto($id){
        $sql = "SELECT nombre, mensaje,fechalta FROM comentarios WHERE estado = 200 AND id_producto =".$id;
     return $this->con->query($sql, PDO::FETCH_ASSOC);
    }  
   
  


}
