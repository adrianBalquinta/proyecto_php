<div class="row row-offcanvas row-offcanvas-left">

         <div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">

            <ul class="nav nav-sidebar">
			<?php if( in_array('comentarios',$_SESSION['usuario']['permisos'])){?>
			<a href="#menu1sub1" class="list-group-item" data-toggle="collapse" aria-expanded="false">Mis pendientes </a>
			<div class="collapse" id="menu1sub1">
			<ul>
			
				<li class="<?php echo isset($comentariosMenu)?'active':''?>"><a href="comentarios.php" class="list-group-item" data-parent="#menu1sub1">Comentarios</a></li>
			
				</ul>
             </div>
			 <?php }?>	
	<?php 				if( in_array('productos',$_SESSION['usuario']['permisos']) || 
							in_array('marcas',$_SESSION['usuario']['permisos']) ||
							in_array('categorias',$_SESSION['usuario']['permisos']) ||
							in_array('subcategorias',$_SESSION['usuario']['permisos']) 
							
							
							){  ?>
					<a href="#menu1sub1sub2" class="list-group-item" data-toggle="collapse" aria-expanded="false">Tablas y parametros </a>
                        <div class="collapse" id="menu1sub1sub2">  
						<ul>
						
						<?php if( in_array('productos',$_SESSION['usuario']['permisos'])){?>
							<li class="<?php echo isset($productsMenu)?'active':''?>"><a href="productos.php" class="list-group-item" data-parent="#menu1sub1sub2">Productos</a></li>
						<?php }?>
						<?php if( in_array('marcas',$_SESSION['usuario']['permisos'])){?>	
			  				<li class="<?php echo isset($marcasMenu)?'active':''?>"><a href="marcas.php" class="list-group-item" data-parent="#menu1sub1sub2">Marcas</a></li>
						<?php }?>
						<?php if( in_array('categorias',$_SESSION['usuario']['permisos'])){?>	  
			  				<li class="<?php echo isset($categoriasMenu)?'active':''?>"><a href="categorias.php" class="list-group-item" data-parent="#menu1sub1sub2">Categorias</a></li>
						<?php }?>
						<?php if( in_array('subcategorias',$_SESSION['usuario']['permisos'])){?>	  
			  				<li class="<?php echo isset($categoriasMenu)?'active':''?>"><a href="SubCategorias.php" class="list-group-item" data-parent="#menu1sub1sub2">Sub-Categorias</a></li>
						<?php }?>	  
			  				
			  			</ul>  
                        </div>
					<?php } ?>		
						<?php if(in_array('usuarios',$_SESSION['usuario']['permisos']) || in_array('perfiles',$_SESSION['usuario']['permisos']) ){?>
						<a href="#menu1sub1sub3" class="list-group-item" data-toggle="collapse" aria-expanded="false">Configuraciones </a>
                        <div class="collapse" id="menu1sub1sub3"> <ul>
					
			  <?php if( in_array('usuarios',$_SESSION['usuario']['permisos'])){?>
					<li class="<?php echo isset($userMenu)?'active':''?>"><a href="usuarios.php" class="list-group-item" data-parent="#menu1sub1sub3">Alta de Usuarios</a></li>
			  <?php }?>
			  <?php if( in_array('perfiles',$_SESSION['usuario']['permisos'])){?>
			 <li class="<?php echo isset($perfilMenu)?'active':''?>"><a href="perfiles.php" class="list-group-item" data-parent="#menu1sub1sub3">Perfiles</a></li>
			 <?php }
						}
			 ?>
             
			  </ul>
				</div>







            </ul>


        </div><!--/span-->