<?php


 


 





if (isset($_POST['Enviar'])) {
   if (strlen($_POST['nombre']) >= 1 && 
       strlen($_POST['email']) >= 1  && 
       strlen($_POST['telefono']) >= 1  && 
       strlen($_POST['area']) >= 1  &&
       strlen($_POST['comentario']) >= 1) {
     
      $nombre = trim($_POST["nombre"]);
      $email = trim($_POST["email"]);
      $telefono = trim($_POST["telefono"]);
      $area = trim($_POST["area"]);
      $comentario = trim($_POST["comentario"]);


      include_once("db_connect.php");



      $base =new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
      $base ->setAttribute(PDO::ATTR_ERRMODE, PDO :: ERRMODE_EXCEPTION);
      $base -> exec("SET CHARACTER SET utf8");
   
      $sql = "INSERT INTO contactos (nombre, email,telefono,area,comentario) 
      VALUES (:nombre, :email, :telefono, :area, :comentario)";
   
   
      $resultado=$base->prepare($sql);
   
   $resultado -> execute(array(":nombre"=>$nombre, ":email"=>$email, ":telefono"=>$telefono, ":area"=>$area, ":comentario"=>$comentario ));
   $resultado->closeCursor();


      if ($resultado) {
         ?> 
         <h3 class="ok">¡El formulario se envio correctamente!</h3>
          <?php
      } else {
         ?> 
         <h3 class="bad">¡Ups ha ocurrido un error!</h3>
          <?php
      }
   }   else {
         ?> 
         <h3 class="bad">¡Por favor complete todos los campos!</h3>
          <?php
   }
}




?>