<?php
 require_once('class/classProduct.php');
 require_once('category.php');
 
?>


<!-- Start Best Seller -->
<section class="lattest-product-area pb-40 category-list">
    <div class="row">
       
        <?php
       
        
            if(empty($productosFiltrados)){
            
       
        
        foreach($productos as $row){ ?>
           <div class="col-md-6 col-lg-4">
            <div class="card text-center card-product">
                <div class="card-product__img">
                    <img class="card-img" src='img/product/<?php echo $row['imagen'];?>' alt="">
                    <ul class="card-product__imgOverlay">
                        <li><button><i class="ti-search"></i></button></li>
                        <li><button><i class="ti-shopping-cart"></i></button></li>
                        <li><button><i class="ti-heart"></i></button></li>
                    </ul>
                </div>
                <div class="card-body">
                    <p><?php echo $row['nombre']?></p>
                    <h4 class="card-product__title"><a href="single-product.php?id=<?php  echo $row['id_producto'];?>">Ver mas</a></h4>
                    <p class="card-product__price">$<?php echo $row['precio'];?></p>
                </div>
            </div>
        </div>
        <?php   }  }
        if(!empty($productosFiltrados)){
               foreach($productosFiltrados as $row){ ?>
           <div class="col-md-6 col-lg-4">
            <div class="card text-center card-product">
                <div class="card-product__img">
                    <img class="card-img" src='img/product/<?php echo $row['imagen'];?>' alt="">
                    <ul class="card-product__imgOverlay">
                        <li><button><i class="ti-search"></i></button></li>
                        <li><button><i class="ti-shopping-cart"></i></button></li>
                        <li><button><i class="ti-heart"></i></button></li>
                    </ul>
                </div>
                <div class="card-body">
                    <p><?php echo $row['nombre']?></p>
                    <h4 class="card-product__title"><a href="single-product.php?id=<?php  echo $row['id_producto'];?>">Ver mas</a></h4>
                    <p class="card-product__price">$<?php echo $row['precio'];?></p>
                </div>
            </div>
        </div>
        <?php   }    
        
        }
        
        ?>

    </div>
</section>
<!-- End Best Seller -->