
                   <?php
include_once('class/classMarcas.php');
include_once('category.php');
?>

                   
                   <div class="sidebar-filter">
                    <div class="top-filter-head">Marcas</div>
                    <div class="common-filter">
                        <!-- <div class="head">Marcas</div> -->
                        
                            <ul>
                                   <h4 class="panel-title">
                                   <?php

               if(empty($id_categoria)){ 
                 $marca =new sqlMarca($con); 
                foreach($marca->getMarcas() as $row){ ?>
                
                 <li class="filter-list"><a href="category.php?marca=<?php echo $row['id_marca']?>" ><?php echo $row['descripcion']?><span></span></a></li><?php }}
                 else{
                    $marca =new sqlMarca($con); 
                    foreach($marca->getMarcas() as $row){ ?>
                
                <li class="filter-list"><a href="category.php?categoria=<?php echo $id_categoria ?>&marca=<?php echo $row['id_marca']?>" ><?php echo $row['descripcion']?><span></span></a></li><?php }

                 }?>
                                </h4>
                            </ul>
                        
                    </div>
                    
   
                </div>