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
   
       // Selecciona la BD
       mysqli_select_db($con,'mibd_php');                
   
       // Prepara  la consulta SQL
       $sql="SELECT id, nombre FROM datos";   
       
       // Realiza la consulta
       $result = mysqli_query($con,$sql);                     
   
       /*************  Genera la tabla respuesta ************************/
       echo "<form id='form'>
                <select name='users' id='seleccion' onchange='mifuncion()'> ";
                    echo "<option> Select a persona:</option>";
                    // Obtiene cada dato del select
                    
                    while($ren = mysqli_fetch_array($result)) {       
                        echo "<option value='" . $ren['id'] . "'>".$ren['nombre']."</option>";
                    }
                echo "</select>";
        echo "</form>";
                    
       //Cierra la conexion
       mysqli_close($con);
?>