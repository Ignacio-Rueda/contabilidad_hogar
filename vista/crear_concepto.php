<?php 
include "./inc/nav.php";
include './mysql/db.php';
if(isset($_POST['submit'])){
$concepto =  $_POST['concepto'];

//Comprobar si el elemento a introducir ya existe like...

$query = "CREATE TABLE $concepto(id int AUTO_INCREMENT PRIMARY KEY,nombre VARCHAR(15) NOT NULL,cantidad DECIMAL(30,2) NOT NULL)";
$result = mysqli_query($connection,$query);
  


if (!$result){
  die("Consulta fallida".mysqli_error($connection));
}
}
?>



<form action="" method="POST">
  <label for="GET-insertar_concepto">Nombre del nuevo concepto:</label>
  <input class="input" type="text" placeholder="Text input" name="concepto" >
  <input type="submit" value="Save" name="submit" />
</form>