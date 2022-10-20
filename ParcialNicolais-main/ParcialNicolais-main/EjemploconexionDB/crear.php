<?php
    include "conexion.php";

    if(isset($_GET["verificar"])){

        
        $codigo = $_GET["cod"];
        $nombre = $_GET["nombre"];
        $cantidad = $_GET["cantidad"];
        $precio = $_GET["precio"];

        if($codigo != "" && $nombre != "" && $cantidad != "" && $precio != ""){
            $consulta = "INSERT INTO producto (cod, nombre, cantidad, precio) VALUES ('$codigo', '$nombre', '$cantidad', '$precio')";
        
            if ($con->query($consulta)){
                echo "Los datos han sido creados";
                header('Location: casa.php');

            }else{
                echo "Error al crear datos";
            }
        }else{
            echo "Despeguela";
        }
      
    }
    
    if(isset($_GET["volver"])){
        header('Location: casa.php');
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrearDatos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<form action="crear.php" method="$_GET">
        <input type="number" id="cod" class="fadeIn second" name="cod" placeholder="codigo" require>
        <input type="text" id="nombre" class="fadeIn third" name="nombre" placeholder="nombre" require>
        <input type="number" id="cantidad" class="fadeIn third" name="cantidad" placeholder="cantidad" require>
        <input type="number" id="precio" class="fadeIn third" name="precio" placeholder="precio" require>
        <input type="submit" class="fadeIn fourth" value="Agregar Producto" name="verificar">
       
      </form>

      <form action="crear.php" method="$_GET">
        
        <input type="submit" class="fadeIn fourth" value="Volver" name="volver">
       
      </form>

</body>
</html>