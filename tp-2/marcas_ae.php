<?php 
require('header.php');
 
?> 

<div class="container-fluid">
      
      <?php $marcasMenu = 'Marcas';


if(  !in_array('marcas',$_SESSION['usuario']['permisos'])){ 
      header('Location: index.php');
      }
  


	include('side_bar.php');
	
	$marcas = new Marca($con); 

	
	if(isset($_GET['edit'])){
            $marca = $marcas->get($_GET['edit']); 
	} 
	?>
	  
	  
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
	  <h1 class="page-header">
                    Nueva marca
          </h1>
  
          <div class="col-md-2"></div>
            <form action="marcas.php" method="post" class="col-md-6 from-horizontal">
               
                <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="descripcion" placeholder="" value="<?php echo (isset($marca->descripcion)?$marca->descripcion:'');?>" required>
                    </div>
                </div> 
                <br>
          

                
                 
               
                 
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success" name="formulario_marcas" >Guardar</button>
                    <a href="<?=$_SERVER["HTTP_REFERER"]?>"><button type="button" class="btn btn-danger" title="Agregar">atras</button></a>
                    </div>
                </div> 
                <input type="hidden" class="form-control" id="id" name="id_marca" placeholder="" value="<?php echo (isset($marca->id_marca)?$marca->id_marca:'');?>">

            </form>
          </div>
 
          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<?php include('footer.php');?>