<html>
    <head>
            <link rel="stylesheet" type="text/css" href="estilos.css">
        <title>Agregar</title>

    </head>
    <body>
        <?php
        if(isset($_POST['enviar'])){
            $nombre=$_POST['nombre'];
            $matricula=$_POST['matricula'];

            include("conexion.php");
            //insert into alumnos(nombre,matrícula)
            //values ($nombre,$matrícula);
            $sql="insert into alumnos (nombre,matricula) 
            values ('".$nombre."','".$matricula."')";

            $resultado = mysqli_query($conexion,$sql);

            if ($resultado){
                //los atos ingresados a la base de datos
                echo"<script language='JavaScript'>
                alert('los datos fueron 
                ingresados correctamente a la BD');
                location.assign('index.php');
                </script>";
            }else{
                //los datos no se guardaron en la BD
                echo"<script language='JavaScript'>
                alert('ERROR:los datos NO fueron 
                ingresados correctamente a la BD');
                location.assign('index.php');
                </script>";
            }
            mysqli_close($conexion);


        }else{
        ?>
        
        <h1>Agregar Nuevo Alumno</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label>Nombre:</label>
            <input type="text" name="nombre"><br>
            <label>Matrícula</label>
            <input type="text" name="matricula"><br>
            <input type="submit" name="enviar" value="agregar">
            <a href="index.php">Regresar</a>
        </form>
        <?php
        }
        ?>
    </body>
</html>