<?php 
require('header.php');
//include('clases/usuarios.php');
?> 

<div class="container-fluid">
      
      <?php $userMenu = 'Usuarios';
	  
	 if(  !in_array('usuarios',$_SESSION['usuario']['permisos'])){ 
		header('Location: index.php');
	}
			
			
	include('side_bar.php');
	 
	
	if(isset($_POST['submit'])){ 
	    if($_POST['id_usuario'] > 0){
                $user->edit($_POST); 
               
	    }else{
                $user->save($_POST); 
        }
		
		header('Location: usuarios.php');
	}	
	

	if(isset($_GET['del'])){
            $user->del($_GET['del']);
             header('Location: usuarios.php');

	}

	if(isset($_GET['hab'])){
		$user->habilitar($_GET['hab']) ;
	   
			header('Location: usuarios.php');	
	
	}
	

	if(isset($_POST['buscar'])){
		if(!isset($_GET['listDes'])){
			$xnombre= $_POST['xnombre'];
		$user->getList($xnombre,1);
		}else{
		$xnombre= $_POST['xnombre'];
		$user->getList($xnombre,0);
		}
	}else{
		if(!isset($_GET['listDes'])){
			$xnombre= "";
		$user->getList($xnombre,1);
		}else{
			$xnombre= "";
			$user->getList($xnombre,0);
		}
		
	}

        ?>
	  
	  
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
		  <h1 class="page-header">
            Usuarios
          </h1>

		
		  <form method="POST">
		      <h4>Nombre</h4>		     
              <input type="text" class="form-control" id="xnombre" name="xnombre" placeholder="" value="">
              <br><button type="submit" class="btn btn-success" title="buscar" name="buscar">Buscar</button>
			  </form>
		

          <h2 class="sub-header">		 
		  
				<a href="usuarios_ae.php"><button type="button" class="btn btn-success" title="Agregar">Agregar</button></a>
				<?php if ( !isset($_GET['listDes'])){?>
					<a href="usuarios.php?listDes"><button type="button" class="btn btn-success" title="Deshabilitados">Deshabilitados</button></a>
				<?} else {?>
					<a href="usuarios.php"><button type="button" class="btn btn-success" title="Habilitados">Habilitados</button></a>
				<?} ?>	
		  </h2>
		 
			  <div class="table-responsive">
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th>#</th>
					  <th>Nombre</th>
					  <th>Apellido</th>
					  <th>Usuario</th>
					  <th>eMail</th>
					  <th>Perfil</th>
					  <th>Activo</th>
					  <th>Acciones</th>
					</tr>
				  </thead>
				  <tbody>
					<?php 
						if(!isset($_GET['listDes'])){ 	 
						foreach($user->getList($xnombre,1) as $usuario){?>
				  
							<tr>
							  <td><?php echo $usuario['id_usuario'];?></td>
							  <td><?php echo $usuario['nombre'];?></td>
							  <td><?php echo $usuario['apellido'];?></td>
							  <td><?php echo $usuario['usuario'];?></td>
							  <td><?php echo $usuario['email'];?></td>
							  <td><?php echo isset($usuario['perfiles'])?implode(', ',$usuario['perfiles']):'No tiene perfiles asignados';?></td>
							  <td><?php echo ($usuario['activo'])?'si':'no';?></td>
							  <td>
								  
										<a href="usuarios_ae.php?edit=<?php echo $usuario['id_usuario']?>"><button type="button" class="btn btn-info" title="Modificar"><i class="far fa-edit"></i></i></button></a>
									<? if(isset($usuario['activo']) && $usuario['activo']==1 ){?>
										
										<a href="usuarios.php?del=<?php echo $usuario['id_usuario']?>"><button type="button" class="btn btn-danger" title="Borrar" onclick= "return ConfirmDelete()"><i class="far fa-trash-alt"></i></button></a>
									<? } else {?>
										<a href="usuarios.php?hab=<?php echo $usuario['id_usuario']?>"><button type="button" class="btn btn-success" title="habilitar" >Habilitar</button></a>	
									<? } ?>
							  </td>
							</tr>
							<?php }} else {
								foreach($user->getList($xnombre,0) as $usuario){?>
				  
									<tr>
									  <td><?php echo $usuario['id_usuario'];?></td>
									  <td><?php echo $usuario['nombre'];?></td>
									  <td><?php echo $usuario['apellido'];?></td>
									  <td><?php echo $usuario['usuario'];?></td>
									  <td><?php echo $usuario['email'];?></td>
									  <td><?php echo isset($usuario['perfiles'])?implode(', ',$usuario['perfiles']):'No tiene perfiles asignados';?></td>
									  <td><?php echo ($usuario['activo'])?'si':'no';?></td>
									  <td>
										  
												<a href="usuarios_ae.php?edit=<?php echo $usuario['id_usuario']?>"><button type="button" class="btn btn-info" title="Modificar"><i class="far fa-edit"></i></i></button></a>
											<? if(isset($usuario['activo']) && $usuario['activo']==1 ){?>
												
												<a href="usuarios.php?del=<?php echo $usuario['id_usuario']?>"><button type="button" class="btn btn-danger" title="Borrar" onclick= "return ConfirmDelete()"><i class="far fa-trash-alt"></i></button></a>
											<? } else {?>
												<a href="usuarios.php?hab=<?php echo $usuario['id_usuario']?>"><button type="button" class="btn btn-success" title="habilitar" >Habilitar</button></a>	
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