<?php
//require_once 'db_connect.php';

class sqlProducto{
    var $con;

    function sqlProducto($con){
        $this->con = $con;
    }
    
    function getProductoDetalle($id){
        $sql = "SELECT C.nombre category, P.nombre,p.precio, p.imagen, p.id_producto, p.descripcion  FROM productos P
        INNER JOIN categorias C ON P.id_categoria = C.id_categoria 
        WHERE p.id_producto=".$id;
     return $this->con->query($sql, PDO::FETCH_ASSOC);
    }
    function getProductosHome(){
        $sql = "SELECT C.nombre category, P.nombre,p.precio, p.imagen, p.id_producto  FROM productos P
        INNER JOIN categorias C ON P.id_categoria = C.id_categoria 
        LIMIT 8";
     return $this->con->query($sql, PDO::FETCH_ASSOC);
    }
    
     function getProductosDefault(){
        $sql = "SELECT * FROM productos LIMIT 9";
     return $this->con->query($sql, PDO::FETCH_ASSOC);
    }

    function getProductos(){
        $sql = "SELECT * FROM productos WHERE 1=1";
        return $sql;
    }
    
    function getMarca($id){
        $sql= " AND id_marca =".$id;
        return $sql;
    }
     
    

    function getCategoria($id){
        $sql = " AND id_categoria =".$id;
        return $sql;
    }
    
    
    function getOrderBy($order){
        switch($order){
            case 'D':
                $sql = " ORDER BY destacado ASC";
                break;
            case 'R':
                $sql = " ORDER BY ranking ASC";
                break;
            case 'Z':
                $sql = " ORDER BY nombre DESC";
                break;
            default:
                $sql = " ORDER BY nombre ASC";
        }
      
        return $sql;
    }
    
    
    function setFiltros($sql){

        return $this->con->query($sql, PDO::FETCH_ASSOC);
    }
    

    function setProducto($datos){ 
    }

    function getProducto($id){ 
    }

    function delProducto($id){ 
    }

}