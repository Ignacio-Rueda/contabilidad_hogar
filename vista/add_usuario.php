<?php include "./inc/nav.php";
include './mysql/db.php';
?>
<h1>PUEDES INGRESAR TODOS LOS USUARIOS QUE PARTICIPARÁN EN EL PROGRAMA</h1>
<!--FORMULARIO PARA INSERTAR UN USUARIO -->  
<form action="" method="POST">
  <label for="GET-insertar_concepto">Nombre del nuevo usuario:</label>
  <input class="input" type="text" placeholder="Text input" name="nuevo_usuario" >
  <input type="submit" value="guardar" name="guardar" />
</form>

<?php

/*
MOSTRAMOS CADA UNA DE LAS TABLAS E INSERTAMOS EL GASTO/INGRESO EN LA QUE CORRESPONDA
*/ 
ob_start();

//Si no existe la tabla de usuarios, la creamos
$query = "CREATE TABLE IF NOT EXISTS usuarios(id int AUTO_INCREMENT PRIMARY KEY,nombre VARCHAR(30) NOT NULL)";
$result = mysqli_query($connection,$query);
if (!$result){
  echo "Error al eliminar el elemento: " . mysqli_error($connection);
} 

if (!$result){
  die("Consulta fallida".mysqli_error($connection));
}


//COMPROBAMOS SI EL NOMBRE DEL NUEVO USUARIO YA EXISTE EN LA TABLA
if (isset($_POST['guardar'])) {
  $nombre_usuario = $_POST['nuevo_usuario'];

  // Comprobar si el usuario ya existe
  $query = "SELECT COUNT(*) as count FROM usuarios WHERE nombre = '$nombre_usuario'";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die("Consulta fallida: " . mysqli_error($connection));
  }

  $row = mysqli_fetch_assoc($result);

  if ($row['count'] > 0) {
    // El usuario ya existe en la tabla
    echo 'Ya existe el usuario: ' . $nombre_usuario;
  } else {
    // Insertar el nuevo usuario
    $query_insert = "INSERT INTO usuarios (nombre) VALUES ('$nombre_usuario')";
    $result_insert = mysqli_query($connection, $query_insert);

    if ($result_insert) {
      header("Location: http://localhost/contabilidad/index.php?vista=crear_concepto");
      exit;
    } else {
      echo "Error al insertar el elemento: " . mysqli_error($connection);
    }
  }
}

?>
<?php
   //OBTENEMOS TODOS LOS ELEMENTOS DE LA TABLA USUARIOS
   $query = "SELECT * FROM usuarios";
   $result = mysqli_query($connection,$query);?>
   <h1>PUEDES MODIFICAR EL NOMBRE DE TODOS LOS USUARIOS O ELIMINARLOS</h1>
   
   <?php if (!$result) {
    echo "problem";
  }
  while ($row = mysqli_fetch_assoc($result)) {
    $nombre = $row['nombre'];
    echo $nombre;


  }
?>




<?php 

ob_end_flush();