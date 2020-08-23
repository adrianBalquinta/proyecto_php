<?php
  //$title = 'home';
  require_once('header.php');
 // require_once('class/classContact.php');  
?>

<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="contact">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1>Contáctenos</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Tu consulta sera respondida a la brevedad por nuestro equipo de profesionales.</a></li>
                      
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- ================ end banner area ================= -->

<!-- ================ contact section start ================= -->
<section class="section-margin--small">
    <div class="container">
        <div class="d-none d-sm-block mb-5 pb-4">
  
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3283.9923489169732!2d-58.39819738514767!3d-34.60435498045932!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sar!4v1526078656948" width="100%" height="385px" frameborder="0" style="border:0" allowfullscreen></iframe>

        </div>


        <div class="row">
            <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>Buenos Aires,Argentina</h3>
                        <p>Capital Federal</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-headphone"></i></span>
                    <div class="media-body">
                        <h3><a href="tel:454545654"> 011 5032-0076</a></h3>
                        <p>Lu a Vi de 9hs a 18hs</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3><a href="mailto:support@colorlib.com">support@soporte.com</a></h3>
                        <p>¡Envíenos su consulta en cualquier momento!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-9">
       
               <?php
              require_once('formulario.php');
                ?>


            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->
<?php
require_once('footer.php');
?>
</body>

</html>