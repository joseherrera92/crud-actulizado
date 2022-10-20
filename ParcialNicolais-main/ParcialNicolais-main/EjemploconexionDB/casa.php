<?php
session_start();

//! negación, !isset = Que no exista
if (!isset($_SESSION['Nombre'])) {
    header('Location: inicio.php');
}

echo "
     <script>
         alert('Inicio de sesion exitoso');
    </script>
    
    
    <script>
    alert('Bienvenido, " . $_SESSION['Nombre'] ." ');
    </script>";
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

    <h4> <a href="salir.php">Cerrar Sesión</a> </h4>
    <h4> <a href="crear.php">Añadir Producto</a></h4>

<table class="table table-responsive">
    <tr> 
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Precio</th>
    </tr>
    <?php

        include "conexion.php";

        $consulta = "SELECT * FROM producto";
        $resultado = $con->query($consulta);

        $filas = $resultado->fetch_array();

        while($filas = $resultado->fetch_array()){
            echo "
                    <tr>
                        <td>".$filas[0]."</td>
                        <td>".$filas[1]."</td>
                        <td>".$filas[2]."</td>
                        <td>".$filas[3]."</td>
                        <td>
                            <a href='actualizar.php?codigo=".$filas[0]."&nombre=".$filas[1]."&cantidad=".$filas[2]."&precio=".$filas[3]."'>actualizar</a>
                            <a href='eliminar.php?codigo=".$filas[0]."'>eliminar</a>
                        </td>
                    
                ";
                
        }
    ?>
    </tr>

</table>

</body>

</html>