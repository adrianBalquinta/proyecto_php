<?php 
require('header.php'); 
?> 

<div class="container-fluid">
      
	  <?php $marcasMenu = 'Marcas';

if(  !in_array('marcas',$_SESSION['usuario']['permisos'])){ 
	header('Location: index.php');
	}

	  
	 $marcas = new Marca($con);
	include('side_bar.php');
	 
	//var_dump($_POST['formulario_marcas']); 
	if(isset($_POST['formulario_marcas'])){ 
		
	    if($_POST['id_marca'] > 0){
                $marcas->edit($_POST); 
               
	    }else{
			
                $marcas->save($_POST); 
        }
		
		 header('Location: marcas.php');
	}	

	if(isset($_GET['del'])){
		 $marcas->deshabilitar($_GET['del']) ;
		
			 header('Location: marcas.php');	
	
}

if(isset($_GET['hab'])){
	$marcas->habilitar($_GET['hab']) ;
   
		header('Location: marcas.php');	

}

        ?>
	  
	  
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
		  <h1 class="page-header">
            Marcas
          </h1>
 

          <h2 class="sub-header"><a href="marcas_ae.php"><button type="button" class="btn btn-success" title="Agregar">Agregar</button></a>
		  <?php if ( !isset($_GET['listDes'])){?>
		  <a href="marcas.php?listDes=1"><button type="button" class="btn btn-success" title="Deshabilitados">Deshabilitados</button></a>
		  <?} else {?>
		<a href="marcas.php"><button type="button" class="btn btn-success" title="HAbilitados">Habilitados</button></a>
		  <?} ?>
		  </h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
				  <th>Habilitado</th> 
				  <th>Acciones</th>
                </tr>
              </thead>
			  <tbody>
			  <?php 
				if(!isset($_GET['listDes'])){
					foreach($marcas->getList() as $marca){?>
              
						<tr>
						  <td><?php echo $marca['id_marca'];?></td>
						  <td><?php echo $marca['descripcion'];?></td>
						  <td><?php echo ($marca['deshabilitado'])?'si':'no';?></td> 
						  <td>
						      <a href="marcas_ae.php?edit=<?php echo  $marca['id_marca']?>"><button type="button" class="btn btn-info" title="Modificar"><i class="far fa-edit"></i></i></button></a>
							  <? if(isset($marca['deshabilitado']) && $marca['deshabilitado']==1 ){?>
								<a href="marcas.php?del=<?php echo  $marca['id_marca']?>"><button type="button" class="btn btn-danger" title="Deshabilitar" onclick= "return ConfirmDelete()"><i class="far fa-trash-alt"></i></button></a>
							 <? } else {?>
								<a href="marcas.php?hab=<?php echo  $marca['id_marca']?>"><button type="button" class="btn btn-success" title="habilitar" >Habilitar</button></a>

							 <? } ?>
							  
							  
					      </td>
						</tr>
				    <?php }} else {

foreach($marcas->getListDes() as $marca){?>
              
	<tr>
	  <td><?php echo $marca['id_marca'];?></td>
	  <td><?php echo $marca['descripcion'];?></td>
	  <td><?php echo ($marca['deshabilitado'])?'si':'no';?></td> 
	  <td>
		  <a href="marcas_ae.php?edit=<?php echo  $marca['id_marca']?>"><button type="button" class="btn btn-info" title="Modificar"><i class="far fa-edit"></i></i></button></a>
		  <? if(isset($marca['deshabilitado']) && $marca['deshabilitado']==1 ){?>
			<a href="marcas.php?del=<?php echo  $marca['id_marca']?>"><button type="button" class="btn btn-danger" title="Borrar" onclick= "return ConfirmDelete()"><i class="far fa-trash-alt"></i></button></a>
		 <? } else {?>
			<a href="marcas.php?hab=<?php echo  $marca['id_marca']?>"><button type="button" class="btn btn-success" title="habilitar" >Habilitar</button></a>

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