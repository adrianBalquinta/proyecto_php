<?php




if (isset($_POST['Enviar'])) {
   if (strlen($_POST['nombre']) >= 1 && 
       strlen($_POST['mail']) >= 1  && 
       strlen($_POST['telefono']) >= 1  &&      
       strlen($_POST['mensaje']) >= 1) {
     
      $nombre = trim($_POST["nombre"]);
      $mail = trim($_POST["mail"]);
      $telefono = trim($_POST["telefono"]);      
      $mensaje = trim($_POST["mensaje"]);
      $id_producto = trim($_POST["id_producto"]);


      include_once("db_connect.php");



      $base =new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
      $base ->setAttribute(PDO::ATTR_ERRMODE, PDO :: ERRMODE_EXCEPTION);
      $base -> exec("SET CHARACTER SET utf8");
   
      $sql = "INSERT INTO comentarios (nombre, mail, telefono, mensaje,fechalta,estado, id_producto) 
      VALUES (:nombre, :mail, :telefono, :mensaje, NOW(),100, :id_producto)";
   
   
      $resultado=$base->prepare($sql);
   
   $resultado -> execute(array(":nombre"=>$nombre, ":mail"=>$mail, ":telefono"=>$telefono, ":mensaje"=>$mensaje, ":id_producto"=>$id_producto ));
   $resultado->closeCursor();


      if ($resultado) {
         ?> 
         <h3 class="ok">¡Se envio correctamente!</h3>
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