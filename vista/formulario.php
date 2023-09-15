<?php include "./inc/nav.php";
include './mysql/db.php';

?>
<h1 class="title">COMPLETA EL FORMULARIO PARA REGISTRAR LAS CANTIDADES</h1>
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
        <?php echo "<td>Cantidad: <input type='number' name='cantidad' pattern='[^,]*' required placeholder='0'></td>";?>
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
if(isset($_POST['registrar'])){
$tabla = $_POST['concepto'];
$cantidad = $_POST['cantidad'];
$fechaConGuiones = $_POST['date'];
$fechaSinGuiones = str_replace('-', '', $fechaConGuiones);
$query = "INSERT INTO $tabla (cantidad,fecha) VALUES ($cantidad,$fechaSinGuiones)";
$result = mysqli_query($connection,$query);

if ($result){
  header("Location: http://localhost/contabilidad/index.php?vista=home");
  exit;
  
} else {
  echo "Error al eliminar el elemento: " . mysqli_error($connection);
}
}
