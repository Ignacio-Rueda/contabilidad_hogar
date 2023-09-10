<?php
    $connection = mysqli_connect('localhost','root','','contabilidad');
    if (!$connection) {
        die("Error en la conexión: " . mysqli_connect_error());
    }
?>
