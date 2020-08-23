<?php 
require('header.php');

//include('clases/usuarios.php');
?> 

<div class="container-fluid">
      
      <?php $userMenu = 'Usuarios';
	include('side_bar.php');
	
    if(  !in_array('usuarios',$_SESSION['usuario']['permisos'])){ 
        header('Location: index.php');
    }
	
	$perfil = new Perfil($con); 
	
	if(isset($_GET['edit'])){
            $usuario = $user->get($_GET['edit']); 
	} 
	?>
	  
	  
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
	  <h1 class="page-header">
                    Nuevo Usuario
          </h1>
  
          <div class="col-md-2"></div>
            <form action="usuarios.php" method="post" class="col-md-6 from-horizontal">
                <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="<?php echo isset($usuario->nombre)?$usuario->nombre:'';?>" required>
                    </div>
                </div> 
                 <div class="form-group">
                    <label for="apellido" class="col-sm-2 control-label">Apellido</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="" value="<?php echo isset($usuario->apellido)?$usuario->apellido:'';?>" required>
                    </div>
                </div> 
                 <div class="form-group">
                    <label for="usuario" class="col-sm-2 control-label">Usuario</label>
                     <div class="col-sm-10">
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="" value="<?php echo isset($usuario->usuario)?$usuario->usuario:'';?>" required>
                    </div>
                </div> 
                 <div class="form-group">
                    <label for="calve" class="col-sm-2 control-label">Clave</label>
                     <div class="col-sm-10">
                        <input type="password" class="form-control" id="clave" name="clave" placeholder="" >
                    </div>
                </div> 
                 <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">e-Mail</label>
                     <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="" value="<?php echo isset($usuario->email)?$usuario->email:'';?>" required>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="tipo" class="col-sm-2 control-label">Perfil</label>
                    <div class="col-sm-10">
                        <select name="perfil[]" id="perfil" multiple='multiple' required >
                            <?php  foreach($perfil->getList() as $t){?>
                                <option value="<?php echo $t['id']?>" 
								<?php 
									if(isset($usuario->perfiles)){
										if(in_array($t['id'],$usuario->perfiles)){
											echo ' selected="selected" ';
										}
									}
								
								?>><?php echo $t['nombre']?></option>
                            <?php }?>
                        </select>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" name="activo" value="1" <?php echo (isset($usuario->activo)?(($usuario->activo == 1) ?'checked':''):'');?> required> Activo
                        </label>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success" name="submit" >Guardar</button>
                    <a href="<?=$_SERVER["HTTP_REFERER"]?>"><button type="button" class="btn btn-danger" title="Agregar">atras</button></a>
                    </div>
                </div> 
                <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" placeholder="" value="<?php echo isset($usuario->id_usuario)?$usuario->id_usuario:'';?>">

            </form>
          </div>
 
          
      </div><!--/row-->
	</div>
</div><!--/.container-->

<?php include('footer.php');?>