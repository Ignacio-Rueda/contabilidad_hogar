<?php include "./inc/nav.php";
include './mysql/db.php';

?>
<h1>Elimina o Actualiza tus conceptos</h1>
<?php
/*ATENCIÓN! ESTE APARTADO ES PARA LAS TABLAS DE LA BBDD (CONCEPTOS) */
$query = "SHOW TABLES";
$result = mysqli_query($connection,$query);
if (!$result){
  die("Consulta fallida".mysqli_error($connection));
}

while ($row = mysqli_fetch_assoc($result)){
  $concepto = $row['Tables_in_contabilidad'];?>
  <form action="" method="post">
    <table>
        <?php
        echo "<tr>";
            echo "<td>Concepto: <input type='text' name='concepto' value='$concepto' readonly/></td>";?>
           <td><input type="submit" value="Borrar" name="borrar" /></td>
           <?php echo "<td>Nuevo Concepto: <input type='text' name='nuevo_concepto' value='$concepto'/></td>";?>
           <td><input type="submit" value="Actualizar" name="actualizar" /></td>
        </tr>
    </table>
</form>


<?php
}
?>
<?php 
#---------------->BORRAR ELEMENTO
if(isset($_POST['borrar'])){
$concepto =  $_POST['concepto'];
$query = "DROP TABLE $concepto";
$result = mysqli_query($connection,$query);

if ($result){
  header("Location: http://localhost/contabilidad/index.php?vista=eliminar-actualizar_concepto");
  exit;
  
} else {
  echo "Error al eliminar el elemento: " . mysqli_error($connection);
}
}
#----------------->ACTUALIZAR NOMBRE

#--------PRIMERO COMPROBAR SI EXISTE ESA TABLA 
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



?>






