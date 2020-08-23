<?php 
require('header.php');

//include('clases/usuarios.php');
?> 

<div class="container-fluid">
      
      <?php 
      $userMenu = 'Productos';
	include('side_bar.php');
	
    if(  !in_array('productos',$_SESSION['usuario']['permisos'])){ 
		header('Location: index.php');
    }	
    $prod = new ABMproductos($con); 
    $marcas = new Marca($con); 
    $categorias = new Categoria ($con);
	
	if(isset($_GET['edit'])){
            $producto = $prod->get($_GET['edit']); 
	} 
	?>
	  
	  
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
	  <h1 class="page-header">
                    Nuevo Producto
          </h1>
  
          <div class="col-md-2"></div>
            <form action="productos.php" method="post" class="col-md-6 from-horizontal"  enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Producto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="<?php echo isset($producto->nombre)?$producto->nombre:'';?>" required>
                    </div>
                </div> 
                 <div class="form-group">
                    <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="" value="<?php echo isset($producto->descripcion)?$producto->descripcion:'';?>" required>
                    </div>
                </div> 
                 <div class="form-group">
                    <label for="precio" class="col-sm-2 control-label">Precio</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="precio" name="precio" placeholder="" value="<?php echo isset($producto->precio)?$producto->precio:'';?>" required>
                    </div>
                </div> 
          
            
                <div class="form-group">
                    <label for="id_marca" class="col-sm-2 control-label">Marca</label>
                    
                     <select name="id_marca" id="marca" >
                            <?php  foreach($marcas-> getList() as $l){?>
                            <div class="col-sm-10">
                                <option value="<?php echo $l['id_marca']?>"
                                <?php 
								if(isset($producto->marca)){
									if($l['descripcion'] == $producto->marca){
											echo ' selected="selected" ';
									}
								}?> required><?php echo $l['descripcion']?>
                                  
                                </option>
                            </div>     
                            <?php }?>    
                      <!--  <input type="number" class="form-control" id="marca" name="id_marca" placeholder="" value="<?php // echo isset($producto->id_marca)?$producto->id_marca:'';?>" required> -->
                        </select>
                    
                </div> 

                <div class="form-group">
                    <label for="id_categoria" class="col-sm-2 control-label">Categoria</label>
                    
                        <select name="id_categoria" id="categoria" >
                            <?php  foreach($categorias-> getListSubCategoria() as $c){?>
                            <div class="col-sm-10">
                                <option value="<?php echo $c['id_categoria']?>"
                                <?php 
								if(isset($producto->categoria)){
									if($c['nombre'] == $producto->categoria){
											echo ' selected="selected" ';
									}
								}?> required><?php echo $c['nombre']?>

                                </option>
                            </div>    
                            <?php }?>
                    <!--    <input type="number" class="form-control" id="categoria" name="id_categoria" placeholder="" value="<?php //echo isset($producto->id_categoria)?$producto->id_categoria:'';?>" required> -->
                        </select>
                    
                </div>
                <div class="form-group">
                    <label for="id_marca" class="col-sm-2 control-label">imagen</label>
                    <input type="file" name="imagen">
	                <!-- <input type="submit"> -->
                </div> 
            
        
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success" name="formulario_productos">Guardar</button>
                    <a href="<?=$_SERVER["HTTP_REFERER"]?>"><button type="button" class="btn btn-danger" title="Agregar">atras</button></a>
                    </div>
                </div> 
                <input type="hidden" class="form-control" id="id_producto" name="id_producto" placeholder="" value="<?php echo isset($producto->id_producto)?$producto->id_producto:'';?>">

            </form>
          </div>
 
          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<?php include('footer.php');?>