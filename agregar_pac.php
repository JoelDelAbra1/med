<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php
    if(isset($_POST['enviar'])){ //presiona el boton
        include("conexion.php");    
        
        $nombre_paciente = $_POST['nombre_paciente'];
        $apellido_paterno = $_POST['Apellido_paterno'];
        $apellido_materno = $_POST['Apellido_materno'];
        $colonia_paciente = $_POST['colonia_paciente'];
        $calle_paciente = $_POST['calle_paciente'];
        $Telefono_paciente = $_POST['Telefono_paciente'];
        
        $sql="INSERT INTO paciente(nombre_paciente, Apellido_paterno, 
        Apellido_materno, colonia_paciente, calle_paciente, Telefono_paciente) 
        VALUES ('$nombre_paciente', '$apellido_paterno', '$apellido_materno'
        , '$colonia_paciente', '$calle_paciente','$Telefono_paciente')";
        $resultado = mysqli_query($conexion,$sql);
        if($resultado){
            echo" <script languaje = 'JavaScript'>
            alert('Los datos fueron guardados');
            location.assign('index.php');
            </script>";
        }else{
            echo" <script languaje = 'JavaScript'>
            alert('ERROR: Los datos NO fueron guardados');
            location.assign('index.php');
            </script>";
        }
        mysqli_close($conexion);
    }else{

    }
    ?>
<form action="" method="POST">
        <input type="text" name="nombre_paciente" placeholder="Nombre">
        <input type="text" name="Apellido_paterno" placeholder="Apellido paterno">
        <input type="text" name="Apellido_materno" placeholder="Apellido Materno">
        <input type="text" name="colonia_paciente" placeholder="Colonia">
        <input type="text" name="calle_paciente" placeholder="Calle">
        <input type="text" name="Telefono_paciente" placeholder="Teléfono">
        <button type="submit" name="enviar">Enviar</button>
        <a href="index.php">Regresar</a>
</body>
</html>