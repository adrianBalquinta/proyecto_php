<?php 
require('header.php'); 
?> 

<div class="container-fluid">
      
      <?php $categoriasMenu = 'Categorias';

if(  !in_array('categorias',$_SESSION['usuario']['permisos'])){ 
  header('Location: index.php');
  // echo '<script>window.location="_admin\categorias.php"';
  }    
	  
	 $categorias = new Categoria($con);
	include('side_bar.php');
	 
	//var_dump($_POST); die(); 
	if(isset($_POST['formulario_categorias'])){ 
	    if($_POST['id_categoria'] > 0){
                $categorias->edit($_POST); 
               
	    }else{
               // var_dump($_POST); die();
                $categorias->save($_POST); 
        }
		
    header('Location: categorias.php');
    // echo '<script>window.location="_admin\categorias.php"';
    }
    	
    
    if(isset($_GET['delpadre'])){
      
      $categorias->deshabilitar($_GET['delpadre']) ;
     
      header('Location: categorias.php');	
}
    
    /*
	if(isset($_GET['del'])){
			$resp = $categorias->del($_GET['del']) 	;
            if($resp == 1){
      	header('Location: categorias.php');	
      // echo '<script>window.location="_admin\categorias.php"';
			}
      echo '<script>alert("'.$resp.'");</script>';
      //header('Location: categorias.php');
      
    }*/
    
   
 
 if(isset($_GET['hab'])){
  $categorias->habilitar($_GET['hab']) ;
    
     header('Location: categorias.php');	
 
 }
	

        ?>
	  
	  
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
		  <h1 class="page-header">
            Categorias
          </h1>
 

          <h2 class="sub-header">
          <a href="categorias_ae.php?id_padre=0"><button type="button" class="btn btn-success" title="Agregar">Agregar</button></a>
          <?php if ( !isset($_GET['listDes'])){?>
		  <a href="categorias.php?listDes=1"><button type="button" class="btn btn-success" title="Agregar">Deshabilitados</button></a>
		  <?} else {?>
		<a href="categorias.php"><button type="button" class="btn btn-success" title="HAbilitados">Habilitados</button></a>
		  <?} ?>
		  </h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Deshabilitado</th>  
				          <th>Acciones</th>
                </tr>
              </thead>
			  <tbody>
        <?php
          if(!isset($_GET['listDes'])){  	 
					    foreach($categorias->getList() as $categoria){?>
              
						<tr>
						  <td><?php echo $categoria['id_categoria'];?></td>
						  <td><?php echo $categoria['nombre'];?></td>
              <td><?php echo ($categoria['deshabilitado'])?'si':'no';?></td>  
						  <td>
						    <a href="categorias_ae.php?edit=<?php echo   $categoria['id_categoria']?>&id_padre=<?php echo $categoria['id_padre']?>"><button type="button" class="btn btn-info" title="Modificar"><i class="far fa-edit"></i></i></button></a>
							  <? if(isset($categoria['deshabilitado']) && $categoria['deshabilitado']==0 ){?>
                <a href="categorias.php?delpadre=<?php echo  $categoria['id_categoria']?>"><button type="button" class="btn btn-danger" title="Deshabilitar" onclick= "return ConfirmDelete()"><i class="far fa-trash-alt"></i></button></a>
                <? } else {?>
                  <a href="categorias.php?hab=<?php echo  $categoria['id_categoria']?>"><button type="button" class="btn btn-success" title="habilitar" >Habilitar</button></a>
                <? } ?>  
                </td>
						</tr>
            <?php }} else {
              foreach($categorias->getListDes() as $categoria){?>
              	<tr>
						  <td><?php echo $categoria['id_categoria'];?></td>
						  <td><?php echo $categoria['nombre'];?></td>
              <td><?php echo ($categoria['deshabilitado'])?'si':'no';?></td>  
						  <td>
						    <a href="categorias_ae.php?edit=<?php echo   $categoria['id_categoria']?>&id_padre=<?php echo $categoria['id_padre']?>"><button type="button" class="btn btn-info" title="Modificar"><i class="far fa-edit"></i></i></button></a>
							  <? if(isset($categoria['deshabilitado']) && $categoria['deshabilitado']==0 ){?>
                <a href="categorias.php?delpadre=<?php echo  $categoria['id_categoria']?>"><button type="button" class="btn btn-danger" title="Deshabilitar" ><i class="far fa-trash-alt"></i></button></a>
                <? } else {?>
                  <a href="categorias.php?hab=<?php echo  $categoria['id_categoria']?>"><button type="button" class="btn btn-success" title="habilitar" >Habilitar</button></a>
                <? } ?>  
                </td>
						</tr>
            <?php }}	 ?> 
              </tbody>
            </table>
          </div>


           
          

        

     <!-- </div> /row -->
	</div>
</div><!--/.container-->

<?php include('footer.php');?>
