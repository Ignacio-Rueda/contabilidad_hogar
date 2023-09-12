

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
    if($_GET['vista']=='crear_concepto'){
        include "./vista/crear_concepto.php";
    }
    if($_GET['vista']=='eliminar-actualizar_concepto' ){
        include "./vista/eliminar-actualizar_concepto.php";
    }
    if($_GET['vista']=='ver_conceptos'){
        include "./vista/ver_conceptos.php";
    }



?>    
</body>
</html>