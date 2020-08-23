<?php
//include_once('class/db_connect.php'); //tiene que estar en el header

class sqlColores{

    var $con;

    function sqlColores ($con){
        $this->con = $con;
    }

    function getColores($idPadre = 0){
        $sql = "SELECT * FROM colores";
        return $this->con->query($sql, PDO::FETCH_ASSOC);
    }
    function setColores($datos){ 
    }

    function getColores($datos){ 
    }

    function delColores($datos){ 
    }

}

?>