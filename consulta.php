<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, td, th {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            text-align: left;
        }
    </style>
</head>

<body>

<?php
    //Obtiene el valor enviado
    $q = intval($_GET['q']);                              
    /*Abre la conexion con el servidor de la BD
       Dominio: localhost
       usuario: user
       password: contra123 */
    $con = mysqli_connect('localhost','user','contra123');                 

    if (!$con) {
        // imprime un mensaje de error y sale del script
        die('No se pudo conectar: ' . mysqli_error($con));                                        
    }

    // Selecciona la BD
    mysqli_select_db($con,'mibd_php');                

    // Prepara  la consulta SQL
    $sql="SELECT * FROM datos WHERE id = '".$q."'";   
    
    // Realiza la consulta
    $result = mysqli_query($con,$sql);                     

    /*************  Genera la tabla respuesta ************************/
    echo "<table>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>   
            <th>Edad</th>
            <th>Nacimiento</th>
            <th>Tabajo</th>
        </tr>";

        // Obtiene cada fila (arreglo) de resultados
        while($row = mysqli_fetch_array($result)) {       
            echo "<tr>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['apellido'] . "</td>";
                echo "<td>" . $row['edad'] . "</td>";
                echo "<td>" . $row['nacimiento'] . "</td>";
                echo "<td>" . $row['trabajo'] . "</td>";
            echo "</tr>";
        }
    echo "</table>";

    //Cierra la conexion
    mysqli_close($con);
?>

</body>

</html>
