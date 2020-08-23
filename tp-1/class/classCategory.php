<?php
//include_once('class/db_connect.php'); //tiene que estar en el header

class sqlCategoria{

    var $con;

    function sqlCategoria ($con){
        $this->con = $con;
    }

    function getCategorias($idPadre = 0){
        $sql = "SELECT * FROM categorias WHERE id_padre = ".$idPadre;
        return $this->con->query($sql, PDO::FETCH_ASSOC);
    }

    function getCategoriasfiltroPadre($id_marca){
       if(!empty($id_marca)){
        $sql = "SELECT distinct                
        c.id_padre id_padre,	
        (select  c2.nombre from categorias c2 where c2.id_categoria= c.id_padre) as nombredelpadre
        from 
            categorias c                        
        INNER join 
             productos p on c.id_categoria = p.id_categoria
        WHERE 
            p.id_marca =".$id_marca;
        return $this->con->query($sql, PDO::FETCH_ASSOC);

       }else{

        $sql = "SELECT * FROM categorias WHERE id_padre = 0 ";
        return $this->con->query($sql, PDO::FETCH_ASSOC);

       }
      
    }

    function getCatdeMarca($id_padre, $id_marca){

        $sql=" SELECT distinct                
                    c.id_categoria id_categoria,                    
                    c.nombre nombre
               from 
                   categorias c 
               INNER join productos p  
                    on c.id_categoria = p.id_categoria
               WHERE 
                   c.id_padre=".$id_padre." and
                   p.id_marca =".$id_marca;
        return $this->con->query($sql, PDO::FETCH_ASSOC);
    }


    function setCateoria($datos){ 
    }

    function getCateoria($datos){ 
    }

    function delCateoria($datos){ 
    }

}

?>