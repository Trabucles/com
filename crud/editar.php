<?php
    include("conexion.php");
?>
<html>
    <head>
        <title>Editar</title>
        <link rel="stylesheet" type="text/css" href="estilos.css">
    </head>
    <body>
        <?php
            if(isset ($_POST['enviar'])){
                //aqui es cuando se presiona el boton de enviar se presiona
                $id=$_POST['id'];
                $nombre=$_POST['nombre'];
                $matricula=$_POST['matricula'];

                /*update alumnos set
                nombre=$nombre,matrícula=$matrícula where id=$id*/
                $sql="update alumnos set nombre='".$nombre."', matricula='".$matricula."' where id='".$id."'";
                $resultado=mysqli_query($conexion,$sql);

                if($resultado){
                    echo "<script language='JavaScript'>
                    alert('Los datos se actualizaron correctamente!!!');
                    location.assign('index.php');</script>";
                
                }else{
                    echo"<script language='JavaScript'>
                    alert('Los datos NO se actualizaron correctamente!!!');
                    location.assign('index.php');</script>";
                }
                mysqli_close($conexion);
                
            }else{
                //este es cuando no se presiona el boton de enviar
                $id=$_GET['id'];
                $sql= "select * from alumnos where id='".$id."'";
                $resultado =mysqli_query($conexion,$sql);

                $fila=mysqli_fetch_assoc($resultado);
                $nombre=$fila["nombre"];
                $matricula=$fila["matricula"];

                mysqli_close($conexion);
            }
        ?>
     <H1>Editar Alumnos</H1>      

    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $nombre; ?>"><br>
        
        <label>Matrícula</label>
        <input type="text" name="matricula" value="<?php echo $matricula; ?>"><br>

        <input type="hidden" name="id" value= "<?php echo $id; ?>"> 
        

        <input type="submit" name="enviar" value= "actualizar">
        <a href="index.php">Regresar</a>
    </form>
    

    </body>    
    









</html>