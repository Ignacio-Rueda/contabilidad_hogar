<?php 
include "./inc/nav.php";
include './mysql/db.php';?>

<form action="" method="POST">
  <label for="GET-insertar_concepto">Nombre del nuevo concepto:</label>
  <input class="input" type="text" placeholder="Text input" name="concepto" >
  <input type="submit" value="Save" name="submit" />
</form>

<?php
#Comprobamos primero si el concepto existe
if (isset($_POST['submit'])){
  $concepto =  $_POST['concepto'];
  $query = "SHOW TABLES";
  $result = mysqli_query($connection,$query);
  if (!$result){
    die("Consulta fallida".mysqli_error($connection));
  }

  $existe = FALSE;
  
  while ($row = mysqli_fetch_assoc($result)){
    $concepto_en_bb_dd = $row['Tables_in_contabilidad'];
    if ($concepto==$concepto_en_bb_dd){
      $existe=TRUE;
    }
  }
  if(!$existe){
    #SI NO EXISTE LA TABLA
    if(isset($_POST['submit'])){
      $query = "CREATE TABLE $concepto(id int AUTO_INCREMENT PRIMARY KEY,cantidad DECIMAL(30,2) NOT NULL,fecha DATE NOT NULL)";
      $result = mysqli_query($connection,$query);
      
      if ($result){
        header("Location: http://localhost/contabilidad/index.php?vista=crear_concepto");
        exit;
        
      } else {
        echo "Error al insertar el elemento: " . mysqli_error($connection);
      }
      }
  }
  
  else{
    echo 'Ya existe el concepto: '.$concepto;
  }



}


?>



