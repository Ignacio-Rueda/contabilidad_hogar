<?php include "./inc/nav.php";
include './mysql/db.php';

?>
<h1 class="title">COMPLETA EL FORMULARIO PARA CONOCER TODOS LOS GASTOS</h1>
<?php
$query = "SHOW TABLES";
$result = mysqli_query($connection,$query);
#Obtener fecha actual
$dia=date('d');
$mes=date('m');
$anyo=date('Y');
$today = $anyo . '-' . $mes . '-' . $dia;

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
        <?php echo "<td>Cantidad: <input type='text' name='nuevo_concepto' pattern='[^,]*' required></td>";?>
           <td><input type="date" id="start" name="date"  value= <?php echo $today?> /></td>
           <td><input type="submit" value="registrar" name="registrar" /></td>
        </tr>
    </table>
</form>


<?php
}
?>
<?php 
#---------------->REGISTRAR ELEMENTO
/*INSERT INTO gas (cantidad,fecha) VALUES(5,2023-09-14);*/ 
if(isset($_POST['registrar'])){
$fecha =  $_POST['date'];
echo $fecha;
/*$query = "DROP TABLE $concepto";
$result = mysqli_query($connection,$query);

if ($result){
  header("Location: http://localhost/contabilidad/index.php?vista=eliminar-actualizar_concepto");
  exit;
  
} else {
  echo "Error al eliminar el elemento: " . mysqli_error($connection);
}*/
}
