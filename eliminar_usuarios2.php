<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>

<?php
               

    /*Abre la conexion con el servidor de la BD
       Dominio: localhost
       usuario: user
       password: contra123 */

    
    $con = mysqli_connect('localhost','user','contra123');                 

    if (!$con) {
        // imprime un mensaje de error y sale del script
        die('No se pudo conectar: ' . mysqli_error($con)); 
                                                         
    }

    $id = $_POST['id'];
    // Selecciona la BD
    mysqli_select_db($con,'mibd_php');                

    // Prepara  la consulta SQL
    $sql="DELETE FROM datos Where id='".$id."'";   

    // Realiza la consulta
    $result = mysqli_query($con,$sql);                     

    //Cierra la conexion
    mysqli_close($con);
?>

</body>

</html>
