<?php
    $title = 'home';
	require_once('header.php');
?>

<main class="site-main">
    <!--================ Hero banner start =================-->
    <section class="hero-banner">
        <div class="container">
            <div class="row no-gutters align-items-center pt-60px">
                <div class="col-5 d-none d-sm-block">
                    <div class="hero-banner__img">
                        <img class="img-fluid" src="img/home/hero-banner.png" alt="">
                    </div>
                </div>
                <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
                    <div class="hero-banner__content">
                        <h4>Comprar es divertido</h4>
                        <h1>EXPLORE NUESTRO PRODUCTO PREMIUM</h1>
                        <p>¡Estamos entregando! Te llevamos a tu casa eso que no te puede faltar.
                            Entre todos podemos cuidarnos. #QuedateEnCasa</p>
                        <a class="button button-hero" href="category.php">Navegar ahora</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Hero banner start =================-->

    <!--================ Hero Carousel start =================-->
    <section class="section-margin mt-0">
        <div class="owl-carousel owl-theme hero-carousel">
            <div class="hero-carousel__slide">
                <img src="img/home/celularesHome.png" alt="" class="img-fluid">
                <a href="category.php?categoria=12" class="hero-carousel__slideOverlay">
                    <h3>Celulares Libres</h3>
                    <p>Hasta 40% OFF</p>
                </a>
            </div>
            <div class="hero-carousel__slide">
                <img src="img/home/hero-slide2.png" alt="" class="img-fluid">
                <a href="category.php?categoria=10" class="hero-carousel__slideOverlay">
                    <h3>Auriculares</h3>
                    <p>Hasta 20% OFF</p>
                </a>
            </div>
            <div class="hero-carousel__slide">
                <img src="img/home/hero-slide3.png" alt="" class="img-fluid">
                <a href="category.php?categoria=8" class="hero-carousel__slideOverlay">
                    <h3>Smart TV</h3>
                    <p>Hasta 35% OFF</p>
                </a>
            </div>
        </div>
    </section>
    <!--================ Hero Carousel end =================-->

    <!-- ================ trending product section start ================= -->
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">                
                <h2><span class="section-intro__style">Tendencia</span></h2>
            </div>
            <div class="row">     
     <?php
                
                include_once('class/classProduct.php');
                     $producto =new sqlProducto($con); 
                    foreach($producto->getProductosHome() as $row){ ?>
               
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="card-img" src="img/product/<?php echo $row['imagen']?>" alt="">
                            <ul class="card-product__imgOverlay">
                                <li><button><i class="ti-search"></i></button></li>
                                <li><button><i class="ti-shopping-cart"></i></button></li>
                                <li><button><i class="ti-heart"></i></button></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <p><?php echo $row['category']?></p>
                            <h4 class="card-product__title"><a href="single-product.php?id=<?php echo $row['id_producto']?>"><?php echo $row['nombre']?></a></h4>
                            <p class="card-product__price">$<?php echo $row['precio'];?></p>
                        </div>
                    </div>
                </div>
           <?php } ?>     
                
                
            </div>
        </div>
    </section>
    <!-- ================ trending product section end ================= -->


    <!-- ================ offer section start ================= -->
    <section class="offer" id="parallax-1" data-anchor-target="#parallax-1"
        data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="offer__content text-center">
                        <h3>Hasta el 50% de descuento</h3>
                        <h4>Rebajas de invierno</h4>
                        <p>Ofertas Imperdibles!</p>
                        <a class="button button--active mt-3 mt-xl-4" href="category.php">Compra ahora</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ offer section end ================= -->

    <!-- ================ Best Selling item  carousel ================= -->
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">                
                <h2><span class="section-intro__style">Los más vendidos</span></h2>
            </div>
            <div class="owl-carousel owl-theme" id="bestSellerCarousel">
                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="img/product/product1.png" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Accessories</p>
                        <h4 class="card-product__title"><a href="single-product.php">Quartz Belt Watch</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="img/product/product2.png" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Beauty</p>
                        <h4 class="card-product__title"><a href="single-product.php">Women Freshwash</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="img/product/product3.png" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Decor</p>
                        <h4 class="card-product__title"><a href="single-product.php">Room Flash Light</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="img/product/product4.png" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Decor</p>
                        <h4 class="card-product__title"><a href="single-product.php">Room Flash Light</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="img/product/product1.png" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Accessories</p>
                        <h4 class="card-product__title"><a href="single-product.php">Quartz Belt Watch</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="img/product/product2.png" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Beauty</p>
                        <h4 class="card-product__title"><a href="single-product.php">Women Freshwash</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="img/product/product3.png" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Decor</p>
                        <h4 class="card-product__title"><a href="single-product.php">Room Flash Light</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="img/product/product4.png" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Decor</p>
                        <h4 class="card-product__title"><a href="single-product.php">Room Flash Light</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ Best Selling item  carousel end ================= -->



   

</main>

<?php
require_once('footer.php');
?>

</body>

</html>