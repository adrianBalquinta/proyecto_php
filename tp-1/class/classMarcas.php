<?php
//include_once('class/db_connect.php'); //tiene que estar en el header

class sqlMarca{

    var $con;

    function sqlMarca ($con){
        $this->con = $con;
    }

    function getMarcas(){
        $sql = "SELECT * FROM marcas";
        return $this->con->query($sql, PDO::FETCH_ASSOC);
    }
    function getMarcadeCat($id){   
        
            $sql="select distinct p.id_marca, m.descripcion
            from productos p
            INNER join marcas m on m.id_marca = p.id_marca 
            WHERE p.id_categoria=".$id;
            return $this->con->query($sql, PDO::FETCH_ASSOC);
       
    }

    function setMarca($datos){ 
    }

    function getMarca($datos){ 
    }

    function delMarca($datos){ 
    }

}

?>