<?php
include "./inc/nav.php";
include './mysql/db.php';

if (isset($_POST['eliminar'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $tabla = mysqli_real_escape_string($connection, $_POST['tabla']);

    $query = "DELETE FROM $tabla WHERE id=$id";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Redirect or display a success message here
    } else {
        echo "Error al eliminar el elemento: " . mysqli_error($connection);
    }
}

if (isset($_POST['actualizar'])) {
    // Handle updates here
    //"UPDATE nombre_de_tabla SET cantidad='$cantidad' WHERE id='$id'";
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $tabla = mysqli_real_escape_string($connection, $_POST['tabla']);
    $cantidad= mysqli_real_escape_string($connection, $_POST['cantidad']);
    $fecha=mysqli_real_escape_string($connection, $_POST['fecha']);
    
    $query = "UPDATE $tabla SET cantidad='$cantidad',fecha='$fecha' WHERE id='$id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Redirect or display a success message here
    } else {
        echo "Error al eliminar el elemento: " . mysqli_error($connection);
    }
}

ob_start();

$query = "SHOW TABLES";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Consulta fallida" . mysqli_error($connection));
}

$tables = array();

while ($row = mysqli_fetch_assoc($result)) {
    $concepto = $row['Tables_in_contabilidad'];
    if ($concepto != 'usuarios'){//Para no tener en cuenta la tabla usuarios
        $tables[] = $concepto;
    }
    
}

?>

<h1 class="title">Elimina o Actualiza los datos del formulario</h1>

<?php
foreach ($tables as $tabla) {
    $query = "SELECT * FROM $tabla";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        echo "problem";
    }
    echo "<h1 class='title'>$tabla</h1>";
    ?>
    <table>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $cantidad = $row['cantidad'];
            $fecha = $row['fecha'];
            
            // Convertir la cadena de fecha en un objeto DateTime
            $fechaObjeto = new DateTime($fecha);
            
            // Formatear la fecha
            $fechaFormateada = $fechaObjeto->format('d/m/Y');
        ?>
            <tr>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="tabla" value="<?php echo $tabla; ?>">
                    
                    <td><?php echo 'Fecha: '.$fechaFormateada; ?></td>
                    <td><?php echo 'Cantidad: '.$cantidad; ?></td>
                    <td><input type="submit" value="eliminar" name="eliminar"></td>
                    <td><input type="number" name="cantidad" value="<?php echo $cantidad; ?>"> </td>
                    <td><input type="date" name="fecha" value="<?php echo $fecha; ?>"> </td>
                    <td><input type="submit" value="Actualizar" name="actualizar"></td>
                </form>
            </tr>
        <?php
        }
        ?>
    </table>
    <?php
}
ob_end_flush();
?>
