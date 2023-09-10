<?php include "./inc/nav.php";
include './mysql/db.php';

?>
<h1>Eliminar conceptos</h1>
<?php
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
        </tr>
    </table>
</form>


<?php
}
?>
<?php 

if(isset($_POST['borrar'])){
$concepto =  $_POST['concepto'];
$query = "DROP TABLE $concepto";
$result = mysqli_query($connection,$query);

if ($result){
  header("Location: http://localhost/contabilidad/index.php?vista=eliminar_concepto");
  exit;
  
} else {
  echo "Error al eliminar el elemento: " . mysqli_error($connection);
}


}
?>



