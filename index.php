<?php
 include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
    <script type="text/javascript">
        function confirmar(){
            return confirm('Estas seguro de eliminar');
        }
    </script>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">

    <table>
        <tr>
            <th colspan="5"><h1>Lista</h1></th>
        </tr>
        <tr>
            <td>
                <label for="">Id:</label>
                <input type="text" name = 'Id_paciente'>
            </td>
            <td>
                <label for="">Nombre:</label>
                <input type="text" name = 'nombre'>
            </td>
            <td>
                <input type="submit" name="enviar" value =  "BUSCAR">
            </td>
            <td>
                <a href="index.php">Mostrar todos</a>
            </td>
            <td><a href="agregar_pac.php">Nuevo</a></td>
        </tr>
        <tr></tr>
        <tr></tr>
    </table>

    </form>

    <table>
    <thead> 
      <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if(isset($_POST['enviar'])){
            $Id_paciente = $_POST['Id_paciente'];
            $nombre = $_POST['nombre'];
            //$apellidos = $_POST['apellidos'];

            if(empty($_POST['Id_paciente']) && empty($_POST['nombre'])){
                echo "<script languaje = 'Javascript'>
                alert('Ingresa el nombre o el apellido');
                location.assign('index.php');
                </script>
                ";
            }else {
                if (empty($_POST['nombre'])) {
                    $sql="SELECT Id_paciente, CONCAT(nombre_paciente,' ', Apellido_paterno, ' ',Apellido_materno) Paciente, Telefono_paciente FROM paciente  where Id_paciente =" .$Id_paciente; 
                }
                if (empty($_POST['Id_paciente'])) {
                    $sql="SELECT Id_paciente, CONCAT(nombre_paciente,' ', Apellido_paterno, ' ',Apellido_materno) Paciente, Telefono_paciente FROM paciente  where nombre_paciente like '%" .$nombre."%'";
                }
                if (!empty($_POST['Id_paciente']) && !empty($_POST['nombre'])) {
                    $sql="SELECT Id_paciente, CONCAT(nombre_paciente,' ', Apellido_paterno, ' ',Apellido_materno) Paciente, Telefono_paciente FROM paciente where Id_paciente =".$Id_paciente." and nombre_paciente like '%".$nombre."%'";
                }
            }
            
            $resultado=mysqli_query($conexion,$sql);
            while($filas=mysqli_fetch_assoc($resultado)){
                ?>
                <tr>
            <td><?php echo $filas['Id_paciente'] ?></td>
            <td><?php echo $filas['Paciente'] ?></td>
            <td><?php echo $filas['Telefono_paciente'] ?></td>
            <td>
            <?php echo "<a href='editar_pac.php?Id_paciente=".$filas['Id_paciente']."'>Editar</a>"; ?>
                --
                <?php echo "<a href='eliminar_pac.php?Id_paciente=".$filas['Id_paciente']."'>Eliminar</a>"; ?>
            </td>
        </tr>

    <?php
            }
        }else{
            $sql="SELECT Id_paciente, CONCAT(nombre_paciente,' ', Apellido_paterno, ' ',Apellido_materno) Paciente, Telefono_paciente FROM paciente;";
            $resultado=mysqli_query($conexion,$sql);
            while($filas=mysqli_fetch_assoc($resultado)){
        ?>
        <tr>
            <td><?php echo $filas['Id_paciente'] ?></td>
            <td><?php echo $filas['Paciente'] ?></td>
            <td><?php echo $filas['Telefono_paciente'] ?></td>
            <td>
            <?php echo "<a href='editar_pac.php?Id_paciente=".$filas['Id_paciente']."'>Editar</a>"; ?>
                --
                <?php echo "<a href='eliminar_pac.php?Id_paciente=".$filas['Id_paciente']."'>Eliminar</a>"; ?>
            </td>
        </tr>
        <?php
            }
        }
        ?>
      </tbody>
    </table>
</body>
</html>