<h1>PDO</h1>
<?php require_once 'mysql-login.php';?>
<ol>
    <li>Conectar a la base</li> 

    <?php
        try {        
		    //$con = new PDO('mysql:host=localhost;dbname=produccion;port=3306','root', '');
		    //$con = new PDO("mysql:hostecho $hostname;dbnameecho $database", $username, $password);           
            $con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
            print "Conexión exitosa!";
        }
        catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage();
            die();
        }

    ?>

     <li>SQL - Insert</li>
    
    <?php 
        $sql = "INSERT INTO alumnos(nombre,apellido,email) 
                       VALUES ('Jose','Garcia','jgarcia@test.com'),
                              ('Pedro','Lopez','plopez@test.com'),
                              ('Pablo','Gonzalez','pgonzalez@test.com');";
		//echo $sql;
       $count = $con->exec($sql);
	   if($count > 0 )
			print($count." Filas afectadas");
	   else
			print('ERROR');

    ?>
    
    <li>SQL - UPDATE</li>
    
    <?php 
        $sql = "UPDATE alumnos SET nombre = 'Alejandro' WHERE apellido = 'Garcia';";
        $count = $con->exec($sql);
        print($count." Filas afectadas");


    ?>
    
    <li>SQL - DELETE</li>
    
    <?php 
        $sql = "DELETE FROM alumnos WHERE nombre = 'Pablo'; ";
        $count = $con->exec($sql);
        print($count." Filas afectadas");


    ?>

    <li>SQL - SELECT </li>
    <?php 
        $query = "SELECT * FROM alumnos;";
        $resultado = $con->query($query);        
         var_dump($resultado);		
    ?>   
            <table border="1">
                <?php foreach ( $resultado as $rows) {
					/*echo '<pre>';
					var_dump($rows);
					echo '</pre>'; die();*/
					?>
                    <tr>
                        <td><?php echo $rows["id_alumno"]?></td>
                        <td><?php echo $rows["nombre"]?></td>
                        <td><?php echo $rows["apellido"]?></td>
                        <td><?php echo $rows["email"]?></td>
                    </tr>
                <?php }?>
            </table>
    <?php  
        $resultado =null;

    ?>
    
     <li>Generar SQL con PHP</li>
    <?php 
        $nombre = 'Hector';
        $apellido = 'Serrano';
        $email = "hs@mail.com";  
        $cmd = $con->prepare("INSERT INTO alumno(nombre,apellido,email) VALUES(?,?,?)");
        $cmd->execute(array($nombre,$apellido,$email));
		
				die();
    ?>
    
    <li>Porcedure/Funtions</li>
    
    <?php  
        $proc = $con->prepare("CALL mostrar_alumnos()");
        /*se puede usar bindParam, por si se necesitan pasar parametros */
        $proc->execute(); 
        ?>
        <table border="1">
            <?php while($res = $proc->fetch(PDO::FETCH_OBJ)){?>
                <tr>
                    <td><?php echo $res->id_alumno?></td>
                    <td><?php echo $res->nombre?></td>
                    <td><?php echo $res->apellido?></td>
                    <td><?php echo $res->email?></td>
                </tr>
            <?php }?>
        </table>  

    <li>Cerrar Conexión</li>

    <?php 
            $con =null;
    ?>
</ol>  
