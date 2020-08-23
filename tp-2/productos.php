<?php 
require('header.php');
//require('clases/ABMproductos.php');
?> 

<div class="container-fluid">
      
      <?php $productsMenu = 'Productos';

  
if(  !in_array('productos',$_SESSION['usuario']['permisos'])){ 
  header('Location: index.php');
}


	include('side_bar.php');
    $prod = new ABMproductos($con);
    
    if(isset($_POST['formulario_productos'])){ 

      if(isset($_FILES['imagen'])){
        
         
         if($_FILES['imagen']['type']=="image/png"){
           $tamanhos = array(0 => array('ancho'=>'263','alto'=>'280'));
            
           $nombre = $_FILES['imagen']['name'];
           $r = $_SERVER['SCRIPT_FILENAME'];
           $ruta = dirname($r,2) ;
           $ruta.="/tp-1/img/product/".$nombre;
           
           redimensionar($ruta, $_FILES['imagen']['name'],$_FILES['imagen']['tmp_name'],0,$tamanhos);
           $_POST['imagen']= $nombre;
           
          // var_dump($_POST); 
         }
     }   


	    if($_POST['id_producto'] > 0){
                $prod->edit($_POST); 
               
	    }else{
			
                $prod->save($_POST); 
        }
		
		 header('Location: productos.php');
	}	
	 /*
	if(isset($_GET['del'])){
    $p=$prod->get($_GET['del']);
    if(isset($p->imagen)){
    
     //eliminar_archivos('img/product',$p->imagen);
    }
    $prod->del($_GET['del']);
    
     header('Location: productos.php');

  }*/


  if(isset($_GET['del'])){
    $prod->deshabilitar($_GET['del']) ;
   
    header('Location: productos.php');
	
 
  }

  if(isset($_GET['hab'])){
    $prod->habilitar($_GET['hab']) ;
    
  header('Location: productos.php');


  }

  $marcas = new Marca($con);
  $categorias = new Categoria ($con);



