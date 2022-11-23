<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php
    if(isset($_POST['enviar'])){
        
        $Apellido_paterno = $_POST['Apellido_paterno'];
        $Apellido_materno = $_POST['Apellido_materno'];
        $colonia_paciente = $_POST['colonia_paciente'];
        $calle_paciente = $_POST['calle_paciente'];
        $Telefono_paciente = $_POST['Telefono_paciente'];
$Id_paciente= $_POST['Id_paciente'];
        $nombre_paciente = $_POST['nombre_paciente'];
    ////////////////////////////no jalaaa
        $sql="update paciente set nombre_paciente='".$nombre_paciente."',Apellido_paterno='".$Apellido_paterno."' where Id_paciente='".$Id_paciente."'";
        $resultado = mysqli_query($conexion,$sql);
        if($resultado){
            echo" <script languaje = 'JavaScript'>
            alert('Los datos fueron actualizados');
            location.assign('index.php');
            </script>";
        }else{
            echo" <script languaje = 'JavaScript'>
            alert('ERROR: Los datos NO fueron actualizados');
            location.assign('index.php');
            </script>";
        }
        mysqli_close($conexion);
    }else{

        $Id_paciente=$_GET['Id_paciente']; //recupera el valor del otro
        $sql="select * from paciente where id_paciente = '".$Id_paciente."'";
        $resultado = mysqli_query($conexion,$sql);

        $fila= mysqli_fetch_assoc($resultado);
        $Id_paciente= $fila["Id_paciente"];
        $nombre_paciente= $fila["nombre_paciente"];
        $Apellido_paterno=$fila["Apellido_paterno"];
        $Apellido_materno=$fila["Apellido_materno"];
        $colonia_paciente=$fila["colonia_paciente"];
        $calle_paciente=$fila["calle_paciente"];
        $Telefono_paciente=$fila["Telefono_paciente"];
        

        mysqli_close($conexion);
    
    ?>
    <h1>editar</h1>
    <form action="" method="post">
    <input type="text" name="Ïd_paciente" placeholder="Id" value="<?php echo $Id_paciente; ?>"> <br>
    <input type="text" name="nombre_paciente" placeholder="Nombre" value="<?php echo $nombre_paciente; ?>"> <br>
        <input type="text" name="Apellido_paterno" placeholder="Apellido paterno" value="<?php echo $Apellido_paterno; ?>"> <br>
        <input type="text" name="Apellido_materno" placeholder="Apellido Materno" value="<?php echo $Apellido_materno; ?>"> <br>
        <input type="text" name="colonia_paciente" placeholder="Colonia" value="<?php echo $colonia_paciente; ?>"> <br>
        <input type="text" name="calle_paciente" placeholder="Calle" value="<?php echo $calle_paciente; ?>"> <br>
        <input type="text" name="Telefono_paciente" placeholder="Teléfono" value="<?php echo $Telefono_paciente; ?>"> <br>
        <button type="submit" name="enviar">Enviar</button>
        <a href="index.php">Regresar</a>
    </form>
    <?php
    } 
    ?>
</body>
</html>