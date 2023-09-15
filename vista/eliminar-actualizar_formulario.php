<?php include "./inc/nav.php";
include './mysql/db.php';

?>
<h1 class="title">Elimina o Actualiza los datos del formulario</h1>
<?php
/*ATENCIÓN! ESTE APARTADO ES PARA LOS DATOS (CANTIDADES) A MODIFICAR DENTRO DE LAS TABLAS DE LA BBDD */

$query = "SHOW TABLES";
$result = mysqli_query($connection,$query);
if (!$result){
  die("Consulta fallida".mysqli_error($connection));
}?>
<!--PRIMERO MOSTRAMOS LOS TIPOS DE TABLAS EN UN SELECT-->
  <form action="" method="post">
    <table>
        <tr>
        <select name="select"><?php
        while ($row = mysqli_fetch_assoc($result)){
          $concepto = $row['Tables_in_contabilidad'];?>
        <?php echo "<option  name='concepto' value='$concepto'> $concepto</option>";?>
        <?php
      } ?>
      </select>
           <td><input type="submit" value="buscar" name="buscar" /></td>
        </tr>
    </table>

</form>



<?php 
if(isset($_POST['buscar'])){
$tabla =  $_POST['select'];
#AHORA TENEMOS EL NOMBRE DE LA TABLA, BUSCAMOS TODOS LAS CANTIDADES DE LA MISMA

$query = "SELECT * FROM $tabla";
$result = mysqli_query($connection,$query);
if (!$result){
  die("Consulta fallida".mysqli_error($connection));
}?>

<form action="" method="post">
    <table>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $valores = array_values($row); 
                      $id = $valores[0];
                      $cantidad = $valores[1];
                      $fecha= $valores[2];
                      
                        // Genera un campo de entrada de texto para cada campo
                        echo "<td><input type='hidden' name='tabla' value='$tabla'></td>";
                        echo "<td><input type='hidden' name='id' value='$id'></td>";
                        echo "<tr><td><input type='date' name='fecha' value='$fecha'></td>";
                        echo "<td><input type='text' name='cantidad' value='$cantidad'></td>";
                        echo "<td><input type='submit' name='actualizar' value='actualizar'></td>";
                        echo "<td><input type='submit' name='eliminar' value='eliminar'></td></tr>";
                }
                ?>
    </table>
</form>



<?php
}
?>
<?php 
#---------------->BORRAR ELEMENTO
if(isset($_POST['eliminar'])){
$id = $_POST['id']; 
$tabla = $_POST['tabla'];
$query = "DELETE FROM $tabla WHERE id=$id";
$result = mysqli_query($connection,$query);

if ($result){
  exit;
  
} else {
  echo "Error al eliminar el elemento: " . mysqli_error($connection);
}
}
#----------------->ACTUALIZAR NOMBRE

#--------PRIMERO COMPROBAR SI EXISTE ESA TABLA 
/*
if (isset($_POST['actualizar'])){
  $nuevo_concepto = $_POST['nuevo_concepto'];
  $query = "SHOW TABLES";
  $result = mysqli_query($connection,$query);
  if (!$result){
    die("Consulta fallida".mysqli_error($connection));
  }
  $existe = FALSE;
  
  while ($row = mysqli_fetch_assoc($result)){
    $concepto = $row['Tables_in_contabilidad'];
    if ($concepto==$nuevo_concepto){
      $existe=TRUE;
    }
  }

  if(!$existe){
    #SI NO EXISTE LA TABLA
    if(isset($_POST['actualizar'])){
      $concepto =  $_POST['concepto'];
      $nuevo_concepto = $_POST['nuevo_concepto'];
      $query = "RENAME TABLE $concepto TO $nuevo_concepto";
      $result = mysqli_query($connection,$query);
      
      if ($result){
        header("Location: http://localhost/contabilidad/index.php?vista=eliminar-actualizar_concepto");
        exit;
        
      } else {
        echo "Error al actualizar el elemento: " . mysqli_error($connection);
      }
      }
  }
  else{
    echo 'Ya existe el concepto: '.$nuevo_concepto;
  }



}
*/


?>











