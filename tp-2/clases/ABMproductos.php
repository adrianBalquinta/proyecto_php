<?php 
Class ABMproductos{

    /*conexion a la base*/
	private $con;	
	
	public function __construct($con){
		$this->con = $con;
	}
        /**
        * Obtengo todos los productos
        */
	public function getList(){
		$sql = "SELECT id_producto,nombre,descripcion,imagen,precio 
		           FROM prod ";
       
        $resultado = $this->con->query($sql,PDO::FETCH_ASSOC);       
       // $resultado = $query->fetch(PDO::FETCH_OBJ);	
	
            return $resultado; 
	}
	
	/**
	* executo un store procedure para los filtros
	*/

	

	public function filtrosProductos($xnombre,$marca,$xcategoria,$xsubcategoria,$desh){
		$sql = " CALL Busquedaproductofiltros ('".$xnombre."','".$marca."','".$xcategoria."','".$xsubcategoria."','".$desh."') ";
       
        $resultado = $this->con->query($sql,PDO::FETCH_ASSOC);       
       // $resultado = $query->fetch(PDO::FETCH_OBJ);	
	
            return $resultado; 
	}
	


	/**
	* obtengo un producto
	*/
	public function get($id){
	    $query = "SELECT id_producto,nombre,descripcion,imagen,precio
		           FROM prod WHERE id_producto = ".$id;
        $query = $this->con->query($query); 
			
		$producto = $query->fetch(PDO::FETCH_OBJ);
			
			$sql = 'SELECT m.descripcion
			FROM marc m
			inner join prod p
			on m.id_marca = p.id_marca 
			WHERE p.id_producto = '.$id;
			foreach($this->con->query($sql) as $m){
				$producto->marca = $m['descripcion'];
			}
			
			
			//echo $producto->marca; die();
			$sql = '';

			$sql = 'SELECT c.nombre
			FROM categ c
			inner join prod p
			on c.id_categoria = p.id_categoria 
			WHERE p.id_producto = '.$id;

			foreach($this->con->query($sql) as $c){
				$producto->categoria = $c['nombre'];
				}
			

			
		
            return $producto;
	}
	
	
	
	

	public function edit($data){
	    $id = $data['id_producto'];
	    unset($data['id_producto']);
	    
			
            foreach($data as $key => $value){
                if($value != null){
                    $columns[]=$key." = '".$value."'"; 
                }
            }
            $sql = "UPDATE prod SET ".implode(',',$columns)." WHERE id_producto = ".$id;
            
            $this->con->exec($sql);
        
             
	} 	

	
	
    public function del($id){
			$sql = "DELETE FROM prod WHERE id_producto = ".$id.';';
			

        $this->con->exec($sql);
    }
	
	


	public function deshabilitar($id){
	
		
		$query = "UPDATE  prod SET deshabilitado = 1 WHERE id_producto =".$id; 
				 

		return $this->con->exec($query); 

		
	}

	public function habilitar($id){

		
		$query = "UPDATE  prod SET deshabilitado = 0 WHERE id_producto =".$id; 
				

		return $this->con->exec($query); 


	}





	public function save($data){
		
		foreach($data as $key => $value){
			
			if(!is_array($value)){
				if($value != null){
					$columns[]=$key;
					$datos[]=$value;
				}
			}
		}
		
		$sql = "INSERT INTO prod(".implode(',',$columns).") VALUES('".implode("','",$datos)."')";
		//echo $sql;die();
		
		$this->con->exec($sql);

	}	
	
}?>