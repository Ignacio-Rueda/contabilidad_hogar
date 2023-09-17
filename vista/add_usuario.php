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






if (isset($_POST['guardar'])) {
  ob_start();

  //Si no existe la tabla de usuarios, la creamos
$query = "CREATE TABLE IF NOT EXISTS usuarios(id int AUTO_INCREMENT PRIMARY KEY,nombre VARCHAR(30) NOT NULL)";
$result = mysqli_query($connection,$query);

if (!$result){
  die("Consulta fallida".mysqli_error($connection));
}


  $nombre_usuario = $_POST['nuevo_usuario'];

  // Comprobar si el usuario ya existe
  $query = "SELECT id FROM usuarios WHERE nombre = '$nombre_usuario'";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die("Consulta fallida: " . mysqli_error($connection));
  }

 

  if (mysqli_num_rows($result) > 0) {
    // El usuario ya existe en la tabla
    echo 'Ya existe el usuario: ' . $nombre_usuario;
  } else {
    // Insertar el nuevo usuario
    $query = "INSERT INTO usuarios (nombre) VALUES ('$nombre_usuario')";
    $result = mysqli_query($connection, $query);

    if ($result) {
      header("Location: http://localhost/contabilidad/index.php?vista=add_usuario");
      exit;
    } else {
      echo "Error al insertar el elemento: " . mysqli_error($connection);
    }
  }
}

?>
<h1>PUEDES MODIFICAR EL NOMBRE DE TODOS LOS USUARIOS O ELIMINARLOS</h1>
<?php
   
   $query = "SELECT * FROM usuarios";
   $result = mysqli_query($connection,$query);
   
   if(isset($_POST['eliminar_usuario'])){
    $id =  $_POST['id'];
   $query = "DELETE FROM usuarios WHERE id=$id";
    $result = mysqli_query($connection,$query);
    
    if ($result){
      header("Location: http://localhost/contabilidad/index.php?vista=add_usuario");
      exit;
      
    } else {
      echo "Error al eliminar el elemento: " . mysqli_error($connection);
    }
    }
?>
   <?php if (!$result) {
    echo "problem";
  }?>
  <?php while ($row = mysqli_fetch_assoc($result)) {
    $nombre = $row['nombre'];
    $id = $row['id'];?>
  <form method='POST' action="">
    <table>
  <tr>
    <td><input type="hidden" name="id" value=<?php echo $id?> ></td>
    <td>Usuario: <input type="text" name="usuario" value=<?php echo $nombre?> ></td>
    <td><input type="submit" name="eliminar_usuario" value ="eliminar"></td>
  </tr>
    </table>
  </form>
  <?php
  }
  ?>






<?php 

ob_end_flush();