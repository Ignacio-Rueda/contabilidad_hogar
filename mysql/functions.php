<?php
include 'db.php';?>





<?php
// Verifica si se ha proporcionado el parámetro 'id' en la URL

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo $id;
    // Realiza la eliminación en la base de datos o en tu sistema de almacenamiento
    // Reemplaza esto con tu lógica de eliminación real
    
    // Redirige al usuario a la página principal u otra página después de la eliminación
   // header("Location: index.php");
    exit;
} else {
    // Si no se proporcionó 'id', muestra un mensaje de error o realiza otra acción apropiada
    echo "Error: Falta el parámetro 'id' en la URL.";
}
?>








