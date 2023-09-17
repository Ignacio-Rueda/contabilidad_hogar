

<!DOCTYPE html>
<html lang="es">
<head>
 <?php include "./inc/head.php"?>
</head>
<body>

<?php
    #Isset se usa para conocer si el varlo de un array existe o tiene un valor asignado.
    if(!isset ($_GET['vista']) || ($_GET['vista'])=='' ){
        $_GET['vista']='home';
    }

    if($_GET['vista']=='home'){
        include "./vista/home.php";
    }

    if($_GET['vista']=='formulario'){
        include "./vista/formulario.php";
    }
    if($_GET['vista']=='eliminar-actualizar_formulario'){
        include "./vista/eliminar-actualizar_formulario.php";
    }

    if($_GET['vista']=='crear_concepto'){
        include "./vista/crear_concepto.php";
    }
    if($_GET['vista']=='eliminar-actualizar_concepto' ){
        include "./vista/eliminar-actualizar_concepto.php";
    }



    if($_GET['vista']=='add_usuario' ){
        include "./vista/add_usuario.php";
    }
    if($_GET['vista']=='eliminar-actualizar_usuario' ){
        include "./vista/eliminar-actualizar_usuario.php";
    }

?>    
</body>
</html>