// ///////////////////boton buscar ///////////////////////////////
if(isset($_POST['buscar'])){  

  $xnombre = $_POST['xnombre']; 
  $xmarcas= $_POST['xmarcas']; 
  $xcategorias = $_POST['xcategorias'];
  $xsubcategoria = $_POST['xsubcategorias'];

  //$prod->filtrosProductos($xnombre,$xmarcas,$xcategorias,$xsubcategoria);
  
}	else{
  $xnombre = ""; 
  $xmarcas= ""; 
  $xcategorias = "";
  $xsubcategoria ="";                               
 // $prod->filtrosProductos($xnombre,$xmarcas,$xcategorias,$xsubcategoria);
}
/////////////////////////////////////////////////////////////

        ?>
	  
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
		  <h1 class="page-header">
            <?php echo $productsMenu?>
          </h1>
          	
		  <form method="POST">
         <div class="form-group">
		      <h4>Nombre</h4>		     
              <input type="text" class="form-control" id="xnombre" name="xnombre" placeholder="" value=""><br>
              </div> 
            
              <div class="form-group col-md-6">
              <h4>Marcas</h4>	
              <select name="xmarcas" id="xmarcas" class="form-control ">
              <option value="">Seleccionar...</option>
              <?php  foreach($marcas-> getList() as $l){?>
                
                                <option value="<?php echo $l['id_marca']?>"
                                <?php 
								if(isset($producto->marca)){
									if($l['descripcion'] == $producto->marca){
											echo ' selected="selected" ';
									}
								}?> required><?php echo $l['descripcion']?>
                                </option>
                            <?php }?>  
              </select>
              </div>
              <div class="form-group col-md-3">
              <h4>Categoria</h4>	
              <select name="xcategorias" id="xcategorias" class="form-control ">
              <option value="">Seleccionar...</option>
              <?php  foreach($categorias-> getListCategoria() as $c){?>
                               
                                <option value="<?php echo $c['id_categoria']?>"
                                <?php 
								if(isset($producto->categoria)){
									if($c['nombre'] == $producto->categoria){
											echo ' selected="selected" ';
									}
								}?> required><?php echo $c['nombre']?>
                                </option>
                            <?php }?>
              </select>
              </div>
              <div class="form-group col-md-3">
              <h4>Sub Categoria</h4>	
              <select name="xsubcategorias" id="xsubcategorias" class="form-control ">
              <option value="">Seleccionar...</option>
              <?php  foreach($categorias-> getListSubCategoria() as $sc){?>
                               
                                <option value="<?php echo $sc['id_categoria']?>"
                                <?php 
								if(isset($producto->categoria)){
									if($sc['nombre'] == $producto->categoria){
											echo ' selected="selected" ';
									}
								}?> required><?php echo $sc['nombre']?>
                                </option>
                            <?php }?>
              </select>
              </div>
              <br>
              <div class="form-group">
              <br>
              <button type="submit" class="btn btn-success" name="buscar">Buscar</button>
              </div>
			  </form>
 

          <h2 class="sub-header"><a href="productos_ae.php"><button type="button" class="btn btn-success" title="Agregar">Agregar</button></a>
          <?php if ( !isset($_GET['listDes'])){?>
            <a href="productos.php?listDes"><button type="button" class="btn btn-success" title="Agregar">Deshabilitados</button></a>
            <?} else {?>
            <a href="productos.php"><button type="button" class="btn btn-success" title="HAbilitados">Habilitados</button></a>
            <?} ?>
          </h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Descripcion</th> 
                  <th>Precio</th>                 
                  <th>Marca</th>
                  <th>Categoria</th>
                  <th>SubCategoria</th>
                  <th>Deshabilitado</th>                  
				          <th>Acciones</th>
                </tr>
              </thead>
			  <tbody> 
              <?php        
                                               
          if(!isset($_GET['listDes'])){   
					foreach($prod->filtrosProductos($xnombre,$xmarcas,$xcategorias,$xsubcategoria,0) as $producto2){ ?>
              
						<tr>
						  <td><?php echo $producto2['id_producto'];?></td>
						  <td><?php echo $producto2['nombre'];?></td> 
						  <td><?php echo cortar_palabras($producto2['descripcion'],55);?></td>
              <td><?php echo $producto2['precio'];?></td>
              <td><?php echo $producto2['descmarca'];?></td>
              <td><?php echo $producto2['descrpcategoria'];?></td>
              <td><?php echo $producto2['descrpSubcategoria'];?></td>
              <td><?php echo ($producto2['deshabilitado'])?'si':'no';?></td>
           
              
						  <td>
						      <a href="productos_ae.php?edit=<?php echo $producto2['id_producto']?>"><button type="button" class="btn btn-info" title="Modificar"><i class="far fa-edit"></i></i></button></a>
              <? if(isset($producto2['deshabilitado']) && $producto2['deshabilitado']==0 ){?>   
                  <a href="productos.php?del=<?php echo $producto2['id_producto']?>"><button type="button" class="btn btn-danger" title="Deshabilitar" onclick= "return ConfirmDelete()"><i class="far fa-trash-alt"></i></button></a>
              <? } else {?>
                <a href="productos.php?hab=<?php echo $producto2['id_producto']?>"><button type="button" class="btn btn-success" title="habilitar" >Habilitar</button></a>
                <? } ?>
              </td>
						</tr>
				    <?php }} else {
                foreach($prod->filtrosProductos($xnombre,$xmarcas,$xcategorias,$xsubcategoria,1) as $producto2){ ?>
                <tr>
						  <td><?php echo $producto2['id_producto'];?></td>
						  <td><?php echo $producto2['nombre'];?></td> 
						  <td><?php echo cortar_palabras($producto2['descripcion'],55);?></td>
              <td><?php echo $producto2['precio'];?></td>
              <td><?php echo $producto2['descmarca'];?></td>
              <td><?php echo $producto2['descrpcategoria'];?></td>
              <td><?php echo $producto2['descrpSubcategoria'];?></td>
              <td><?php echo ($producto2['deshabilitado'])?'si':'no';?></td>
           
              
						  <td>
						      <a href="productos_ae.php?edit=<?php echo $producto2['id_producto']?>"><button type="button" class="btn btn-info" title="Modificar"><i class="far fa-edit"></i></i></button></a>
              <? if(isset($producto2['deshabilitado']) && $producto2['deshabilitado']==0 ){?>   
                  <a href="productos.php?del=<?php echo $producto2['id_producto']?>"><button type="button" class="btn btn-danger" title="Deshabilitar" onclick= "return ConfirmDelete()"><i class="far fa-trash-alt"></i></button></a>
              <? } else {?>
                <a href="productos.php?hab=<?php echo $producto2['id_producto']?>"><button type="button" class="btn btn-success" title="habilitar" >Habilitar</button></a>
                <? } ?>
              </td>
						</tr>
            <?php }}	 ?>
              </tbody>
            </table>
          </div>
 
          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<?php include('footer.php');?>