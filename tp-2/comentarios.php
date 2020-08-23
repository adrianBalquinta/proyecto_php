<?php 
require('header.php');
//require('clases/ABMcomentarios.php');
?> 
<div class="container-fluid">
      
      <?php $comentariosMenu = 'Comentarios';

if(  !in_array('comentarios',$_SESSION['usuario']['permisos'])){ 
  header('Location: index.php');
  }

	include('side_bar.php');
    $coment = new ABMcomentario($con);
    
    if(isset($_POST['formulario_comentarios'])){ 
	    if($_POST['id'] > 0){
                $coment->edit($_POST); 
               
	    }else{
			
                $coment->save($_POST); 
        }
		
		 header('Location: comentarios.php');
	}	
	 
	if(isset($_GET['del'])){
    $coment->del($_GET['del']);
     header('Location: comentarios.php');
    }
    if(isset($_GET['update'])){
        $coment->update($_GET['update']);
         header('Location: comentarios.php');
	}

        ?>


        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
		  <h1 class="page-header">
            <?php echo $comentariosMenu?>
          </h1> 

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>mensaje</th>
                  <th>mail</th>
                  <th>fecha</th> 
				          <th>Acciones</th>
                </tr>
              </thead>
			  <tbody> 
              <?php  	 
					foreach($coment->getList() as $comentarios){?>
              
						<tr>
						  <td><?php echo $comentarios['id_comentario'];?></td>
						  <td><?php echo $comentarios['nombre'];?></td> 
						  <td><?php echo $comentarios['mensaje'];?></td>
              <td><?php echo $comentarios['mail'];?></td>
              <td><?php echo $comentarios['fechalta'];?></td>
						  <td>
						      <a href="comentarios.php?update=<?php echo $comentarios['id_comentario']?>"><button type="button" class="btn btn-success" title="Aprobacion" onclick= "return ConfirmAprobacion()"><i class="far fa-check-circle"></i></button></a>
							    <a href="comentarios.php?del=<?php echo $comentarios['id_comentario']?>"><button type="button" class="btn btn-danger" title="Borrar" onclick= "return ConfirmDelete()"><i class="far fa-trash-alt"></i></button></a>
					    </td>
						</tr>
				    <?php }?>  
						
              </tbody>
            </table>
          </div>
 
          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<?php include('footer.php');?>