<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

<?php
    $id = intval($_POST['id']);                         
    $nombre = $_POST['nom'];
    $apellido = $_POST['ap'];
    $edad = intval($_POST['ed']);
    $nacimiento = $_POST['nac'];
    $trabajo = $_POST['trab'];
    /*Abre la conexion con el servidor de la BD
       Dominio: localhost
       usuario: user
       password: abc123 */
    $con = mysqli_connect('localhost','user','contra123');                 

    if (!$con) {
        // imprime un mensaje de error y sale del script
        die('No se pudo conectar: ' . mysqli_error($con)); 
                                                         
    }

    // Selecciona la BD
    mysqli_select_db($con,'mibd_php');                
   
    // Prepara  la consulta SQL
    $sql="insert into datos(id,nombre, apellido,edad,nacimiento,trabajo)";
    //$sql=$sql+" values(   1     , 'Pedro'      ,'Garcia'       ,30       ,'Msxico'         ,'Aqui        ')"; 
    $sql=$sql.  " values(" .$id. ", '".$nombre."','".$apellido."',".$edad.",'".$nacimiento."','".$trabajo."')";   
    // Realiza la consulta
    $result = mysqli_query($con,$sql);                     
   
    //Cierra la conexion
    mysqli_close($con);
?>

</body>

</html>
