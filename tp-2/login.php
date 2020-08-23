
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>aroma</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
	
		<!-- <link href="css/styles.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->


  <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    

         <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="static/css/index.css" th:href="@{/css/index.css}">




	</head>
	<body> 

    <script type = "text/javascript">
  function alerta()
  {
    alert("Datos incorrectos");
    
  }  
</script>	  


<div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="static/img/user.png" th:src="@{/img/user.png}"/>
                </div>
                <!-- <form action="index.php" method="post" class=" from-horizontal"> -->
                <form class="col-12" action="index.php" method="post">
                    <div class="form-group" id="user-group">
                        <!-- <input type="text" class="form-control" placeholder="Nombre de usuario" name="username"/> -->
                        <input type="text" class="form-control " id="usuario" name="usuario" placeholder="Usuario" value="<?php echo isset($usuario->usuario)?$usuario->usuario:'';?>"> 
                    </div>
                    <div class="form-group" id="contrasena-group">
                    <input type="password" class="form-control " id="clave" name="clave" placeholder="Contraseña">
                        <!-- <input type="password" class="form-control" placeholder="Contrasena" name="password"/> -->
                    </div>
                    <!-- <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>  Ingresar </button> -->
                    <button type="submit" class="btn btn-success" name="login"><i class="fas fa-sign-in-alt"></i> Ingresar</button>
                </form>
                <!-- <div class="col-12 forgot">
                    <a href="#">Recordar contrasena?</a>
                </div>
                <div th:if="${param.error}" class="alert alert-danger" role="alert">
		            Invalid username and password.
		        </div>
		        <div th:if="${param.logout}" class="alert alert-success" role="alert">
		            You have been logged out.
		        </div> -->
            </div>
        </div>
    </div>




 
<!-- <?php 
// include('inc/footer.php');
?> -->