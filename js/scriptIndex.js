
        /****************************************************************
         *  Funcion que muestra en la pagina Web la tabla con los datos *
         *  guardados en la BD                                          *
         ****************************************************************/
        function mostrarUsuario() {
            //Crear objeto XMLHttpRequest
            if (window.XMLHttpRequest) {
                // Codigo para  IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // Codigo para IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            // Funcion que obtiene el resultado
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {   //4= Completado 200=Exitoso
                    // Modificar la pagina indicando donde
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            }

            // Indicar a quien llamar y modo
            xmlhttp.open("GET", "mostrar_usuario.php", true);
            // Enviar
            xmlhttp.send();
        }
        /******************************************************************
         *          Funcion que borra todo el contenido de la BD          *
         ******************************************************************/
        function borrarUsuario() {
            // Crea el objeto XMLHttpRequest
            if (window.XMLHttpRequest) {
                // Codigo para  IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // Codigo para IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
    
            // Abre la conexion
            xmlhttp.open("GET", "eliminar_usuarios.php", true);
                
            // Hace la peticion
            xmlhttp.send();
            //return false; //Si se quiere anular el submit
        }
       
        /******************************************************************
         *        Funcion que borra de la BD el dato seleccionado         *
         ******************************************************************/         
         function borrarUsuario2() {
            //Obtiene el valor elegido con el SELECT
            var dato=document.getElementById('seleccion').value;
            var dato2= new FormData();
            dato2.append('id',dato);
            // Crea el objeto XMLHttpRequest
            if (window.XMLHttpRequest) {
                // Codigo para  IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // Codigo para IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            // Abre la conexion
            xmlhttp.open("POST", "eliminar_usuarios2.php", true);
            
            // Hace la peticion
            xmlhttp.send(dato2);

            //return false; //Si se quiere anular el submit
        }
        
        /*********************************************************************
         *               Funcion que inserta datos en la BD                  *
         *********************************************************************/
        function insertarUsuario(){
            //Obtiene el formulario
            var mi_form=document.getElementById("mi_formulario");
            
            // Valida los campos del formulario 
            if (mi_form.checkValidity()){
            
                //Obtiene los datos del formulario
                var datos_form=new FormData(mi_form);
            
                // Crea el objeto XMLHttpRequest
                if (window.XMLHttpRequest) {
                    // Codigo para  IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } 
                else { 
                    // Codigo para IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }

                // Abre la conexion
                xmlhttp.open("POST", "insertar_usuario.php", true);
                
                // Envia los datos del frmulario
                xmlhttp.send(datos_form);

                //return false; //Si se quiere anular el submit

            }       
            else{
                alert("Datos incorrectooos");
            }
        }      

        /************************************************************************
         *  Funcion que crea un selector en HTML con opciones de una BD y lo    *
         *  agrega en la pagina. Usa Ajax para elegir la posicion del selector  *
         *  en la pagina                                                        *
         ************************************************************************/
        function crearSelector(){
            if (window.XMLHttpRequest) {
                // Codigo para  IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // Codigo para IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            // Recibe el Selector en HTML
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //Incrusta el Selector en la Pagina
                    document.getElementById("lugarSelector").innerHTML = this.responseText;
                }
            }
            //Indica la pagina php y el medio de pasar datos
            xmlhttp.open("GET", "crearSelector.php", true);
            //Llama a crearSelector.php
            xmlhttp.send();
        }

        /*************************************************************************
         * Funcion que sará llamada por el Selector.                             * 
         *************************************************************************/
        function mifuncion(){
           //No hace nada
        }

