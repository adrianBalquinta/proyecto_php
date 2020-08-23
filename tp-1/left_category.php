<?php
require_once('class/classCategory.php');
?>

<div class="sidebar-categories">
                    <div class="head">Categorias</div>
                    <ul class="main-categories">
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <!--llamo a query categoria-->

                                        <?php

                                           if(empty($id_marca) ){ 
                                             $categoria =new sqlCategoria($con); 
                                             foreach($categoria->getCategorias() as $row){ ?>
                                        <ul>
                                            <?php echo $row['nombre']?>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <!--llamo a query categoria-->
                                                        <?php
                                                               
                                                              $categoria =new sqlCategoria($con); 
                                                              foreach($categoria->getCategorias($row['id_categoria']) as $row2){ ?>
                                                        <li> <a
                                                        href="category.php?categoria=<?php echo $row2['id_categoria']?>"><?php echo $row2['nombre']?></a>
                                                        </li> 
                                                    <?php }?>
                                                    </h4>
                                                </div>
                                            </div>
                                            </ul>
                                            <?php }}else{
                                                    $categoria =new sqlCategoria($con);
                                                    foreach($categoria->getCategorias() as $row){ ?>
                                             <ul>
                                            <?php echo $row['nombre']?>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <!--llamo a query categoria-->
                                                        <?php                                                             
                                                              $categoria =new sqlCategoria($con); 
                                                              foreach($categoria->getCategorias($row['id_categoria']) as $row2){ ?>
                                                        <li> <a
                                                        href="category.php?marca=<?php echo $id_marca?>&categoria=<?php echo $row2['id_categoria']?>"><?php echo $row2['nombre']?></a>
                                                        </li>
                                                        <?php }?>
                                                    </h4>
                                                </div>
                                            </div>
                                            </ul>

                                            <?php }}?>
                                    </h4>
                                </div>
                            </div>

                            <!--fin de categoria-->
                        </div>
                    </ul>
                </div>