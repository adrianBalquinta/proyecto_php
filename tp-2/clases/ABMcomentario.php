<?php 
Class ABMcomentario{

    /*conexion a la base*/
	private $con;	
	
	public function __construct($con){
		$this->con = $con;
	}
        /**
        * Obtengo todos los productos
        */
	public function getList(){
		$sql = "SELECT id_comentario,nombre,mensaje,mail,fechalta 
		           FROM coment WHERE estado = 100 ";
       
        $resultado = $this->con->query($sql,PDO::FETCH_ASSOC);       
       // $resultado = $query->fetch(PDO::FETCH_OBJ);	
	
            return $resultado; 
	}
	
	/**
	* obtengo un producto
	*/
	public function get($id){
	    $query = "SELECT id_comentario,nombre,mensaje,mail,fechalta
		           FROM coment WHERE id_comentario = ".$id;
        $query = $this->con->query($query); 
			
		$comentario = $query->fetch(PDO::FETCH_OBJ);		

			
			/*echo '<pre>';
			var_dump($usuario);echo '</pre>'; */
            return $comentario;
	}
	
	
	
    public function update($id){
        $sql = "UPDATE coment SET estado = '200' WHERE id_comentario = ".$id.';';
        

    $this->con->exec($sql);
}
    
    public function del($id){
			$sql = "DELETE FROM coment WHERE id_comentario = ".$id.';';
			

        $this->con->exec($sql);
    }
		

	
	
}?>